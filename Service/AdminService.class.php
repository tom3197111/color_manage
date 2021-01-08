<?php
require_once dirname(dirname(__FILE__)).'/Common/SqlHelper.php';
require_once dirname(dirname(__FILE__)).'/Service/log_Service.php';
// 該類是一個業務邏輯類 主要完成對admin表的操作
class AdminService
{   
    function __construct() {
        session_start();
    }    

    // 提供一個驗證用戶是否合法的方法
    public function ChekAdmin($id, $password)
    {   
        $sql = "select password,account,grade from user where account='$id'";
        // 創建一個SqlHelper對象
        $sqlHelper = new SqlHelper();
        
        $res = $sqlHelper->execute_dql($sql);
       

        if ($row = mysqli_fetch_assoc($res)) {
            if ($password == $row['password']) {
                $_SESSION['grade']= $row['grade'];
                $_SESSION['loginuser']= $row['account'];
            }else{
                header("Location: ../index.php?error=1");
                exit();
            }
        }
        //log紀錄
        $login_log='login';
        $Log_Service = new log_Service();
        $Log_Service->account_log_date($login_log);
        // 釋放資源
        mysqli_free_result($res);
        // 關閉連接
        $sqlHelper->close_connect();
        return $row['account'];
    }
}
?>