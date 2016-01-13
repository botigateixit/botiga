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

// Definició del fitxer de log
$log = "../gestio/main.log";

// Inicialitzem el log
$dadeslog = "Dia execucio Tractament comandes: ".$avui.PHP_EOL.PHP_EOL;
file_put_contents ($log, $dadeslog);

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

// Gravem en el log les comandes que tractarem
$sql = "SELECT p.id_order, p.reference, p.current_state, p.date_add
FROM ps_orders p
WHERE ((p.current_state=2) OR (p.current_state=3))";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
        $dadeslog= "Comandes que es tractaran".PHP_EOL.sprintf ("%1$-10s\t%2$-10s\t%3$-15s\t%4$-20s\r\n","id_order","reference","current_state","date_add").PHP_EOL.sprintf ("%'=67s\r\n","=").PHP_EOL;
	file_put_contents ($log, $dadeslog, FILE_APPEND);
    while($row = $result->fetch_assoc()) {
        $dadeslog= sprintf ("%1$-10s\t%2$-10s\t%3$-15s\t%4$-20s\r\n",$row["id_order"],$row["reference"],$row["current_state"],$row["date_add"]).PHP_EOL;
	file_put_contents ($log, $dadeslog, FILE_APPEND);	
    }
} else {
// sino hi ha comandes tanquem la connexio i acabem
    $dadeslog = "No hi ha comandes a tractar: 0 results".PHP_EOL;
    file_put_contents ($log, $dadeslog, FILE_APPEND);
    $conn->close();
    exit;	
}

// Obtenim totes les adreces de correu del grup de Rebre, grup=4
$sql = "SELECT pc.email FROM ps_customer_group pcg
LEFT JOIN ps_customer pc ON (pcg.id_customer=pc.id_customer)
WHERE (pcg.id_group= 4);";

$emailsrebre = $conn->query($sql);

if ($emailsrebre->num_rows > 0) {
// Afegim en una sola variable tots els destinataris de correu
	$primer = true;
	while($rower = $emailsrebre->fetch_assoc()) {
		if ($primer) {
			$correusrebre= $rower["email"];
			$primer = false;
		} else {
			$correusrebre= $correusrebre.",".$rower["email"];
		}
	}
}

// Iniciem el bucle per als proveidors actius
$sql = "SELECT id_supplier,name FROM ps_supplier WHERE active=1";

$rprov = $conn->query($sql);

if ($rprov->num_rows > 0) {
    while($provrow = $rprov->fetch_assoc()) {
	// Obtenim les dades de email i tipus_email de la taula tx_supplier	
	$sqlsupplier = "SELECT email,tipus_email FROM tx_supplier WHERE id_supplier =".$provrow['id_supplier'];
	$resultsupplier = $conn->query($sqlsupplier);
	if ($resultsupplier->num_rows > 0) {
		$rowsupplier = $resultsupplier->fetch_assoc();
		$Destinatari = $rowsupplier['email'];
		$Tipus_email = $rowsupplier['tipus_email'];
	} else {
	// sino hi ha proveidor a la taula tx_supplier
    $dadeslog = "No hi ha el proveidor: ".$provrow['id_supplier']." en la taula tx_supplier".PHP_EOL;
    file_put_contents ($log, $dadeslog, FILE_APPEND);
    $conn->close();
    exit;	
	}
    // Gravem el proveidor que tractem
    $dadeslog= "Proveidor: ".sprintf ("%1$-5s\t%2$-15s\t%3$-20s\t%4$-5s\r\n",$provrow["id_supplier"],$provrow["name"],$Destinatari,$Tipus_email).PHP_EOL;
    file_put_contents ($log, $dadeslog, FILE_APPEND);
    // Fem la query dels productes del proveidor tractat, per comanda al proveidor
	$sql = "SELECT pd.`product_name` AS Producte , SUM(pd.`product_quantity`) AS Quantitat , ps.`name` AS Proveidor
	FROM ps_orders p
	LEFT JOIN ps_order_detail pd ON (p.`id_order`=pd.`id_order`)
	LEFT JOIN ps_product pps ON (pd.`product_id`=pps.`id_product`)
	LEFT JOIN ps_supplier ps ON (pps.`id_supplier`=ps.`id_supplier`)
	WHERE ((p.current_state=2) OR (p.current_state=3)) AND (pps.`id_supplier`= $provrow[id_supplier])
	GROUP BY pd.`product_id`;";

        $rproductes = $conn->query($sql);

    // Amb el resultat generem la informacio a enviar
	if ($rproductes->num_rows > 0) {
    	// Gravem nombre de linies, productes
        	$dadeslog= "Productes: ".$rproductes->num_rows.PHP_EOL;
        	file_put_contents ($log, $dadeslog, FILE_APPEND);
	// Gravem les dades de la comanda en el fitxer destinat a aquest proveidor en format HTML i a partir de la plantilla
			$fprov = "../gestio/".date("Y")."/".date("Ymd").$provrow["name"].".html";
			$dadeslog= file_get_contents("./plantilles/mstg_prov.htm_");
			$dadeslog.= "<p>Local: La Quartera<br>Prove&iuml;dor:".$provrow["name"]."</p>".PHP_EOL;
			$dadeslog.= "<table class='TFtable'>".PHP_EOL."<tr><th>Producte</th><th>Quantitat</th><th>Prove&iuml;dor</th></tr>".PHP_EOL;
            while($prodrow = $rproductes->fetch_assoc()) {
				$dadeslog.= "<tr><td>".$prodrow['Producte']."</td><td>".$prodrow['Quantitat']."</td><td>".$prodrow['Proveidor']."</td></tr>".PHP_EOL;
    		}
    // Tanquem amb la plantilla de fi de missatge el fitxer html i gravem
			$dadeslog.= file_get_contents("./plantilles/fimstg_prov.htm_");
        	file_put_contents ($fprov, $dadeslog);

	// Enviem la comanda al proveidor
		echo "Enviem correu electronic\r\n";
		echo "Codi Proveidor: ".$provrow["id_supplier"]."\r\nNom: ".$provrow["name"]."\r\n";
		$Destinatari = AdreProv ($provrow["id_supplier"]);
		$Subject = "Teixit de la terra, La Quartera, comanda: ".$provrow["name"]." ".$avui;
		$res = EnviaCorreu ($fprov,$Destinatari,$Subject);
		if ($res != 0) { echo $res;
		} else { echo "Correu enviat correctament \r\n";
		}
	// Fem la query dels productes del proveidor tractat, per document de repartir pel grup de rebre
        	$sql = "SELECT pd.`product_name` AS Producte , pd.`product_quantity` AS Quantitat, pc.`note` AS Num,
		CONCAT(pc.`lastname`,', ',pc.`firstname`) AS Client, ps.`name` AS Proveidor
        	FROM ps_orders p
        	LEFT JOIN ps_order_detail pd ON (p.`id_order`=pd.`id_order`)
        	LEFT JOIN ps_product pps ON (pd.`product_id`=pps.`id_product`)
        	LEFT JOIN ps_supplier ps ON (pps.`id_supplier`=ps.`id_supplier`)
			LEFT JOIN ps_customer pc ON (p.`id_customer`=pc.`id_customer`)
        	WHERE ((p.current_state=2) OR (p.current_state=3)) AND (pps.`id_supplier`= $provrow[id_supplier])
        	ORDER BY pc.`note`,pd.`product_name`;";

	        $rprebre = $conn->query($sql);

        	// Gravem les dades de la comanda en el fitxer destinat al grup de rebre
                $fprovrebre = "../gestio/".date("Y")."/".date("Ymd")."_Rebre_".$provrow["name"].".html";
				$dadeslog= file_get_contents("./plantilles/mstg_rebre.htm_");
				$dadeslog.= "<p>Local: La Quartera<br>Prove&iuml;dor:".$provrow["name"]."</p>".PHP_EOL;
				$dadeslog.= "<table class='TFtable'>".PHP_EOL."<tr><th>Producte</th><th>Qtat.</th><th>Num.</th><th>Client</th><th>Prove&iuml;dor</th></tr>".PHP_EOL;
            while($prowrebre = $rprebre->fetch_assoc()) {
				$dadeslog.= "<tr><td>".$prowrebre['Producte']."</td><td>".$prowrebre['Quantitat']."</td><td>".$prowrebre['Num']."</td><td>".$prowrebre['Client']."</td><td>".$prowrebre['Proveidor']."</td></tr>".PHP_EOL;
                }

			// Tanquem amb la plantilla de fi de missatge el fitxer html i gravem
				$dadeslog.= file_get_contents("./plantilles/fimstg_rebre.htm_");
				file_put_contents ($fprovrebre, $dadeslog);


			// Enviem la comanda al grup de rebre
                echo "Enviem correu electronic grup rebre\r\n";
                echo "Codi Proveidor: ".$provrow["id_supplier"]."\r\nNom: ".$provrow["name"]."\r\n";
                $Destinatari = AdreProv ($provrow["id_supplier"]);
           		$Subject = "Comanda proveidor: ".$provrow["name"]." ".$avui;
				$res = EnviaCorreu ($fprovrebre,$Destinatari,$Subject);
                if ($res != 0) { echo $res;
                } else { echo "Correu enviat correctament \r\n";
		}

	} else {
	// Gravem sino hi ha productes
    	$dadeslog = "No hi ha productes".PHP_EOL;
    	file_put_contents ($log, $dadeslog, FILE_APPEND);
	}	
    }
} else {
// sino hi ha proveidors a tractar, tanquem la connexio i acabem
    $dadeslog = "No hi ha proveidors a tractar: 0 results".PHP_EOL;
    file_put_contents ($log, $dadeslog, FILE_APPEND);
    $conn->close();
    exit;
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

