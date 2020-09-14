<?php 
require_once dirname(dirname(__FILE__)).'/Common/SqlHelper.php';
include dirname(dirname(__FILE__)).'/Common/PHPExcel/Classes/PHPExcel.php';
require_once dirname(dirname(__FILE__)).'/Common/PHPExcel/Classes/PHPExcel/IOFactory.php';
// header('Content-type: text/html; charset=utf-8');
// header("Content-type:application/vnd.ms-excel;charset=UTF-8"); 
// header("Content-Disposition:filename=excel.xls");
/**
 * 
 */

class excel
{		


	 function excel_ouput(){
        $sql = "select * from colour_manage ORDER BY  `colour_manage`.`id` asc";
        // 創建一個sqlHelper對象實例
        $sqlHelper = new SqlHelper();
        $arr=$sqlHelper->execute_dql2($sql);
        $sqlHelper->close_connect();
		 echo "ID\t 客戶\t 書名\t 內容 \t色票號碼 \t備註 \t油墨比例 \n";
		 foreach ($arr as $key => $value) {
		 echo "$value[id] \t$value[guest] \t$value[Book_Name]\t$value[content]\t$value[number]\t$value[Remarks]\t$value[proportion]\n";
		}
				
        }
    function excel_ouput_b(){
			PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
			$objPHPExcel = new PHPExcel();
			$objPHPExcel->setActiveSheetIndex(0);

			$sql = "select * from colour_manage ORDER BY  `colour_manage`.`id` asc";
	        $sqlHelper = new SqlHelper();
	        $arr=$sqlHelper->execute_dql2($sql);
	        $sqlHelper->close_connect();
			$i=2;
			foreach ($arr as $key => $value){

			$objPHPExcel->getActiveSheet()->setTitle('TAB標題');
			$objPHPExcel->getActiveSheet()->setCellValue('A1','ID');
			$objPHPExcel->getActiveSheet()->setCellValue('B1','客戶');
			$objPHPExcel->getActiveSheet()->setCellValue('C1','書名');
			$objPHPExcel->getActiveSheet()->setCellValue('D1','內容');
			$objPHPExcel->getActiveSheet()->setCellValue('E1','色票號碼');
			$objPHPExcel->getActiveSheet()->setCellValue('F1','備註');
			$objPHPExcel->getActiveSheet()->setCellValue('G1','油墨比例');

			$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$value['id']);
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$value['guest']);
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$value['Book_Name']);
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$value['content']);
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$value['number']);
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$value['Remarks']);
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$value['proportion']);

			$i+=1;
			}

			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('../uploads/export_abc.xlsx');//
			header('Location:../uploads/export_abc.xlsx');
			exit();
			    }
	
}
?>