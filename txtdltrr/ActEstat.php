<?php
require('../config/config.inc.php');
require_once '../classes/order/Order.php';
require_once '../classes/order/OrderHistory.php';

echo 'canvi comanda 29 a estat 14 shipped\r\n'; 
$objOrder = new Order(29); //order with id=29
$history = new OrderHistory();
$history->id_order = (int)$objOrder->id;
$history->id_order_state = (int)(14);
$history->changeIdOrderState((int)14, (int)($objOrder->id)); //order status=14
$history->addWithemail(true);
echo 'done'; 
?>
