<?php
include_once("../controllers/getUserList.php");

$arr = getUserList($conn);
echo json_encode($arr);