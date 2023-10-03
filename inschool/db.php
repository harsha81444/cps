<?php 
$con=new PDO("mysql:host=localhost;dbname=cps",'root','');
if(!$con)
{
	echo "db not connected";
}

?>