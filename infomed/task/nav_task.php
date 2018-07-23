
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />

 <!--<div>
    <h2>InfoMed <small>V 2.01a</small></h2>
 </div>-->
  
  <div class="navbar">
										<div class="navbar-inner">
										  <div class="container">
											<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
											  <span class="icon-bar"></span>
											  <span class="icon-bar"></span>
											  <span class="icon-bar"></span>
											</a>
											<a class="brand" href="index.php">ระบบภาระงาน</a>
											<div class="nav-collapse"/>
													
											 <ul class="nav">
														
												<li class="dropdown">
														  <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">ภาระงาน <b class="caret"></b></a>
														  <ul class="dropdown-menu">
														  <li><a href="task_rec_01.php"><?= $arr_task["01"]?></a></li>
															<li><a href="task_rec_02.php"><?= $arr_task["02"]?></a></li>
															<li><a href="task_rec_03.php"><?= $arr_task["03"]?></a></li>	
															<li><a href="task_rec_04.php"><?= $arr_task["04"]?></a></li>												
															<li><a href="task_rec_05.php"><?= $arr_task["05"]?></a></li>	
															<li><a href="task_rec_06.php"><?= $arr_task["06"]?></a></li>
															<li><a href="task_rec_07.php"><?= $arr_task["07"]?></a></li>
															<li><a href="task_rec_08.php"><?= $arr_task["08"]?></a></li>
															<li><a href="task_rec_09.php"><?= $arr_task["09"]?></a></li>
														  </ul>
												</li>
														
												<!--<li class="dropdown">
												 <a href="#" class="dropdown-toggle" data-toggle="dropdown">ตารางภาระงาน <b class="caret"></b></a>
														  <ul class="dropdown-menu">
															
															<li><a href="table_task_list.php">รายการตารางภาระงาน</a></li>
														  </ul>
												</li>		-->
												
											<!--	<li class="dropdown">
												 <a href="#" class="dropdown-toggle" data-toggle="dropdown">แบ่งน้ำหนักภาระงาน<b class="caret"></b></a>
														  <ul class="dropdown-menu">
															<li><a href="#">จัดการ</a></li>
														  </ul>
												</li>	-->
													
												<?
													if($_SESSION["ugroup"]==3){
													?>				
														<li class="dropdown">
																 <a href="#" class="dropdown-toggle" data-toggle="dropdown">ข้อมูลภาระงาน<b class="caret"></b></a>
																 <ul class="dropdown-menu">
																 	<!--<li class="nav-header">Nav header</li>-->
																	<li><a href="task_class.php" >ภาระงานใหม่</a></li>
																	<li><a href="task_update_doc.php" >ภาระงานเดิม</a></li>
                                                                    <li><a href="confirm_task.php" >ยืนยันภาระงาน</a></li>
																	<li class="divider"></li>
																	<li><a href="task_class_manage.php">เพิ่มภาระงาน</a></li>
																	<li><a href="task_update.php" >ปรับภาระงาน</a></li>
																	<li><a href="task_update_all.php" >ปรับภาระงาน[หลายภาระงาน]</a></li>
																	<li class="divider"></li>
																	<li><a href="task_weigh.php" >แบ่งน้ำหนักภาระงาน</a></li>
																	<li class="divider"></li>
																	<li><a href="task_update_job.php">ภาระงานที่ปรับแล้ว</a></li><li><a href="#"></a></li>
												 
												</ul>
										 </li>
														<? } ?>
														<!--<li><a href="#">Menu</a></li>
														<li><a href="#">Menu</a></li>
														-->
														<?
													if($_SESSION["ugroup"]==3){
													?>	
														<li class="dropdown">
														  <a href="#" class="dropdown-toggle" data-toggle="dropdown">บันทึกการทาบบัตร <b class="caret"></b></a>
														  <ul class="dropdown-menu">
														   <li><a href="rfid_detail.php">เรียกดูข้อมูลทาบบัตร</a></li>
															<li><a href="rfid_rec.php">บันทึกข้อมูลทาบบัตร</a></li>
														  </ul>
														</li>
														<? }?>
														<li class="dropdown">
														  <a href="#" class="dropdown-toggle" data-toggle="dropdown">รายงาน <b class="caret"></b></a>
														  <ul class="dropdown-menu">
														   <li><a href="table_task_list.php">เรียกดูภาระงาน</a></li>
                                                            <li><a href="report_toon.php">รายงาน กองทุน “เฉลิมพระเกียรติ” </a></li>
															<li><a href="report_unit_group.php">รายงานสรุปภาระงานตามหน่วยงาน-ผู้ปฏิบัติงาน</a></li>
															<li><a href="report_activity.php">สถิติเกณฑ์ภาควิชาฯ ในการประเมินทุนเฉลิมพระเกียรติ.</a></li>
															<li><a href="report_mtm.php">รายงาน Mission Based Time Management (MTM)</a></li>
															<li><a href="report_positions.php">รายงาน กพอ. 03</a></li>
															<li><a href="report_stack.php">สถิติเกณฑ์ภาควิชาฯ ในงานการสอนและงานบริการวิชาการ</a></li>
															<?php
															if ($_SESSION["session_workplace"] == "21" OR $_SESSION["session_empid"] == "10015432" OR $_SESSION["session_empid"] == "10022758")
															{
															?>
																<li><a href="report_personal.php">รายละเอียดอาจารย์ประจำหลักสูตร</a></li>
															<?php
															}
															?>

															<?php
															if ($_SESSION["session_empid"] == "10015432" OR $_SESSION["session_empid"] == "10024029" OR $_SESSION["session_empid"] == "10015549" OR $_SESSION["session_empid"] == "10022758")
															{
															?>
																<li><a href="report_selfdev.php">รายงาน CPD</a></li>
															<?php
															}
															?>
															<!--<li><a href="#">รายงานสรุปตามกลุ่มภาระงาน</a></li>-->
															<!--<li class="divider">report_task_detail.phpreport_task_group.php</li>
															<li class="nav-header">submenu</li>
															<li><a href="#">submenu</a></li>
															<li><a href="#">submenu</a></li>-->
														  </ul>
														</li>
													  </ul>
											  
													  <!--<form class="navbar-search pull-left" action="">
														<input type="text" class="search-query span2" placeholder="Search">
													  </form>-->
											  
													<!--<ul class="nav pull-right">
															<li><a href="#" title="หน่วยงาน ..........................">Administrator</a></li>
															<li class="divider-vertical"></li>
															<li class="dropdown">
															  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Profile<b class="caret"></b></a>
															  <ul class="dropdown-menu">
																<li><a href="#">--------------------</a></li>
																<li><a href="#">-------------------</a></li>
																<li class="divider"></li>
																<li><a href="#">------------------</a></li>
															  </ul>
															</li>
												  </ul>-->
												  
											</div><!-- /.nav-collapse -->
										  </div>
										</div><!-- /navbar-inner -->
			           </div><!-- /navbar -->



