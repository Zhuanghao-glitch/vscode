<?php

session_start();
unset($_SESSION["username"]);

echo "<script>alert('退出成功！');window.location.href='../views/admin/login.html';</script> ";
