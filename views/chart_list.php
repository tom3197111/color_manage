<?php 
require_once dirname(dirname(__FILE__)).'/Common/common.php';
require_once dirname(dirname(__FILE__)).'/Common/SqlHelper.php';
require_once dirname(dirname(__FILE__)).'/Service/color_Service.class.php';
// 先驗證
checkuserValidate();
$SqlHelper = new SqlHelper;
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<?php include("layouts/chart_home.php"); ?>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
<?php include("navbar/top.php"); ?>
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>
<?php include("navbar/left.php"); ?>	

			<div class="main-content">
				<div class="main-content-inner">

<?php include("main/chart/chart.php"); ?>

<?php include("main/footer.php"); ?>
		</div><!-- /.main-container -->

	</body>
<?php include("layouts/common_Problem_Email.php"); ?>
<?php include("main/colo_list/list/insert_color.php"); ?>
<?php include("main/colo_list/list/select_color.php"); ?>
</html>
