<?php
session_start();
if ($_SESSION["session_empid"] == "")
{
	echo "<meta http-equiv='refresh' content='0;url=../../infomed/'>";
}
else
{
	if ($_SESSION["encryp"] == "")
	{
		echo "<meta http-equiv='refresh' content='0;url=../main/login.php'>";
	}
}

if ($_SESSION["encryp"] == "")
{
	echo "<meta http-equiv='refresh' content='0;url=../main/login.php'>";
}

?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="TIS-620">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>ระบบการประเมินและเงินเดือน</title>

		 <!-- Bootstrap Core CSS -->
		<link href="../bootstrap-4.0/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="../bootstrap-4.0/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="../bootstrap-4.0/dist/css/sb-admin-2.css" rel="stylesheet">

		<!-- Morris Charts CSS -->
		<link href="../bootstrap-4.0/vendor/morrisjs/morris.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="../bootstrap-4.0/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="../bootstrap-4.0/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="../bootstrap-4.0/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php
		require("../database.mssql.class/msdatabase.class.php");
		require("../database.mssql.class/config.inc.php");
	    require("../function/function.php");  
		require("../function/AES.class.php");
		require("../function/ascii.php");
	    $objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);
		$aes = new AES($_SESSION["encryp"]);
		
		require("authorize.php");
		
		?>
		
		<style>
			.panel-purple {
			  border-color: #990099;
			}
			.panel-purple > .panel-heading {
			  border-color: #990099;
			  color: white;
			  background-color: #990099;
			}
			.panel-purple > a {
			  color: #990099;
			}
			.panel-purple > a:hover {
			  color: #9966ff;
			}
		</style>

	</head>
	<body>
		
		<div id="wrapper">
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">ระบบผลประเมินและเงินเดือน</a>
				</div>
				<!-- /.navbar-header -->

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<?php
							if ($auth == "1")
							{
							?>
								<li>
									<a href="../main/"><i></i> หน้าหลัก</a>
								</li>
								<li>
									<a href="../evaluate/"><i></i>ประเมินผลปฏิบัติงาน</a>
								</li>
								<li>
									<a href="../order/"><i></i>หนังสือคำสั่ง</a>
								</li>
								
								<li>
									<a href="#">เงินเดือน<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<!-- <li>
											<a href="../salary/index.php">จัดการเงินเดือน</a>
										</li> -->
										<li>
											<a href="#">จัดการเงินเดือน<span class="fa arrow"></span></a>
											<ul class="nav nav-third-level">
												<li>
													<a href="../salary/academic.php">สายวิชาการ</a>
												</li>
												<li>
													<a href="../salary/support.php">สายสนับสนุน</a>
												</li>
											</ul>
											<!-- /.nav-third-level -->
										</li>
										<!-- <li>
											<a href="../salary/division.php">เงินเดือนสาขา</a>
										</li> -->
										<li>
											<a href="../salary/divpercent.php">เปอร์เซ็นต์หารผลรวมของ พม. และ พศ.</a>
										</li>
										<li>
											<a href="../salary/datesalary.php">วันประเมินเงินเดือน</a>
										</li>
										<li>
											<a href="../salary/calculategover.php">ฐานคำนวณเงินเดือนข้าราชการ</a>
										</li>
										<li>
											<a href="../salary/workerlevel.php">ขั้นเงินเดือนลูกจ้าง</a>
										</li>
									</ul>
								</li>
								<!-- /.nav-second-level -->
						 <!-- </li> -->
								<li>
									<a href="../report/"><i></i>รายงาน</a>
								</li>
								<li>
									<a href="../authorize/"><i></i>การจัดการสิทธิ์</a>
								</li>
							<?php
							}
							elseif ($rec["authority"] == "2")
							{
							?>
								<li>
									<a href="../main/"><i></i> หน้าหลัก</a>
								</li>
								<li>
									<a href="../evaluate/"><i></i>ประเมินผลปฏิบัติงาน</a>
								</li>
								<li>
									<a href="../order/"><i></i>หนังสือคำสั่ง</a>
								</li>
								
								<li>
									<a href="#">เงินเดือน<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
											<a href="../salary/index.php">จัดการเงินเดือน</a>
										</li>
										<!-- <li>
											<a href="../salary/division.php">เงินเดือนสาขา</a>
										</li> -->
									</ul>
								</li>
							<?php
							}
							elseif ($rec["authority"] == "3")
							{
							?>
								<li>
									<a href="../order/"><i></i>หนังสือคำสั่ง</a>
								</li>
							<?php
							}
							?>
							<li>
								<a href="../logout.php"><i></i>ออกจากระบบ</a>
							</li>
							<!-- <li>
								<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="flot.html">Flot Charts</a>
									</li>
									<li>
										<a href="morris.html">Morris.js Charts</a>
									</li>
								</ul> -->
								<!-- /.nav-second-level -->
							<!-- </li> -->
							<!-- <li>
								<a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="panels-wells.html">Panels and Wells</a>
									</li>
									<li>
										<a href="buttons.html">Buttons</a>
									</li>
									<li>
										<a href="notifications.html">Notifications</a>
									</li>
									<li>
										<a href="typography.html">Typography</a>
									</li>
									<li>
										<a href="icons.html"> Icons</a>
									</li>
									<li>
										<a href="grid.html">Grid</a>
									</li>
								</ul> -->
								<!-- /.nav-second-level -->
							<!-- </li> -->
							<!-- <li>
								<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="#">Second Level Item</a>
									</li>
									<li>
										<a href="#">Second Level Item</a>
									</li>
									<li>
										<a href="#">Third Level <span class="fa arrow"></span></a>
										<ul class="nav nav-third-level">
											<li>
												<a href="#">Third Level Item</a>
											</li>
											<li>
												<a href="#">Third Level Item</a>
											</li>
											<li>
												<a href="#">Third Level Item</a>
											</li>
											<li>
												<a href="#">Third Level Item</a>
											</li>
										</ul> -->
										<!-- /.nav-third-level -->
									<!-- </li>
								</ul> -->
								<!-- /.nav-second-level -->
							<!-- </li>
							<li>
								<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="blank.html">Blank Page</a>
									</li>
									<li>
										<a href="login.html">Login Page</a>
									</li>
								</ul> -->
								<!-- /.nav-second-level -->
							<!-- </li> -->
						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>

			<div id="page-wrapper">

				<div class="container-fluid">

					<div class="row">