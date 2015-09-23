<?php

// Obtenim les dates de tractament dels paràmetres i sino es calculen segons la data execucio
echo "Nombre d'arguments".$argc."\r\n";
if ($argc == 1) {
	$today  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
	$lastweek = mktime(0, 0, 0, date("m") , date("d")-10, date("Y"));

	$avui = date ("Y-m-d H:i:s",$today);
	$avui_7 = date ("Y-m-d H:i:s",$lastweek);
	} else {
	$avui = $argv[2];
	$avui_7 = $argv[1];
	}
echo $avui."\r\n";
echo $avui_7."\r\n";

// Definició del fitxer de log
$log = "main.log";

// Inicialitzem el log
$dadeslog = "Dia execucio Tractament comandes: ".$avui.PHP_EOL.PHP_EOL;
file_put_contents ($log, $dadeslog);

// Dades de la BBDD
$servername = getenv('OPENSHIFT_MYSQL_DB_HOST');
$username = "adminm7XV1aT";
$password = "Xf1zVBZCd4ug";
$dbname = "botiga";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
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


// Consulta SQL per al detall de les comandes per a cada proveïdor
$sql = "SELECT pd.`product_name` AS Producte , SUM(pd.`product_quantity`) AS Quantitat , ps.`name` AS Proveidor
FROM ps_orders p
LEFT JOIN ps_order_detail pd ON (p.`id_order`=pd.`id_order`)
LEFT JOIN ps_product_supplier pps ON (pd.`product_id`=pps.`id_product`)
LEFT JOIN ps_supplier ps ON (pps.`id_supplier`=ps.`id_supplier`)
WHERE ((p.`current_state`< 4) OR ((p.`current_state`< 14) AND (p.`current_state`> 8))) AND (pps.`id_supplier`= 3)
GROUP BY pd.`product_id`;";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	echo sprintf ("%1$-40s\t%2$-10s\t%3$-20s\r\n","Producte","Quantitat","Proveïdor");
        echo sprintf ("%'=75s\r\n","=");
    while($row = $result->fetch_assoc()) {
//        echo $row["Producte"]. "\t" . $row["Quantitat"]. "\t " . $row["Proveidor"]. "\r\n";
	echo sprintf ("%1$-40s\t%2$-10s\t%3$-20s\r\n",$row["Producte"],$row["Quantitat"],$row["Proveidor"]);
    }
} else {
    echo "0 results";
}
$conn->close();
?> 
