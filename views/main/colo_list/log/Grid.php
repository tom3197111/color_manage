
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->


<?php
// 創建一個FenyPage對象實例
$fenyPage = new FenVePage();
// 給fenyPage指定必須的數據
$fenyPage->pageNow = 1;
$fenyPage->pageSize =100;
$fenyPage->gotoUrl = "color_log.php";
// 這裡我們需要根據用戶的點擊來修改pageNow
// 這裡我們需要判斷是否有pageNow發送 有就使用
// 如果沒有則認為顯示第一頁
if (! empty($_GET['pageNow'])) {
    $fenyPage->pageNow = $_GET['pageNow'];
}
// 調用getcolor_ListByPage 該方法可以把fenyPage完成
$color_Service = new color_Service();
$color_Service->getLogFenyPage($fenyPage);
?>

 <DIV  align=center style='width: 100%; height: 756PX;overflow: auto;'>							
 							<table  class='list'>
								
								<thead>
									<tr><caption><font style="padding-left:10px;" color="#FFFFFF">使用者日誌</font></caption> </tr>
									<tr>
							
										<th >
											<div>
												<font style="padding-left:10px;" color="#777777">
												使用者
											</font>
											</div>
										</th>
										<th >
											<div><font style="padding-left:10px;" color="#777777">
												行為
											</font>
											</div>
										</th>
										<th>
											<div><font style="padding-left:10px;" color="#777777">
												執行時間
											</font>
											</div>
										</th>
									</th>
								</thead>
								<tbody id='tbody'>
										<?php
										if($_SESSION['grade']==1 ||$_SESSION['grade']==10){
										    for ($i = 0; $i < count($fenyPage->res_array); $i ++) {
										        $row = $fenyPage->res_array[$i];
											    echo 	"<tr class='table-tr-content' >
														<td  class='account{$row['id']}' id='account{$row['id']}' style='padding-left:10px;'>{$row['account']}</td>
														<td id='execute_sql{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['execute_sql']}</td>
														<td id='time_date{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['time_date']}</td>
													</tr>";
											}
									    }    
										?>
								</tbody>
							</table></DIV>
							<div  style="width: 100%;">
								<div >
									<table  class="interface" style="background: #EFF3F8">
										<tbody>
											<tr>							
												<td align="center">
													<table  frame=void >
														<tr>
															<td class="page_num"  align="center" style="width:100%;border: none;">
																<?php echo $fenyPage->navigate; ?>
															</td>
															<td style="white-space: nowrap; width: 342px;border: none;">

															</td>
														</tr>
													</table>
												</td>
											</tr>

										</tbody>

									</table>
								</div>
							</div>
