<?php 
session_start();
require_once("mysql_connect.inc.php");



//------------------------驗證規則----------------------------------

if(empty($_POST["username"])){
    die("Name is required");
}


if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    die("Valid email is Required");
}

if(strlen($_POST["password"])<4){
    die("Password must be at least 8 characters");
}

if(!preg_match("/[a-z]/i",$_POST["password"])){
    die("Password must contain at least one later");
}

if(!preg_match("/[0-1]/i",$_POST["password"])){
    die("Password must contain at least one number");
}

if($_POST["password"] !== $_POST["password_check"]){
    die("Passwords must match");
}

//-------------------------------------------------------

$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

$password_hash=password_hash($password,PASSWORD_DEFAULT);

if($_SERVER["REQUEST_METHOD"]=="POST"){

    //檢查帳號是否重複
    $check = "SELECT * FROM users WHERE email = '".$email."'";
    $result = $mydb->query($check);
  
    if($result->num_rows == 0){
        //編輯id
        $count = "SELECT *  from users";
        $result= $mydb->query($count);
        $id = $result->num_rows;
 
        //新增帳號
        $sql="INSERT INTO users (id, users_name, users_pwd, email )
            VALUES('" .$id. "','".$username."','".$password."','".$email."')";

        if($mydb->query($sql) == TRUE){
            echo "註冊成功!3秒後將自動跳轉頁面<br>";
            echo'<meta http-equiv=REFRESH CONTENT=3;url=index.php>';
            $mydb->close();

        }else{
            echo "Error creating table: " ;
            echo'<meta http-equiv=REFRESH CONTENT=0;url=signup.php>';
            $mydb->close();
        }
    }
    else{
        echo "該帳號已有人使用!<br>3秒後將自動跳轉頁面<br>";
        echo'<meta http-equiv=REFRESH CONTENT=3;url=signup.php>';
        $mydb->close();
    }
  
}



?>