<?php
require_once dirname(dirname(__FILE__)).'/Model/FenVePage.php';
// 這是一個工具類 作用是完成對數據庫的操作
class SqlHelper
{

    public $conn;

    public $dbname = "colour_manage";

    public $username = "root";

    public $password = "root";

    //public $password = "8968";

    public $host = "localhost";

    public function __construct()
    {           
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->dbname);
        ;
        mysqli_query($this->conn,"SET CHARACTER SET UTF8");
        if (! $this->conn) {
            die("連接失敗" . mysqli_errno($this->conn));
        }

    }

    // 執行dql語句
    public function execute_dql($sql)
    {
        mysqli_query($this->conn,"SET CHARACTER SET UTF8");
        $res = mysqli_query($this->conn, $sql) or die(mysqli_errno($this->conn));
        
        return $res;
    }

    // 執行dql語句 但是返回的是一個數組
    public function execute_dql2($sql)
    {  
        $arr = array();
        mysqli_query($this->conn,"SET CHARACTER SET UTF8");
        $res = mysqli_query($this->conn, $sql) or die(mysqli_errno($this->conn));
        $i = 0;
        // 把$res=>$arr
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[$i ++] = $row;
        }
        // 這裡就可以馬上把$res關閉
        mysqli_free_result($res);
        return $arr;
    }

    // 考慮分頁情況的查詢 這是一個比較通用 並體現OOP編程思想的代碼
    // $sql1="select * from where 表名 limit 0,6";
    // $sql2="select count(id) from 表名 ";
    public function exectue_dql_fenye($sql, $sql2, $fenyPage)
    {
        // 這裡我們查詢了要分頁顯示的數據
        mysqli_query($this->conn,"SET CHARACTER SET UTF8");
        $res = mysqli_query($this->conn, $sql) or die(mysqli_errno($this->conn));
        // res=>array();
        $arr = array();
        // $res轉移到$arr
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }
        //釋放結果集
        mysqli_free_result($res);
        // $sql2="select count(id) from 表名 ";
        mysqli_query($this->conn,"SET CHARACTER SET UTF8");
        $res2 = mysqli_query($this->conn, $sql2) or die(mysqli_errno($this->conn));
        
        if ($row = mysqli_fetch_row($res2)) {
            //ceil() 無條件進位
            $fenyPage->pageCount = ceil($row[0] / $fenyPage->pageSize);
            $fenyPage->rowCount = $row[0];
        }
        //釋放結果集
        mysqli_free_result($res2);
        
        // 把導航信息也封裝到fenyPage
        // 顯示上一頁和下一頁
        $navigate = "";
        if ($fenyPage->pageNow > 1) {
            $prePage = $fenyPage->pageNow - 1;
            $navigate = "<div class='page' ><a href='{$fenyPage->gotoUrl}?pageNow=$prePage'>上一頁</a>";
        }

        

        //floor()向下取整
//         $start = floor(($fenyPage->pageNow - 1) / $page_whole) * $page_whole + 1;
        $start = 1;
//         $index = $start;
        // 整體每十頁 向前翻
        // 如果當前pageNow在1-10頁數 就沒有向前翻動的超連接
//         $abc = $start - 1;
//         if ($fenyPage->pageNow > $page_whole) {
//             $navigate .= "&nbsp;&nbsp;<a href='{$fenyPage->gotoUrl}?pageNow=$abc'>&nbsp;&nbsp;<<&nbsp;&nbsp;</a>";
//         }
        for (; $start <= $fenyPage->pageCount; $start ++) {
            $navigate .= "<a href='{$fenyPage->gotoUrl}?pageNow=$start'>[ $start ] </a>";
        }
        // 整體每十頁翻動
//         if ($fenyPage->pageNow < $page_whole) {
//             $navigate .= "&nbsp;&nbsp;<a href='{$fenyPage->gotoUrl}?pageNow=$start'>&nbsp;&nbsp;>>&nbsp;&nbsp;</a>";
//         }
        if ($fenyPage->pageNow < $fenyPage->pageCount) {
            $nextPage = $fenyPage->pageNow + 1;
            $navigate .= "<a href='{$fenyPage->gotoUrl}?pageNow=$nextPage'>下一頁</a>";
        }
        
        // 顯示當前頁和共有多少頁
        $navigate .= "<h6>當前頁{$fenyPage->pageNow}/共{$fenyPage->pageCount}頁</h6></div>";
        // 把$arr賦給$fenyPage
        $fenyPage->res_array = $arr;
        $fenyPage->navigate = $navigate;
    }

    // 執行dml語句
    public function execute_dml($sql)
    {   
        mysqli_query($this->conn,"SET CHARACTER SET UTF8");
        $b = mysqli_query($this->conn, $sql) or die(mysqli_errno($this->conn));
        if (!$b) {
            return 0; // 失敗
        } else {
            if (mysqli_affected_rows($this->conn) > 0) {
                //關閉連線
                return 1; // 表示執行成功
            } else {
                return 2; // 表示沒有受到影響
            }
        }
    }

    // 關閉連接的方法
    public function close_connect()
    {
        if (empty($this->conn)) {
            mysqli_close($this->conn);
        }
    }

}


?>