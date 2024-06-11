<?php
include_once("../models/mysql_conn.php");

addUser($conn);
$conn->close();

//新增员工
function addUser($conn){

    $uaername = $_POST["username"];
    $workNo = $_POST["workNo"];

    $sql = "insert into user(username,workNo) values(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si',$uaername,$workNo);

    if($stmt->execute()){
        echo "<script>window.location.href='../views/admin/feedback.html'</script>";
    }else{
        echo $stmt->error;
    }

    $stmt->free_result();
    $stmt->close();
}