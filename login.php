<?php
session_start();
$name=$_GET["username"];
$pass=$_GET["password"];

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
$username = $_GET["username"];
$password = $_GET["password"];
$pwd = null;

$sql = "select password from user where username = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s',$username);

if($stmt->execute()){
    $result = $stmt->bind_result($password);
    while($stmt->fetch()){
        $pwd = $password;
    }
}
$stmt->free_result();
$stmt->close();
$conn->close();

if(strlen(trim($_GET["username"]))>0 && strlen(trim($pass))>=6 && !isset($_SESSION["username"]) && $password==$pwd ){
    echo $name."登录成功，密码为{$pass}";
    $_SESSION["username"]=$name;
}else if(isset($_SESSION["username"]) && $_SESSION["username"]==$name){
    echo $_SESSION["username"]."您已经登录";
    unset($_SESSION["username"]);
}else{
    echo "登录失败";
}