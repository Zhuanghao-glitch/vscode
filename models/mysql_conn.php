<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn->connect_errno){
    die($conn->connect_error);
}
$conn->set_charset("utf8");

session_start();