<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
//$conn = mysqli_connect($servername,$username,$password,$dbname);
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("connect failed:" . mysqli_connect_error());
}
$conn->set_charset("utf8");
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];

$sql = "insert into user values(null,?,?,?)";
//$sql = "select * from user where username in (?,?) ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss',$username,$password,$name);

if($stmt->execute()){
    echo "注册成功";
}

$stmt->close();
$conn->close();
