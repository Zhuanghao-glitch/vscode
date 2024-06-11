<?php
session_start();
$name=$_POST['username'];

if(isset($_SESSION["username"]) && $_SESSION["username"]==$name){
    echo "已经登录过";
}else{
    echo "登录成功";
    $_SESSION["username"]=$name;
    
}
