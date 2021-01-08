<?php
header("Content-Type:text/html; charset=utf-8");
// UPDATE colour_manage SET `insert_date`='2020-01-01 00:00:00' WHERE `insert_date`='0000-00-00 00:00:00';

require_once dirname(dirname(__FILE__)).'/Common/SqlHelper.php';
class chartService{
	function chart($select_num){
		 $sql = "SELECT `number`as num ,COUNT(*)  as count FROM colour_manage where `number` !=''GROUP BY number HAVING (COUNT(*) > $select_num) ORDER BY count DESC";
		 $sqlHelper = new SqlHelper();
		 $res = $sqlHelper->execute_dql2($sql);
		 $sqlHelper->close_connect();
		$json=json_encode($res);
		echo $json;
		 // return $res;
	}
	function use_chart($use_num,$ran_k,$rank_val){
		 // $sql = "SELECT `number`as num ,COUNT(*)  as count FROM colour_manage where `number` !=''GROUP BY number HAVING (COUNT(*) > $use_num) ORDER BY count DESC";
			$year_a = $use_num.'-01-01';
			$year_b = $use_num.'-12-31';

		if($ran_k=='no'){
			$sql ="SELECT DISTINCT  `guest`  ,COUNT(`number`) AS count , COUNT(DISTINCT  `Book_Name`) AS Number_of_prints FROM colour_manage where `number` !='' AND `guest` !='' AND `Book_Name` !=''AND `insert_date`  BETWEEN ' $year_a' AND '$year_b' GROUP BY `guest` HAVING (COUNT(*) > 2) ORDER BY count DESC" ;
		}elseif($ran_k=='yes'){
			$sql ="SELECT DISTINCT  `guest`  ,COUNT(`number`) AS count , COUNT(DISTINCT  `Book_Name`) AS Number_of_prints FROM colour_manage where `number` !='' AND `guest` !='' AND `Book_Name` !=''AND`insert_date`  BETWEEN ' $year_a' AND '$year_b' GROUP BY `guest` HAVING (COUNT(*) > 2) ORDER BY count DESC LIMIT $rank_val, 5" ;
		}elseif($ran_k=='ALL'){
			$sql ="SELECT DISTINCT  `guest`  ,COUNT(`number`) AS count , COUNT(DISTINCT  `Book_Name`) AS Number_of_prints FROM colour_manage where `number` !='' AND `guest` !='' AND `Book_Name` !=''AND`insert_date`  BETWEEN ' $year_a' AND '$year_b' GROUP BY `guest` HAVING (COUNT(*) > 20) ORDER BY count DESC" ;
		}elseif($ran_k=='ALL_yes'){
			$sql ="SELECT DISTINCT  `guest`  ,COUNT(`number`) AS count  , COUNT(DISTINCT  `Book_Name`) AS Number_of_prints FROM colour_manage where `number` !='' AND `guest` !='' AND `Book_Name` !=''AND`insert_date`  BETWEEN ' $year_a' AND '$year_b' GROUP BY `guest` HAVING (COUNT(*) > 20) ORDER BY count DESC LIMIT $rank_val, 5" ;
		}
 			 $sqlHelper = new SqlHelper();
		 $res = $sqlHelper->execute_dql2($sql);
		 $sqlHelper->close_connect();
		 $json=json_encode($res);
		echo $json;
		 // return $res;
	}
	
	function chart_year(){
		 $sql = "SELECT DISTINCT  SUBSTRING(`insert_date`,1,4)as year FROM `colour_manage`";
		 $sqlHelper = new SqlHelper();
		 $res = $sqlHelper->execute_dql2($sql);
		 $sqlHelper->close_connect();
		 $json=json_encode($res);
		 echo $json;
		 // return $res;
	}
	function chart_count($use_num,$date,$select_num){


			$year_a = $date.'-01-01';
			$year_b = $date.'-12-31';

	 $sql = "SELECT `guest`, `Book_Name` ,`number`,`content` FROM colour_manage where `guest`= '$select_num' AND `number` !='' AND `insert_date`  BETWEEN '$year_a' AND '$year_b'";
	 $sqlHelper = new SqlHelper();
	 $res = $sqlHelper->execute_dql2($sql);
	 $sqlHelper->close_connect();
	 $json=json_encode($res);
	 // echo $sql;
	 echo $json;

	 // return $res;
	}
	function ranking($date,$ran_k){

			$year_a = $date.'-01-01';
			$year_b = $date.'-12-31';
		
		 // $sql = "SELECT count(DISTINCT `guest`) as ranking   FROM colour_manage where `number` !='' AND `insert_date` BETWEEN '$year_a' AND '$year_b' ";
		 if($ran_k == 'ALL'){
		 	$sql = "SELECT  COUNT(*) FROM colour_manage where `number` !='' AND `insert_date` BETWEEN '$year_a' AND '$year_b' GROUP BY `guest` HAVING (COUNT(*) > 20)";

		 }else{
		 	$sql = "SELECT  COUNT(*) FROM colour_manage where `number` !='' AND `insert_date` BETWEEN '$year_a' AND '$year_b' GROUP BY `guest` HAVING (COUNT(*) > 2)";

		 }
		 $sqlHelper = new SqlHelper();
		 $res = $sqlHelper->execute_dql2($sql);
		 $sqlHelper->close_connect();
		 $json=json_encode($res);
		 echo $json;
	}
}



//依照年份找出該年每個客戶新增的特別色排行與次數
 // SELECT DISTINCT  `guest`  ,COUNT(`number`) AS COUNT FROM colour_manage where `number` !='' AND `insert_date`  BETWEEN  '2020-01-01' AND '2020-12-31'GROUP BY `guest` HAVING (COUNT(*) > 0) ORDER BY count DESC 
 // 
 // 取出該年度有使用色票的廠商數量
 // SELECT count(DISTINCT `guest`)  FROM colour_manage where `number` !='' AND `insert_date` BETWEEN ' 2020-01-01' AND '2020-12-31' 
?>

