
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->


<?php
// 創建一個FenyPage對象實例
$fenyPage = new FenVePage();
// 給fenyPage指定必須的數據
$fenyPage->pageNow = 1;
$fenyPage->pageSize =100;
$fenyPage->gotoUrl = "color_list.php";
// 這裡我們需要根據用戶的點擊來修改pageNow
// 這裡我們需要判斷是否有pageNow發送 有就使用
// 如果沒有則認為顯示第一頁
if (! empty($_GET['pageNow'])) {
    $fenyPage->pageNow = $_GET['pageNow'];
}
// 調用getcolor_ListByPage 該方法可以把fenyPage完成
$color_Service = new color_Service();
$color_Service->getFenyPage($fenyPage);
?>

 <DIV  align=center style='width: 1660px; height: 756PX;overflow: auto;'>							
 							<table  class='list'>
								
								<thead>
									<tr><caption><font style="padding-left:10px;" color="#FFFFFF">色票資料列表</font></caption> </tr>
									<tr>
										<th  style="width: 35px;">
											<div style="padding-left:10px">
												<input  type="checkbox" name=""/>
											</div>
										<?php
									if($_SESSION['grade']==1 ||$_SESSION['grade']==10){
										echo "<th style='width: 50px;'>
											<font style='padding-left:10px;' color='#777777'>
												條件選擇
											</font>
										</th>";
										}
										?>
										<th style="width: 59px;">
											<div>
												<font style="padding-left:10px;" color="#777777">
												編號
											</font>
											</div>
										</th>
										<th style="width: 151px;">
											<div><font style="padding-left:10px;" color="#777777">
												客戶
											</font>
											</div>
										</th>
										<th style="width: 154px;">
											<div><font style="padding-left:10px;" color="#777777">
												書名
											</font>
											</div>
										</th>
										<th style="width: 109px;">
											<div><font style="padding-left:10px;" color="#777777">
												內容
											</font>
											</div>
										</th>
										<th style="width: 151px;">
											<div><font style="padding-left:10px;" color="#777777">
												色票號碼
											</font>
											</div>
										</th>
										<th style="width: 100px;">
											<div><font style="padding-left:10px;" color="#777777">
												備註
											</font>
											</div>
										</th>
										<th style="width: 101px;">
											<div><font style="padding-left:10px;" color="#777777">
												油墨比例
											</font>
											</div>
										</th>
									</th>
								</thead>
								<tbody id='tbody'>
										<?php
										if(($_SESSION['grade'] ==1 || $_SESSION['grade'] ==10) && empty($_SESSION['select_temp'])){
										    for ($i = 0; $i < count($fenyPage->res_array); $i ++) {
										        $row = $fenyPage->res_array[$i];
											    echo 	"<tr class='table-tr-content' >
														<td  style='padding-left:10px;'><input type='checkbox'></td>";
										?>
														<td class='edit_del<?php echo "{$row['id']}";?>' style='padding-left:10px;padding-top: 5px;display:block;'>
														<input value="<?php echo "{$row['id']}";?>" class='edit'type='image' src='assets/images/icon/ic_mode_edit_24px.svg'  alt='圖片失效了' ; />
														&nbsp;
														<input class="del" type="image"  id='del'src='assets/images/icon/ic_delete_24px.svg'  alt='圖片失效了' onclick='confirmDele(this)'/>
														<input class='id' type="hidden" id="id" value=<?php echo "{$row['id']}";?>>
														<!-- 複製內容 -->
														&nbsp;
														<input value="<?php echo "{$row['id']}";?>"  class="copy_content" type="image"  id='copy'src='assets/images/icon/content_copy-24px.svg'  alt='圖片失效了'/>
														</td>
														<td class="check_cancel<?php echo "{$row['id']}";?>" style='padding-left:10px;padding-top: 5px;display:none'>
														<input value="<?php echo "{$row['id']}";?>" class='check' type='image' src='assets/images/icon/ic_check_box_24px.svg'  alt='圖片失效了' ; />
														&nbsp;
														<input value="<?php echo "{$row['id']}";?>"  class="cancel" type="image"  id='del'src='assets/images/icon/ic_cancel_24px.svg'  alt='圖片失效了'/>
														</td>

										<?php 
												echo "	
														<td  class='id{$row['id']}' id='id{$row['id']}' style='padding-left:10px;'>{$row['id']}</td>
														<td id='guest{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['guest']}</td>
														<td id='Book_Name{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['Book_Name']}</td>
														<td id='content{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['content']}</td>
														<td id='number{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['number']}</td>			
														<td id='Remarks{$row['id']}' class='td_edit_textarea' style='padding-left:10px;'>{$row['Remarks']}</td>
														<td id='proportion{$row['id']}' class='td_edit_textarea' style='padding-left:10px;'>{$row['proportion']}</td></td>
													</tr>";
											}
									    }elseif ($_SESSION['grade']==0 && empty($_SESSION['select_temp'])) {
									    	for ($i = 0; $i < count($fenyPage->res_array); $i ++) {
										        $row = $fenyPage->res_array[$i];
											    echo 	"<tr class='table-tr-content' >
														<td  style='padding-left:10px;'><input type='checkbox'></td>
														<td  class='id{$row['id']}' id='id{$row['id']}' style='padding-left:10px;'>{$row['id']}</td>
														<td id='guest{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['guest']}</td>
														<td id='Book_Name{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['Book_Name']}</td>
														<td id='content{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['content']}</td>
														<td id='number{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['number']}</td>			
														<td id='Remarks{$row['id']}' class='td_edit_textarea' style='padding-left:10px;'>{$row['Remarks']}</td>
														<td id='proportion{$row['id']}' class='td_edit_textarea' style='padding-left:10px;'>{$row['proportion']}</td></td>
													</tr>";
											}
									    }    
										?>
								</tbody>
								<?php
								if(($_SESSION['grade']==1 || $_SESSION['grade']==10) && !empty($_SESSION['select_temp'])){
									echo "<tbody>";
									    for ($i = 0; $i < count($_SESSION["select_temp"]); $i ++) {
       										 $row = $_SESSION["select_temp"][$i];
       										 echo "<tr class='table-tr-content' >
												 	<td  style='padding-left:10px;'><input type='checkbox'></td>";
								?>
											<td class='edit_del<?php echo "{$row['id']}";?>' style='padding-left:10px;padding-top: 5px;display:block;'>
														<input value="<?php echo "{$row['id']}";?>" class='edit'type='image' src='assets/images/icon/ic_mode_edit_24px.svg'  alt='圖片失效了' ; />
														&nbsp;
														<input class="del" type="image"  id='del'src='assets/images/icon/ic_delete_24px.svg'  alt='圖片失效了' onclick='confirmDele(this)'/>
														<input class='id' type="hidden" id="id" value=<?php echo "{$row['id']}";?>>
														&nbsp;
														<input value="<?php echo "{$row['id']}";?>"  class="copy_content" type="image"  id='copy'src='assets/images/icon/content_copy-24px.svg'  alt='圖片失效了'/>
														</td>

														<td class="check_cancel<?php echo "{$row['id']}";?>" style='padding-left:10px;padding-top: 5px;display:none'>
														<input value="<?php echo "{$row['id']}";?>" class='check' type='image' src='assets/images/icon/ic_check_box_24px.svg'  alt='圖片失效了' ; />
														&nbsp;
														<input value="<?php echo "{$row['id']}";?>"  class="cancel" type="image"  id='del'src='assets/images/icon/ic_cancel_24px.svg'  alt='圖片失效了'/>
														</td>
								<?php
												echo "
														<td  class='id{$row['id']}' id='id{$row['id']}' style='padding-left:10px;'>{$row['id']}</td>
														<td id='guest{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['guest']}</td>
														<td id='Book_Name{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['Book_Name']}</td>
														<td id='content{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['content']}</td>
														<td id='number{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['number']}</td>			
														<td id='Remarks{$row['id']}' class='td_edit_textarea' style='padding-left:10px;'>{$row['Remarks']}</td>
														<td id='proportion{$row['id']}' class='td_edit_textarea' style='padding-left:10px;'>{$row['proportion']}</td></td>
													</tr>";       									
										}
									echo "</tbody>";
								
								}elseif($_SESSION['grade']==0  && !empty($_SESSION['select_temp'])){
										echo "<tbody>";
									    for ($i = 0; $i < count($_SESSION["select_temp"]); $i ++) {
       										 $row = $_SESSION["select_temp"][$i];
       										 echo "<tr class='table-tr-content' >
												 	<td  style='padding-left:10px;'><input type='checkbox'></td>
														<td  class='id{$row['id']}' id='id{$row['id']}' style='padding-left:10px;'>{$row['id']}</td>
														<td id='guest{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['guest']}</td>
														<td id='Book_Name{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['Book_Name']}</td>
														<td id='content{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['content']}</td>
														<td id='number{$row['id']}' class='td_edit' style='padding-left:10px;'>{$row['number']}</td>			
														<td id='Remarks{$row['id']}' class='td_edit_textarea' style='padding-left:10px;'>{$row['Remarks']}</td>
														<td id='proportion{$row['id']}' class='td_edit_textarea' style='padding-left:10px;'>{$row['proportion']}</td></td>
													</tr>";       									
										}
									echo "</tbody>";
								}
       							?>
								

							</table></DIV>


							<div  style="width: 1673px;">
								<div >
									<table  class="interface" style="background: #EFF3F8">
										<tbody>
											<tr>
												<td align="left">
													<table  frame=void>
														<tr>
															<td style="padding-left:10px">
															<?php
															if($_SESSION['grade']==1 ||$_SESSION['grade']==10 ){
															echo"<input id='myBtn' type='image' src='assets/images/icon/ic_add_circle_24px.svg'  alt='圖片失效了'  ; />
																&nbsp;";
															}
															?>
																<input id="select_btn" type='image' src='assets/images/icon/ic_search_24px.svg'  alt='圖片失效了' ; />
																&nbsp;
																<input id="refresh_btn" type='image' src='assets/images/icon/ic_refresh_24px.svg'  alt='圖片失效了' ; />
															</td>
														</tr>
													</table>
												</td>									
												<td align="center">
													<table  frame=void >
														<tr>
															<td align="center" style="white-space: nowrap; width: 342px;border: none;">
																<?php
																if($_SESSION['postData']!='selectcolor'){
																	echo $fenyPage->navigate;
																} 
																	 ?>
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


