<?php  

$user = "Omar";

$bbdd= "b109762fd872ef5a662e9995ecc7aa5dfd3dcda3";

if(sha1($user)==$bbdd){
	echo "Logeado";
}
else{
	echo "die";
}


?>