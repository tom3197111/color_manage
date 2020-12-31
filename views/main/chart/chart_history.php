
 <div class="container-left container-custom-width">  
 	<div class="row no-gutters chart_div justify-content-start align-items-center " style="height:200px;width:360px;overflow:auto;">

  </div>

 <br>
 <hr><h3><div id='title_data'></div></h3>
 	<div style="height:400px;width:360px;overflow:auto;">
  		<table class="table_cont" style="width: 335px"></table>
	</div>
</div>
<br>
<div class="wrap container-right ">
  <h1 >色票年度使用排行</h1>
  <hr>
  	<!-- <h5>色票號碼最少使用次數:<input type="text" id="select_num" value=""><input type="button" value="開始搜尋" onclick="chart()"></h5> -->
  	
  	<!-- <h5>色票號碼使用次數排名(顯示幾筆):<input type="text" id="use_num" value=""><input type="button" value="開始搜尋" onclick="use_chart()"></h5><br> -->
  	請選擇搜尋時間:
  	<select id='select1'>
	    <option>請選擇搜尋時間</option>
	</select>&emsp; 
	
	色票使用次數排名:
	 <select id='top'>
	    <option>請選擇搜名次區間</option>
	</select>&emsp; 
	<!-- <input type="checkbox" name="" >不過濾空白色票&emsp; -->
<!-- 	<input id="pie_chart" type="image"  src="assets/images/icon/pie_chart-24px.svg" onclick="chart()" >
	&emsp;
	<input id="bar_chart" type="image" src="assets/images/icon/assessment-24px.svg" onclick="chart()" > -->
	<!-- <a href=""><img src="assets/images/icon/assessment-24px.svg"></a> -->

	<br>
  	&emsp;&emsp;(使用次數左到右為使用次數多到少)
  <div id="canvas-holder">
    <canvas id="chart-area"></canvas>
  </div>
</div>