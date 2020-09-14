<?php
require_once dirname(__FILE__).'/Common/common.php';
require_once dirname(__FILE__).'/Service/log_Service.php';
	if(!session_id()){
	  session_start();
	}
	if(!empty($_SESSION['loginuser'])){
    	$login_log='logout';
        $Log_Service = new log_Service();
        $Log_Service->account_log_date($login_log);
		session_destroy() ;
    }

?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script type="text/javascript" src="views/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="views/assets/js/login/inquire_color.js"></script>
<link rel="icon" href="views/assets/images/icon/logo4C.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="views/assets/css/login/login.css"></head>
<div >
	<form action="Controller/loginProcess.php" method="post"> 
		<div class="BOX" align="center" style="border:3px #000000 solid;" >
			<table 	cellpadding="0" cellspacing="0"; >
				<tbody>
					<tr>
						<img width="225PX" src="views/assets/images/Log/logo_banner.png"/>
					</tr>
					<tr>
						<td colspan="6">
							<h1 style="float: left;" class="div_title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;色票管理</h1>
						</td>
					</tr>
					<tr > 
						<td class="div_user_password" style="float: left;" colspan="2">帳號:
							<input style="float: right;" type="text" name="id" value="<?php echo getcookieVal("id");?>" /></td>
					</tr>
					<tr>
						<td> &nbsp;</td>
					</tr>
					<tr>
						<td class="div_user_password" style="float: left;" colspan="2">密碼:
							<input style="float: right;"type="password" name="password" /></td>
					</tr>
					<tr>
						<td>&emsp;</td>
					</tr>
	<!-- 				<tr>
						<td colspan="2">是否保存用戶ID <input type="checkbox" value="yes"
							name="keep" /></td>
					</tr> -->
					<tr>
						<td colspan="2">
							<input  style="float: left;font-size:0.4cm; width:110px;" type="submit" value="登入" />
							<input  style="float: right; font-size:0.4cm; width:110px;" type="reset" value="重置" />
						</td>
					</tr>
				</tbody>
			</table>
			        <div style="margin:auto; padding-top:40px" align="center">
       				 <span style="font-size:xx-small">中原造像股份有限公司版權所有<br />
        					Copyright&copy; 2014 IGA Limited. <br />
							All Rights Reserved.&nbsp;&nbsp;</span>
      				</div>
		</div>

	</form>

</div>      

<?php
// 該版本完成了分層模式的分頁功能 並且把分頁的信息封裝到fenyPage中
// 從而提高代碼的復用性

// 接收error
if (!empty($_GET['error'])) {
    // 接收錯誤的編號
    $error = $_GET['error'];
    if ($error == 1) {
    	echo "<script type='text/javascript'>error();</script>";
        // echo "</br><font color='red' size='3'>警告:密碼錯誤</font>";
    }
}

?>
</div>
</html>