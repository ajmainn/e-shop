<?php
function getConnection()
{
	$servername="localhost";
    $username="root";
    $pass="";
    $dbname="electronic_shop";
    $conn= new mysqli($servername,$username,$pass,$dbname);
    return $conn;
}
?>