<?php
$log = 'main.log';

$dadeslog= sprintf ("%1$-40s\t%2$-10s\t%3$-20s\r\n","Producte","Quantitat","Proveïdor").PHP_EOL.sprintf ("%'=75s\r\n","=");

file_put_contents ($log, $dadeslog);

?>
