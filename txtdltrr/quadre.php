<?php

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
$log = "../gestio/quadre.log";

// Inicialitzem el log
$ara = date("Ymd_H:i:s");
$dadeslog = "Dia/Hora execucio Quadre: ".$ara.PHP_EOL.PHP_EOL;
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

//************************* En aquest punt cal veure quines comandes hem de tractar per fer el quadre *****************************
// de moment utilitzem aquesta per veure com queda el document de quadre

// Aquesta query es per fer el quadre per proveïdors
$sql="SELECT IFNULL(pd.`product_name`,'Total') AS Producte , SUM(pd.`product_quantity`) AS Quantitat , cast(pd.`unit_price_tax_incl` as decimal(10,2)) AS Preu
   , cast(SUM(pd.`total_price_tax_incl`) as decimal(10,2)) AS Total, IFNULL(ps.`name`,'Total') AS Proveidor
   FROM ps_orders p
   LEFT JOIN ps_order_detail pd ON (p.`id_order`=pd.`id_order`)
   LEFT JOIN ps_product_supplier pps ON (pd.`product_id`=pps.`id_product`)
   LEFT JOIN ps_supplier ps ON (pps.`id_supplier`=ps.`id_supplier`)
   WHERE (p.`current_state` = 2) OR (p.`current_state` = 14) 
   GROUP BY ps.`name`,pd.`product_name` with ROLLUP;";
   
$rproductes = $conn->query($sql);

// Amb el resultat generem la informacio del quadre per proveïdor
if ($rproductes->num_rows > 0) {
   	// Gravem nombre de linies, productes
       	$dadeslog= "Productes: ".$rproductes->num_rows.PHP_EOL;
       	file_put_contents ($log, $dadeslog, FILE_APPEND);
	// Gravem les dades de la comanda en el fitxer destinat a aquest proveidor en format HTML i a partir de la plantilla
		$fprov = "../gestio/".date("Y")."/".$ara."_quadre.html";
		$dadeslog= file_get_contents("./plantilles/doc_quadre.htm_");
		$dadeslog.= "<p>Quadre per Prove&iuml;dor:</p>".PHP_EOL;
		$dadeslog.= "<table>".PHP_EOL."<tr bgcolor= #f0f8ff><th>Producte</th><th>Quantitat</th><th>Preu</th><th>Total</th><th>Prove&iuml;dor</th></tr>".PHP_EOL;
        while($prodrow = $rproductes->fetch_assoc()) {
			if ($prodrow['Producte'] == 'Total' ) {
			// Si es un Total, pintem la fila de color blau
				$dadeslog.= "<tr bgcolor= #6495ed><td>".$prodrow['Producte']."</td><td>".$prodrow['Quantitat']."</td><td>".$prodrow['Preu']."</td><td>".$prodrow['Total']."</td><td>".$prodrow['Proveidor']."</td></tr>".PHP_EOL;
			} else {
				$dadeslog.= "<tr><td>".$prodrow['Producte']."</td><td>".$prodrow['Quantitat']."</td><td>".$prodrow['Preu']."</td><td>".$prodrow['Total']."</td><td>".$prodrow['Proveidor']."</td></tr>".PHP_EOL;
			}	
   		}
    // Tanquem amb la plantilla de fi de missatge el fitxer html i gravem
		$dadeslog.= file_get_contents("./plantilles/fidoc_quadre.htm_");
       	file_put_contents ($fprov, $dadeslog);
} else {
	// Gravem sino hi ha productes
    	$dadeslog = "No hi ha informacio per al quadre".PHP_EOL;
    	file_put_contents ($log, $dadeslog, FILE_APPEND);
}

$conn->close();
?> 
