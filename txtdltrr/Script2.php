<?php
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

$sql = "SELECT pd.`product_name` AS Producte , SUM(pd.`product_quantity`) AS Quantitat , ps.`name` AS Proveidor
FROM ps_orders p
LEFT JOIN ps_order_detail pd ON (p.`id_order`=pd.`id_order`)
LEFT JOIN ps_product_supplier pps ON (pd.`product_id`=pps.`id_product`)
LEFT JOIN ps_supplier ps ON (pps.`id_supplier`=ps.`id_supplier`)
WHERE (p.`current_state`= 3) AND (pps.`id_supplier`= 3)
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