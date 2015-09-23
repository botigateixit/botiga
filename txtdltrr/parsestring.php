<?php

$str = "sastrej@gmail.com,xavi.sastre@gmail.com,alsdkjf@gmail.com,asñdfasl@gmail.com";
//$str = "sastrej@gmail.com,xavi.sastre@gmail.com";
// $str = "sastrej@gmail.com";

$str1 = "fi de bucle";
$pos = strpos($str,",");
echo "Posicio del tabulador: ".$pos."\r\n";

while (($pos = strpos($str,",")) !== false) {
	$n = sscanf ($str,"%[^,],%s",$addr,$str1);
	echo "Retorn de sscanf: ".$n."\r\n";
	echo "Afegim addadress de:".$addr."\r\n";
	echo "Var str1: ".$str1."\r\n";
	$str = $str1;
	echo "Var str: ".$str."\r\n";
	}

echo "Fem addadress de: ".$str1."\r\n";

?> 
