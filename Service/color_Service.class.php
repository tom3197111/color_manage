<?php
require_once dirname(dirname(__FILE__)).'/Common/SqlHelper.php';
require_once dirname(dirname(__FILE__)).'/Model/color.class.php';
require_once dirname(dirname(__FILE__)).'/Service/log_Service.php';
class color_Service
{   
        function __construct() {
        if(!session_id()){
          session_start();
        }
        date_default_timezone_set("Asia/Taipei");

         // $this->selectcolor('1325',$pan,$guest, $Book_Name,$content, $number);
    }
    function updatecolor($id, $guest, $Book_Name, $content, $number,$Remarks,$proportion)
    {
        $sql = "update colour_manage set guest='$guest',
            Book_Name='$Book_Name',content='$content',number='$number',Remarks = '$Remarks' ,proportion = '$proportion'where id='$id' ";
        $sqlHelper = new SqlHelper();
        $res1=$this->selectcolor($id);
        $res = $sqlHelper->execute_dml($sql);
        //log紀錄
        $sql="\n將編碼:".$id."\n";
        if($pan!=""){
            $sql.="的pan:".$res1['0']['pan']."\n修改為:".$pan."\n";
        }
        if($guest!=""){
            $sql.="將客戶:".$res1['0']['guest']."\n修改為:".$guest."\n";
        }
        if($Book_Name!=""){
            $sql.="將書名:".$res1['0']['Book_Name']."\n修改為:".$Book_Name."\n";
        }
        if($content!=""){
            $sql.="將內容:".$res1['0']['content']."\n修改為:".$content."\n";
        }
        if($number!=""){
            $sql.="將色票號碼:".$res1['0']['number']."\n修改為:".$number."\n";
        }
        if($Remarks!=""){
            $sql.="將備註:".$res1['0']['Remarks']."\n修改為:".$Remarks."\n";
        }
        if($proportion!=""){
            $sql.="將油墨比例:".$res1['0']['proportion']."\n修改為:".$proportion;
        }
        $Log_Service = new log_Service();
        $Log_Service->addLog($sql);
        $sqlHelper->close_connect();
        return $res;
    }

    // 根據ID獲取一個色票的信息
    function getcolor_ById($id)
    {
        $sql = "select * from colour_manage where id=$id";
        $sqlHelper = new SqlHelper();
        $arr = $sqlHelper->execute_dql2($sql);
        $sqlHelper->close_connect();
        // 二次封裝 $arr->colro對象實例
        // 創建 colro對象實例
        $color = new Color();
        $color->setId($arr[0]['id']);
        $color->setPan($arr[0]['pan']);
        $color->setGuest($arr[0]['guest']);
        $color->setBook_Name($arr[0]['Book_Name']);
        $color->setContent($arr[0]['content']);
        $color->setNumber($arr[0]['number']);
        $color->setRemarks($arr[0]['Remarks']);
        $color->setProportion($arr[0]['proportion']);
        return $color;
    }

    // 添加一個方法
    function addcolor($pan, $guest, $Book_Name, $content, $number,$Remarks,$proportion)
    {   
        $insert_date =date("Y-m-d H-i-s");
        // 做一個SQL語句
        $sql = "insert into colour_manage(pan,guest,Book_Name,content,number,Remarks,proportion,insert_date) 
        values('$pan','$guest','$Book_Name','$content','$number','$Remarks','$proportion','$insert_date')";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dml($sql);
        //log紀錄
        // $sql="insert into colour_manage(pan=".$pan.",guest=".$guest.",Book_Name=".$Book_Name.",content=".$content.",number = ".$number.",Remarks=".$Remarks.",proportion = ".$proportion.")";
        //         //log紀錄
        $sql="\n新增";
        if($pan!=""){
            $sql.="pan為:".$pan."\n";
        }
        if($guest!=""){
            $sql.="客戶為:".$guest."\n";
        }
        if($Book_Name!=""){
            $sql.="書名為:".$Book_Name."\n";
        }
        if($content!=""){
            $sql.="內容為:".$content."\n";
        }
        if($number!=""){
            $sql.="色票號碼為:".$number."\n";
        }
        if($Remarks!=""){
            $sql.="備註為:".$Remarks."\n";
        }
        if($proportion!=""){
            $sql.="油墨比例為:".$proportion;
        }
        $Log_Service = new log_Service();
        $Log_Service->addLog($sql);
        return $res;
    }

    // // 一個函數可以獲取共有多少頁
    // function getpageCount($pageSize)
    // {
    //     // 需要查詢$rowCount
    //     $sql = "select count(id) from emp";
    //     $sqlHelper = new SqlHelper();
    //     $res = $sqlHelper->execute_dql($sql);
    //     // 這樣就可以計算$pageCount
    //      if ($row = mysqli_fetch_row($res)) {
    //         $pageCount = ceil($row[0] / $pageSize);
    //     }
    //     // 釋放關閉連接
    //     mysqli_free_result($res);
    //     $sqlHelper->close_connect();
    //     return $pageCount;
    // }

    // // 一個函數可以獲取應當顯示的色票信息
    // function getEmpListByPage($pageNow, $pageSize)
    // {
    //     $a = ($pageNow - 1) * $pageSize;
    //     $sql = "select * from emp limit $a,$pageSize";
    //     $sqlHelper = new SqlHelper();
    //     $res = $sqlHelper->execute_dql2($sql);
    //     // 釋放資源和關閉連接
    //     // mysqli_free_result($res);
    //     // 關閉連接
    //     $sqlHelper->close_connect();
    //     return $res;
    // }

    // 第二種使用封裝的方式完成的分頁(業務邏輯到這裡)
    // 色票列表分頁
    function getFenyPage($fenyPage)
    {

        // 創建一個sqlHelper對象實例
        $sqlHelper = new SqlHelper();
        $sql = "select * from colour_manage ORDER BY  `colour_manage`.`id` DESC   limit " . ($fenyPage->pageNow - 1) * $fenyPage->pageSize . ",$fenyPage->pageSize";
        // 如何排除錯誤
        // echo "sqli=$sql";
        // exit();
        $sql2 = "select count(pan) from colour_manage";
        $sqlHelper->exectue_dql_fenye($sql, $sql2, $fenyPage);
        
        $sqlHelper->close_connect();
    }
    // 使用者管理日誌列表(LOG)頁
    function getLogFenyPage($fenyPage)
    {
        // 創建一個sqlHelper對象實例
        $sqlHelper = new SqlHelper();
        
        $sql = "select * from log ORDER BY  `log`.`id` DESC limit " . ($fenyPage->pageNow - 1) * $fenyPage->pageSize . ",$fenyPage->pageSize";
        // 如何排除錯誤
        // echo "sqli=$sql";
        // exit();
        $sql2 = "select count(account) from log";
        $sqlHelper->exectue_dql_fenye($sql, $sql2, $fenyPage);
        
        $sqlHelper->close_connect();
    }
    // 根據輸入的ID刪除某個色票
   public function delcolor_ById($id)
    {   

        // $sql1 = "select * from colour_manage where id='$id'" ;
        // $this.selectcolor($id);
        $sql = "delete from colour_manage where id in ($id)";
        // 創建sqlHelper對象實例
        // $res1=$sqlHelper->execute_dql2($sql1);
        $res1=$this->selectcolor($id);
        $sqlHelper = new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);        
        $sql="\n刪除";
        if($id!=""){
            $sql.="編碼為:".$id."的資料\n";
        }
        $sql.="原資料為 \npan:".$res1['0']['pan']."\n客戶:".$res1['0']['guest']."\n書名:".$res1['0']['Book_Name']."\n內容:".$res1['0']['content']."\n色票號碼:".$res1['0']['number']."\n備註:".$res1['0']['Remarks']."\n油墨比例:".$res1['0']['proportion'];
        $Log_Service = new log_Service();
        $Log_Service->addLog($sql);
        return $res;
    }

    // 根據輸入的條件查詢某個色票
    // 根據輸入的條件查詢某個色票
    function selectcolor($id=null,$guest=null , $Book_Name=null ,$content=null , $number=null ,$oper=null )
    {   
        
        // if($_SESSION['addcolor']=='1'){
        //      $sql = "SELECT * FROM `colour_manage`  ORDER BY id DESC LIMIT 0 , 1" ;
        // }else{
        $sql = "select * from colour_manage where " ;
        if($id!=""){
            $sql.= "id=".$id;
            if( $guest != ""|| $Book_Name != "" || $content != ""  || $number != ""){
            $sql.= " and";
            }
        }
        // if($pan!=""){
        //     $sql.= "pan=".$pan;
        //     if($guest != ""|| $Book_Name != "" || $content != ""  || $number != ""){
        //     $sql.= " and";
        //     }
        // }
        if($guest!=""){
            $sql.= " guest LIKE '%".$guest."%'";
            if($Book_Name != "" || $content != "" || $number != ""){
            $sql.= " and";
            }            
        }
        if($Book_Name!=""){
            $sql.= " Book_Name LIKE '%".$Book_Name."%'";
            if($content != "" ||$number != ""){
            $sql.= " and";
            }                
        }
         if($content!=""){
            $sql.= " content LIKE '%".$content."%'";
            if($number != ""){
            $sql.= " and";
            }                
        }       
        if($number!=""){
            $sql.= " number LIKE '%".$number."%'";
        }
        // }
         $_SESSION["sql"]=$sql;
        $sqlHelper = new SqlHelper();
        $arr = $sqlHelper->execute_dql2($sql);
        
        // echo json_encode($arr);
        if($oper=='selectcolor' && count($arr)>=1){
        $_SESSION["select_temp"]=$arr;
            $sqlHelper->close_connect();
            echo "ok";
        }else{
            $sqlHelper->close_connect();
            echo  "no";
        }



    }
    function remove_session(){
        unset($_SESSION["select_temp"]);

    }
}
?>