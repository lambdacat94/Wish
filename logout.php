<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
</body>
</html>
<?php

session_start();
// 这种方法是将原来注册的某个变量销毁
unset($_SESSION["admin"]);

// 这种方法是销毁整个 Session 文件
session_destroy();
echo "<script>location.href='index.php';</script>";
?>
