<?php
include_once("../models/mysql_conn.php");

getUser($conn);
$conn->close();

//管理员登录
function getUser($conn)
{
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "select 1 from user where username=? and password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);

    $flag = "";
    if ($stmt->execute()) {
        $result = $stmt->bind_result($flag);
        if($stmt->fetch()){
            $_SESSION["username"] = $username;
            echo '登录成功';
            echo "<script>window.location.href='../views/admin/index.php'</script>";
        }else{
            echo "登录失败";
        }
    } else {
        echo $stmt->error;
    }

    $stmt->free_result();
    $stmt->close();
}

