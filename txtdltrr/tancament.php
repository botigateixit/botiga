<?php
require './PHPMailer/PHPMailerAutoload.php';
require('../config/config.inc.php');
require_once '../classes/order/Order.php';
require_once '../classes/order/OrderHistory.php';

//fixem la zona horaria
date_default_timezone_set('Europe/Madrid');

// Definició del fitxer de log
$log = "../gestio/tancament.log";

// Inicialitzem el log
$ara = date("Ymd_H:i:s");
$dadeslog = "Dia execucio Tancament comandes: ".$ara.PHP_EOL.PHP_EOL;
file_put_contents ($log, $dadeslog, FILE_APPEND);

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

// Recuperem les comandes que estan en estatus 2 (payment accepted) o 14 (awaiting cash...) 
$sql = "SELECT p.id_order, p.reference, p.current_state, p.date_add
FROM ps_orders p
WHERE (p.`current_state` = 2) OR (p.`current_state` = 14)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Iniciem procés de tancament de comandes
    $dadeslog= "Tancament de comandes".PHP_EOL;
	file_put_contents ($log, $dadeslog, FILE_APPEND);
    while($row = $result->fetch_assoc()) {
		if ($row["current_state"] == 2) $nouestat = 5; // pagament OK, comanda estatus 5 (delivered)
		else $nouestat = 8; // no pagat, comanda estatus 8 (payment error)
		$objOrder = new Order($row["id_order"]); // Seleccionem comanda a tancar
		$history = new OrderHistory();
		$history->id_order = (int)$objOrder->id;
		$history->id_order_state = (int)($nouestat);
		$history->changeIdOrderState((int)$nouestat, (int)($objOrder->id)); //apliquem nou estatus
		$dadeslog= "Comanda numero: ".$row["id_order"]." tancada amb estatus".$nouestat.PHP_EOL;
		file_put_contents ($log, $dadeslog, FILE_APPEND);	
    }
} else {
// sino hi ha comandes tanquem la connexio i acabem
    $dadeslog = "No hi ha comandes a tancar: 0 results".PHP_EOL;
    file_put_contents ($log, $dadeslog, FILE_APPEND);
    $conn->close();
    exit;	
}

$conn->close();
?> 

