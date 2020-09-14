<?php
    class FenVePage{
        public $pageSize=100;  //一頁顯示幾筆資料
        public $res_array;  //這是顯示數據
        public $rowCount;   //這是從數據中獲取(資料總筆數)
        public $pageNow;    //用戶指定的
        public $pageCount;  //這個是計算得到的(算出資料可以分成幾頁)
        public $navigate;   //分頁導航
        public $gotoUrl;     //分頁請求
    }
?>