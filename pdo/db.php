<?php 
$dns 		= "mysql:host=127.0.0.1;dbname=company;charset=utf8";
$username 	= "root";
$password 	= "abc";
$options 	= [];

try{
	$connection = new PDO($dns,$username,$password,$options);
}catch(PdoException $e){
	echo $e->getMessage();
}
?>