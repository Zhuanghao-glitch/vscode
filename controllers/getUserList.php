<?php
include_once("../models/mysql_conn.php");


//查询员工信息列表
function getUserList($conn)
{
    $arr = array();
    $uid = null;
    $username = null;
    $workNo = null;
    $sql = "select uid,username,workNo from user where username <> 'admin' ";
    $stmt = $conn->prepare($sql);

    $flag = "";
    if ($stmt->execute()) {
        $stmt->bind_result($uid,$username,$workNo);
        while($stmt->fetch()){
            array_push($arr,array($uid,$username,$workNo));
        }
    } else {
        echo $stmt->error;
    }

    $stmt->free_result();
    $stmt->close();
    $conn->close();

    return $arr;
}
