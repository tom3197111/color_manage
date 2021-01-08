<!-- The Modal -->
<div id="Problem_Email_Modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" style="width: 500PX">
    <span  class="Problem_Email_close" style="float: right;"><img src='assets/images/icon/ic_cancel_24px.svg'></span>
   		<table class='list' style="width: 400PX">
								<thead>
									<tr><caption><font style="padding-left:10px;" color="#FFFFFF" >問題回報</font></caption> </tr>
													<input type="hidden" id="subject" value="色票系統問題回報">
									<tr>
										<th style="width: 151px;">
											<div><font style="padding-left:10px;" color="#777777">
												發信者:
											</font><input id='headers' type="text" value=<?php echo $_SESSION['loginuser'];?>>
											</div>
										</th>
									</tr>
									<tr>
										<th style="width: 151px;">
											<div><font style="padding-left:10px;" color="#777777">
												問題:
											</font>
											</div><textarea id="msg"  rows="4" cols="50"></textarea>
										</th>
									</tr>
									<tr>
										<th style="width: 151px;">
											<input class="btn btn-primary"style="width: 180px;float: right;" id="Problem_Email_submit" value="送出" type='button'  />
										</th>
									</tr>
								</thead>
   		</table>
  </div>

</div>
