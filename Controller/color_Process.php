<?php
ini_set("display_errors", "On");
    if(!session_id()){
      session_start();
    }   
require_once dirname(dirname(__FILE__)).'/Service/color_Service.class.php';
require_once dirname(dirname(__FILE__)).'/Service/excel.service.php';
// 接收色票要刪除的色票ID
// 先看看色票要分頁還是刪除某個色票
$color_Service = new color_Service();
// $_SESSION['go']=$_REQUEST['selectcolor'];
$_SESSION['postData']=$_REQUEST['oper'];
// $_SESSION['allfieldsearch']=$_REQUEST['allfieldsearch'];
// 接收
// $_SESSION['go']='開始判斷Selectcolor';
if (!empty($_REQUEST['oper']) || !empty($_REQUEST['selectcolor'])) {
    //接收oper值
    // $selectcolor=$_REQUEST['selectcolor'];
    $_SESSION['go']='接收到selectcolor';
    $oper=$_REQUEST['oper'];
    //如果$oper="del" 說明色票要執行刪除請求
    if($oper=="del"){
        //這是我們知道要刪除色票
    $id = $_REQUEST['id'];
    if ($color_Service->delcolor_ById($id) == 1)
    {
        header("location:../views/color_list.php");
        exit();
    } else {
        // 失敗
        header("location:../views/error.php");
        exit();
    }
    }else if($oper=="add"){
        //說明色票希望執行添加色票
        //接收數據
        $pan=$_POST['pan'];
        $guest=$_POST['guest'];        
        $Book_Name=$_POST['Book_Name'];
        $content=$_POST['content'];
        $number=$_POST['number'];
        $Remarks=$_POST['Remarks'];
        $proportion=$_POST['proportion'];
        if($pan =='' && $guest =='' && $Book_Name =='' && $content =='' && $number =='' && $Remarks =='' && $proportion ==''){
            header("location:../views/addColor.php");
            exit();
        }
        //完成添加->數據庫 
        $res=$color_Service->addcolor($pan, $guest, $Book_Name, $content, $number,$Remarks,$proportion);
        if($res==1){
            exit();
        }else {
            // 失敗
            header("location:../views/error.php");
            exit();
        }
    }else if($oper=="edit"){
        $id=$_POST['id'];
        $guest=$_POST['guest'];
        $Book_Name=$_POST['Book_Name'];   
        $content=$_POST['content'];
        $number=$_POST['number'];
        $Remarks=$_POST['Remarks'];
        $proportion=$_POST['proportion'];
        //完成修改->數據庫 
        $res=$color_Service->updatecolor($id,$guest, $Book_Name, $content, $number,$Remarks,$proportion);
        if($res==1){
           
            // header("location:../views/ok.php");
            exit();
        }else {
            // 失敗
            // header("location:../views/error.php");
            exit();
        }
    }else if($oper == "selectcolor"){
        $id=$_POST['id'];
        // $pan=$_POST['pan'];
        $guest=$_POST['guest'];
        $Book_Name=$_POST['Book_Name'];  
        $content=$_POST['content'];  
        $number=$_POST['number'];
        if($id == ''&& $guest==''&& $Book_Name=='' && $content =='' && $number==''){
            // $_SESSION['go']='搜尋條件全部空白';
            header("location:../views/color_list.php");
            exit();
        }
        //完成查詢->數據庫 
        $res=$color_Service->selectcolor($id,$guest, $Book_Name, $content,$number,$oper);

    }else if($oper == "remove_session"){
        $color_Service->remove_session();
    }else if($oper == "excel"){
        $excel = new excel();
        $arr=$excel->excel_ouput_b();

        exit();
    }
}
?>