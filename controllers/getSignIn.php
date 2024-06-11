<?php
include_once("../models/mysql_conn.php");

getUser($conn);
$conn->close();

//员工登录
function getUser($conn)
{

    $username = $_POST["username"];
    $workNo = $_POST["workNo"];

    $sql = "select 1 from user where username=? and workNo=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $username, $workNo);

    $flag = "";
    if ($stmt->execute()) {
        $result = $stmt->bind_result($flag);
        if($stmt->fetch()){
            echo "<script>window.location.href='../views/user/feedback.html'</script>";
        }else{
            echo "打卡失败";
        }
    } else {
        echo $stmt->error;
    }

    $stmt->free_result();
    $stmt->close();
}
