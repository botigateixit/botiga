<?php

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

$Addr = AdreProv(8);
echo $Addr."\r\n";

?> 
