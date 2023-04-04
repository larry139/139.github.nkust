<?php
//設定文件採UTF8編碼
header("Content-Type:text/html; charset=utf-8");
//主機位址
$db_server= "localhost";
//資料庫管理者帳號
$db_user  = "root";
//資料庫管理者密碼。如果未設定密碼，則以空字串""表示
$db_passwd= "";
//資料庫名稱
$db_name  = "sport_project";

$mydb = new mysqli($db_server, $db_user, $db_passwd, $db_name);
if($mydb->connect_error) {
	die("Connect to MySQL failed.");
}
$mydb->query("SET NAMES utf8");
?> 
<?php

