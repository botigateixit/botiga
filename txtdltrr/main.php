<?php
require './PHPMailer/PHPMailerAutoload.php';

// ************************************************************* FUNCIONS ***************************************************

//Funcio que envia el correu tant per Rebre com per proveidor:
//ProvReb= R (Rebre), P (Proveidor), fitxcos=fitxer que té el cos del missatge, Desti=adreca/es correu desti
//NomProv=Nom del proveidor
function EnviaCorreu ($ProvReb, $fitxcos, $Desti, $NomProv) {
echo $ProvReb."\r\n";
echo $fitxcos."\r\n";
echo $Desti."\r\n";
echo $NomProv."\r\n";

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

//Fixem el correu com a Text, no HTML
$mail->ContentType = 'text/plain'; 
$mail->IsHTML(false);

//Set who the message is to be sent from
$mail->setFrom('botigateixit@gmail.com', 'Botiga Teixit de la Terra - Quartera');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
$mail->addAddress($Desti);

// *************************** CAL RESOLDRE EL TEMA DE MULTIPLES DESTINATARIS amb comes ******************************************

//fixem el cos del missatge que s'ha passat coma parametre
$cos = file_get_contents($fitxcos);

//Calculem la setmana en format dia del dilluns de la setmana, en catala
setlocale(LC_ALL, 'ca_CA');
$setmana = strftime ("%e %B");

switch ($ProvReb) {
        case "P":
		//Set the subject line
		$mail->Subject = 'Setmana del '.$setmana.' Comanda de '.$NomProv.' Teixit de la Terra (La Quartera)';
		$inici = "Hola,\r\n\r\nUs fem arribar la comanda per al Teixit de la Terra:\r\n\r\n";
		$precos = $inici."Local: La Quartera\r\nProveidor: ".$NomProv."\r\nSetmana: ".$setmana."\r\r\r\n";
		$cosfinal = $precos.$cos."\r\n\r\nUs agrairíem confirmació de recepció de la comanda.\r\n\r\nGràcies.\r\n";
		$mail->Body = $cosfinal;
		break;
	case "R":
                //Set the subject line
                $mail->Subject = "Rebre - Comanda setmana del: ".$setmana." ".$NomProv;
                $inici = "Hola,\r\n\r\nComanda per al Teixit de la Terra:\r\n\r\n";
                $precos = $inici."Local: La Quartera\r\nProveidor: ".$NomProv."\r\nSetmana: ".$setmana."\r\rn\r\n";
                $cosfinal = $precos.$cos."\r\n\r\nSalutacions\r\n";
                $mail->Body = $cosfinal;
                break;
	default:
		return "Tipus de missatge incorrecte no R ni P";
}

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

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

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    $dadeslog = "Error connexio BBDD !!!";
    file_put_contents ($log, $dadeslog, FILE_APPEND);
    die("Connection failed: " . $conn->connect_error);
}

// Gravem en el log les comandes que tractarem
$sql = "SELECT p.id_order, p.reference, p.current_state, p.date_add
FROM ps_orders p
WHERE ((p.current_state< 4) OR ((p.current_state< 14) AND (p.current_state> 8)))
AND p.date_add >= '$avui_7' AND p.date_add <= '$avui'";

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
    // Gravem el proveidor que tractem
        $dadeslog= "Proveidor: ".sprintf ("%1$-15s\t%2$-30s\r\n",$provrow["id_supplier"],$provrow["name"]).PHP_EOL;
        file_put_contents ($log, $dadeslog, FILE_APPEND);
    // Fem la query dels productes del proveidor tractat per comanda al proveidor
	$sql = "SELECT pd.`product_name` AS Producte , SUM(pd.`product_quantity`) AS Quantitat , ps.`name` AS Proveidor
	FROM ps_orders p
	LEFT JOIN ps_order_detail pd ON (p.`id_order`=pd.`id_order`)
	LEFT JOIN ps_product_supplier pps ON (pd.`product_id`=pps.`id_product`)
	LEFT JOIN ps_supplier ps ON (pps.`id_supplier`=ps.`id_supplier`)
	WHERE ((p.`current_state`< 4) OR ((p.`current_state`< 14) AND (p.`current_state`> 8)))
	AND p.date_add >= '$avui_7' AND p.date_add <= '$avui' AND (pps.`id_supplier`= $provrow[id_supplier])
	GROUP BY pd.`product_id`;";

        $rproductes = $conn->query($sql);

    // Amb el resultat generem la informacio a enviar
	if ($rproductes->num_rows > 0) {
    	// Gravem nombre de linies, productes
        	$dadeslog= "Productes: ".$rproductes->num_rows.PHP_EOL;
        	file_put_contents ($log, $dadeslog, FILE_APPEND);
	// Gravem les daddes de la comanda en el fitxer destinat a aquest proveidor
		$fprov = "./comandes/".date("Y")."/".date("Ymd").$provrow["name"];
                $dadeslog= sprintf ("%1$-40s%2$-10s%3$-20s\r\n","Producte","Quantitat","Proveïdor").PHP_EOL.sprintf ("%'=70s\r\n","=");
                file_put_contents ($fprov, $dadeslog);
    	    while($prodrow = $rproductes->fetch_assoc()) {
	        $dadeslog= sprintf ("%1$-40s%2$-10s%3$-20s\r\n",$prodrow["Producte"],$prodrow["Quantitat"],$prodrow["Proveidor"]);
        	file_put_contents ($fprov, $dadeslog, FILE_APPEND);
    		}
	// Enviem la comanda al proveidor
		echo "Enviem correu electronic\r\n";
		echo "Codi Proveidor: ".$provrow["id_supplier"]."\r\nNom: ".$provrow["name"]."\r\n";
		$Destinatari = AdreProv ($provrow["id_supplier"]);
		$res = EnviaCorreu ("P",$fprov,$Destinatari,$provrow["name"]);
		if ($res != 0) { echo $res;
		} else { echo "Correu enviat correctament \r\n";
		}
	// Fem la query dels productes del proveidor tractat per comanda al proveidor
        	$sql = "SELECT pd.`product_name` AS Producte , pd.`product_quantity` AS Quantitat, pc.`note` AS Num,
		CONCAT(pc.`lastname`,', ',pc.`firstname`) AS Client, ps.`name` AS Proveidor
        	FROM ps_orders p
        	LEFT JOIN ps_order_detail pd ON (p.`id_order`=pd.`id_order`)
        	LEFT JOIN ps_product_supplier pps ON (pd.`product_id`=pps.`id_product`)
        	LEFT JOIN ps_supplier ps ON (pps.`id_supplier`=ps.`id_supplier`)
		LEFT JOIN ps_customer pc ON (p.`id_customer`=pc.`id_customer`)
        	WHERE ((p.`current_state`< 4) OR ((p.`current_state`< 14) AND (p.`current_state`> 8)))
        	AND p.date_add >= '$avui_7' AND p.date_add <= '$avui' AND (pps.`id_supplier`= $provrow[id_supplier])
        	ORDER BY pc.`note`,pd.`product_name`;";

	        $rprebre = $conn->query($sql);

        	// Gravem les daddes de la comanda en el fitxer destinat al grup de rebre
                $fprovrebre = "./comandes/".date("Y")."/".date("Ymd")."_Rebre_".$provrow["name"];
                $dadeslog= sprintf ("%1$-40s\t%2$-10s\t%3$-5s\t%4$-40s\t%5$-20s\r\n","Producte","Quantitat","Num.","Client","Proveïdor").PHP_EOL.sprintf ("%'=130s\r\n","=");
                file_put_contents ($fprovrebre, $dadeslog);
            while($prowrebre = $rprebre->fetch_assoc()) {
                $dadeslog= sprintf ("%1$-40s\t%2$-10s\t%3$-5s\t%4$-40s\t%5$-20s\r\n",$prowrebre["Producte"],$prowrebre["Quantitat"],$prowrebre["Num"],$prowrebre["Client"],$prowrebre["Proveidor"]);
                file_put_contents ($fprovrebre, $dadeslog, FILE_APPEND);
                }

        // Enviem la comanda al grup de rebre
                echo "Enviem correu electronic grup rebre\r\n";
                echo "Codi Proveidor: ".$provrow["id_supplier"]."\r\nNom: ".$provrow["name"]."\r\n";
                $Destinatari = AdreProv ($provrow["id_supplier"]);
                $res = EnviaCorreu ("R",$fprovrebre,$correusrebre,$provrow["name"]);
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

$conn->close();
?> 

