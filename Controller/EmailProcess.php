<?php
    if(!session_id()){
      session_start();
    }   
header("Content-Type:text/html; charset=utf-8");
ini_set('SMTP', 'iga.com.tw');
// $_SESSION['postData']=$_REQUEST['oper'];

if(!empty($_REQUEST['oper'])) {
    //接收oper值
    $oper=$_REQUEST['oper'];
    if($oper=="Email"){
        $to ="m3197111@iga.com.tw "; //收件者
        $headers=$_POST['headers'];
        $headers = "From:".$headers; //寄件者
        $subject=$_POST['subject'];
        $msg=$_POST['msg'];
        if(mail("$to", "$subject", "$msg", "$headers")){
            // $_SESSION['postData']='寄信成功';
            return true ;
        }else{
            // $_SESSION['postData']='寄信失敗';
            return false;
        }
    }
}
?>