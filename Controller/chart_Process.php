<?php
require_once dirname(dirname(__FILE__)).'/Service/chartService.php';

	if(!empty($_REQUEST['chart'])&& $_REQUEST['chart'] == 'pie'){
		$select_num=$_REQUEST['select_num'];
		$use_num=$_REQUEST['use_num'];
		$ran_k=$_REQUEST['ran_k'];
		$rank_val=$_REQUEST['rank_val'];
		$chartService = new chartService();
		$chart_data = $chartService->use_chart($use_num,$ran_k,$rank_val);

	}elseif(!empty($_REQUEST['chart'])&& $_REQUEST['chart'] == 'bar'){
		$use_num=$_REQUEST['use_num'];
		$ran_k=$_REQUEST['ran_k'];
		$rank_val=$_REQUEST['rank_val'];
		if($rank_val=='ALL'){
			$ran_k='no';
		}if($rank_val=='year_ALL'){
			$ran_k='ALL';
		}
		$chartService = new chartService();
		$chart_data = $chartService->use_chart($use_num,$ran_k,$rank_val);

	}elseif(!empty($_REQUEST['chart'])&& $_REQUEST['chart'] == 'count'){
		$use_num=$_REQUEST['use_num'];
		$date=$_REQUEST['date'];
		$select_num=$_REQUEST['select_num'];
		$chartService = new chartService();
		$chart_data = $chartService->chart_count($use_num,$date,$select_num);

	}elseif(!empty($_REQUEST['chart'])&& $_REQUEST['chart'] == 'year'){
		$chartService = new chartService();
		$chart_data = $chartService->chart_year();

	}elseif(!empty($_REQUEST['chart'])&& $_REQUEST['chart'] == 'top'){
		$date=$_REQUEST['date'];
		$ran_k=$_REQUEST['ran_k'];
		$chartService = new chartService();
		$chart_data = $chartService->ranking($date,$ran_k);
	}






	?>