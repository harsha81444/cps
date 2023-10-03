<?php
/* Check if this is a valid include */
if (!defined('IN_SCRIPT')) {die('Invalid attempt');} 
error_reporting(0);
$host="localhost";
$name="root";
$pass="";
$db_name="cps";
mysql_connect($host,$name,$pass) or die("Could not connect");
mysql_select_db($db_name);
?>