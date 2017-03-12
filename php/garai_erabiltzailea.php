<?php
$user = 'root';
$pass = '';
$db = 'testdb';
$db = new mysqli('localhost',$user,$pass);

$con=mysql_connect("localhost",$user,$pass);
$msyql_select_db($user,$con);
$sententzia='INSERT INTO TOKIAN_TOKIKO';

?>