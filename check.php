<?php
session_start();
require_once "mysql_connect.inc.php";
$email  = $_POST['email'];
$users_pwd = $_POST['users_pwd'];
if (empty($email) OR empty($users_pwd)) {
	echo "欄位不可空白。";
	echo "<meta http-equiv=REFRESH CONTENT=0.5;url=index.php>";
} else {

    $sql = "SELECT * FROM users WHERE id = '".$email."'and users_pwd='".$users_pwd."' ";
	$result = $mydb->query($sql);	//執行query指令，查詢使用者身分
	if($result->num_rows > 0){    //帳號與密碼正確
		$_SESSION['email']=$email;  //設定此使用者的SESSION變數
		echo "<meta http-equiv=REFRESH CONTENT=0;url=main.php>";
	}else{		
		echo "帳號或密碼錯誤，請重新輸入。<br><br>(2秒後自動返回)";
		echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
	  }
}


?>