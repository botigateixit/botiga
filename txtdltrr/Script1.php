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

$sql = "SELECT id_order,reference,id_customer,id_cart FROM ps_orders WHERE id_customer=2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id_order"]. " - Reference: " . $row["reference"]. " " . $row["id_customer"]. "\r\n";
    }
} else {
    echo "0 results";
}
$conn->close();
?> 