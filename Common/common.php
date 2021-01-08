<?php
function getLastime(){
    if(!empty($_COOKIE['lastVisit'])){
        echo "你上次登陸時間是".$_COOKIE['lastVisit'];
        //更新時間
        setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
    }else {
        echo "你是第一次登陸";
        //更新時間
        setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
    }
}
function getcookieVal($key){
    if(empty($_COOKIE[$key])){
        return "";
    }else {
        return $_COOKIE[$key];
    }
}
//把驗證用戶是否用戶封裝到一個函數內
function checkuserValidate(){
    //關閉PHPdebug
    // error_reporting(0);  
    if(!session_id()){
      session_start();
    }
    if(empty($_SESSION['loginuser'])){
        header("Location:../index.php?error=1");
        exit();
    }
  
}




?>