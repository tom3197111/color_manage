<?php

require_once dirname(dirname(__FILE__)).'\Common\SqlHelper.php';

// require_once dirname(__FILE__).'/Model/color.class.php';
class log_Service
{
    function __construct() {
        if(!session_id()){
          session_start();
        }
        date_default_timezone_set("Asia/Taipei");

    }
    // 添加一個方法
    function addLog($sql)
    {   
        // 做一個SQL語句
        $account = $_SESSION['loginuser'];
        $time_date =date("Y-m-d H-i-s");
        $sql = "insert into log
        (account,execute_sql,time_date)
        values('$account','$sql','$time_date');";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        // 釋放資源和關閉連接
        mysqli_free_result($res);
        // 關閉連接
        $sqlHelper->close_connect();
        return $res;
    }
    function account_log_date($login_log){
        // 做一個SQL語句
        $account = $_SESSION['loginuser'];
        $time_date =date("Y-m-d H-i-s");
        if($login_log == 'login'){
        $sql = "insert into account_usage_record(account,log_in_time_date)values('$account','$time_date');";
        }else if($login_log == 'logout' ){
        $sql = "insert into account_usage_record(account,log_out_time_date)values('$account','$time_date');";
        }
        // $sql = "insert into account_usage_record(account,log_in_time_date,log_on_time_date)values('$account','$log_in_time_date','$log_on_time_date');";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        // 關閉連接
        $sqlHelper->close_connect();
        return $res;

    }


}
?>