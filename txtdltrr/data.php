<?php
$today  = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
$lastweek = mktime(0, 0, 0, date("m") , date("d")-7, date("Y"));

$avui = date ("Y-m-d H:i:s",$today);
$darrerasetmana = date ("Y-m-d H:i:s",$lastweek);

setlocale(LC_ALL, 'ca_CA');
$setmana = strftime ("%e %B");

echo $avui."\r\n";
echo $darrerasetmana."\r\n";
echo $setmana."\r\n";

echo date ("Y");

?>
