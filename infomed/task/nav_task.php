
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
											<a class="brand" href="index.php">�к����Чҹ</a>
											<div class="nav-collapse"/>
													
											 <ul class="nav">
														
												<li class="dropdown">
														  <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">���Чҹ <b class="caret"></b></a>
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
												 <a href="#" class="dropdown-toggle" data-toggle="dropdown">���ҧ���Чҹ <b class="caret"></b></a>
														  <ul class="dropdown-menu">
															
															<li><a href="table_task_list.php">��¡�õ��ҧ���Чҹ</a></li>
														  </ul>
												</li>		-->
												
											<!--	<li class="dropdown">
												 <a href="#" class="dropdown-toggle" data-toggle="dropdown">�觹��˹ѡ���Чҹ<b class="caret"></b></a>
														  <ul class="dropdown-menu">
															<li><a href="#">�Ѵ���</a></li>
														  </ul>
												</li>	-->
													
												<?
													if($_SESSION["ugroup"]==3){
													?>				
														<li class="dropdown">
																 <a href="#" class="dropdown-toggle" data-toggle="dropdown">���������Чҹ<b class="caret"></b></a>
																 <ul class="dropdown-menu">
																 	<!--<li class="nav-header">Nav header</li>-->
																	<li><a href="task_class.php" >���Чҹ����</a></li>
																	<li><a href="task_update_doc.php" >���Чҹ���</a></li>
                                                                    <li><a href="confirm_task.php" >�׹�ѹ���Чҹ</a></li>
																	<li class="divider"></li>
																	<li><a href="task_class_manage.php">�������Чҹ</a></li>
																	<li><a href="task_update.php" >��Ѻ���Чҹ</a></li>
																	<li><a href="task_update_all.php" >��Ѻ���Чҹ[�������Чҹ]</a></li>
																	<li class="divider"></li>
																	<li><a href="task_weigh.php" >�觹��˹ѡ���Чҹ</a></li>
																	<li class="divider"></li>
																	<li><a href="task_update_job.php">���Чҹ����Ѻ����</a></li><li><a href="#"></a></li>
												 
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
														  <a href="#" class="dropdown-toggle" data-toggle="dropdown">�ѹ�֡��÷Һ�ѵ� <b class="caret"></b></a>
														  <ul class="dropdown-menu">
														   <li><a href="rfid_detail.php">���¡�٢����ŷҺ�ѵ�</a></li>
															<li><a href="rfid_rec.php">�ѹ�֡�����ŷҺ�ѵ�</a></li>
														  </ul>
														</li>
														<? }?>
														<li class="dropdown">
														  <a href="#" class="dropdown-toggle" data-toggle="dropdown">��§ҹ <b class="caret"></b></a>
														  <ul class="dropdown-menu">
														   <li><a href="table_task_list.php">���¡�����Чҹ</a></li>
                                                            <li><a href="report_toon.php">��§ҹ �ͧ�ع �����������õԔ </a></li>
															<li><a href="report_unit_group.php">��§ҹ��ػ���Чҹ���˹��§ҹ-��黯Ժѵԧҹ</a></li>
															<li><a href="report_activity.php">ʶԵ�ࡳ���Ҥ�Ԫ�� 㹡�û����Թ�ع����������õ�.</a></li>
															<li><a href="report_mtm.php">��§ҹ Mission Based Time Management (MTM)</a></li>
															<li><a href="report_positions.php">��§ҹ ���. 03</a></li>
															<li><a href="report_stack.php">ʶԵ�ࡳ���Ҥ�Ԫ�� 㹧ҹ����͹��Чҹ��ԡ���Ԫҡ��</a></li>
															<?php
															if ($_SESSION["session_workplace"] == "21" OR $_SESSION["session_empid"] == "10015432" OR $_SESSION["session_empid"] == "10022758")
															{
															?>
																<li><a href="report_personal.php">��������´�Ҩ�����Ш���ѡ�ٵ�</a></li>
															<?php
															}
															?>

															<?php
															if ($_SESSION["session_empid"] == "10015432" OR $_SESSION["session_empid"] == "10024029" OR $_SESSION["session_empid"] == "10015549" OR $_SESSION["session_empid"] == "10022758")
															{
															?>
																<li><a href="report_selfdev.php">��§ҹ CPD</a></li>
															<?php
															}
															?>
															<!--<li><a href="#">��§ҹ��ػ�����������Чҹ</a></li>-->
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
															<li><a href="#" title="˹��§ҹ ..........................">Administrator</a></li>
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



