<?php
require './PHPMailer/PHPMailerAutoload.php';
require('../config/config.inc.php');
require_once '../classes/order/Order.php';
require_once '../classes/order/OrderHistory.php';

// ************************************************************* FUNCIONS ***************************************************

//Funcio que envia el correu tant per Rebre com per proveidor:
//fitxcos=fitxer que té el cos del missatge, Desti=adreca/es correu desti, Subject=Assumpte del missatge
function EnviaCorreu ($fitxcos, $Desti, $Subject) {
echo $fitxcos."\r\n";
echo $Desti."\r\n";
echo $Subject."\r\n";

//Create a new PHPMailer instance
$mail = new PHPMailer;
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "botigateixit@gmail.com";
$mail->Password = "btgtxt15";

//Fixem el correu com a HTML
$mail->IsHTML(true);

//Set who the message is to be sent from
$mail->setFrom('botigateixit@gmail.com', 'Botiga Teixit de la Terra - Quartera');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($Desti);

//Posem amb CC botigateixit@gmail.com
$mail->addCC("botigateixit@gmail.com");

// *************************** CAL RESOLDRE EL TEMA DE MULTIPLES DESTINATARIS amb comes ******************************************

//Calculem la setmana en format dia del dilluns de la setmana, en catala
setlocale(LC_ALL, 'ca_CA');
$setmana = strftime ("%e %B");

// Fixem el assumpte del missatge
$mail->Subject = $Subject;

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML(file_get_contents($fitxcos));

//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    return "Mailer Error: " . $mail->ErrorInfo;
} else {
    return 0;
}

}

// Funcio que obte la adreca de correu del proveidor mitjancant el seu codi
// i el fitxer proveidors-email, sino retorna el del codi 99.
function AdreProv ($CodiProv) {
$handle = fopen ("proveidors-email","r");

if ($handle) {
    while (($buffer = fscanf($handle, "%s\t%s\n"))) {
        list ($codi,$email) = $buffer;
        if ($codi == $CodiProv) {
                break;
                }
    }
    fclose($handle);
}
return $email;
}



// *********************************************************** FI FUNCIONS **************************************************


// Obtenim les dates de tractament dels paràmetres i sino es calculen segons la data execucio
echo "Nombre d'arguments".$argc."\r\n";
if ($argc == 1) {
	$today  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
	$lastweek = mktime(0, 0, 0, date("m") , date("d")-20, date("Y"));

	$avui = date ("Y-m-d H:i:s",$today);
	$avui_7 = date ("Y-m-d H:i:s",$lastweek);
	} else {
	$avui = $argv[2];
	$avui_7 = $argv[1];
	}
echo $avui."\r\n";
echo $avui_7."\r\n";

//fixem la zona horaria
date_default_timezone_set('Europe/Madrid');

// Verifiquem existencia directori any, sino el creem
$dirany = "../gestio/".date("Y");
if (!file_exists($dirany)) 
	if (mkdir($dirany)) echo "Directori".date("Y")."creat\r\n";

// Definició del fitxer de log
$log = "../gestio/main.log";

// Inicialitzem el log
//$dadeslog = "Dia execucio Tractament comandes: ".$avui.PHP_EOL.PHP_EOL;
//file_put_contents ($log, $dadeslog);

// Dades de la BBDD
$servername = getenv('OPENSHIFT_MYSQL_DB_HOST');
$username = "webbotiga";
$password = "wbbtg15";
$dbname = "botiga";
$dbport = getenv('OPENSHIFT_MYSQL_DB_PORT');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $dbport);
// Check connection
if ($conn->connect_error) {
    $dadeslog = "Error connexio BBDD !!!";
    file_put_contents ($log, $dadeslog, FILE_APPEND);
    die("Connection failed: " . $conn->connect_error);
}

// Recuperem les comandes que hem tractat i que canviarem a estatus 14 
$sql = "SELECT p.id_order, p.reference, p.current_state, p.date_add
FROM ps_orders p
WHERE ((p.current_state=2) OR (p.current_state=3))";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciem procés de tancament de comandes
    $dadeslog= "Tancament de comandes".PHP_EOL;
	file_put_contents ($log, $dadeslog, FILE_APPEND);
    while($row = $result->fetch_assoc()) {
		$objOrder = new Order($row["id_order"]); // Seleccionem comanda a tancar
		$history = new OrderHistory();
		$history->id_order = (int)$objOrder->id;
		$history->id_order_state = (int)(14);
		$history->changeIdOrderState((int)14, (int)($objOrder->id)); //order status=14 que es per pagament contrareembolsament
		$history->addWithemail(true);
        $dadeslog= "Comanda numero: ".$row["id_order"]." tancada".PHP_EOL;
		file_put_contents ($log, $dadeslog, FILE_APPEND);	
    }
} else {
// sino hi ha comandes tanquem la connexio i acabem
    $dadeslog = "No hi ha comandes a tractar: 0 results".PHP_EOL;
    file_put_contents ($log, $dadeslog, FILE_APPEND);
    $conn->close();
    exit;	
}

$conn->close();
?> 

