<?php
session_start();
/*if($_GET["chk"]=="excel"){
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=report_evaluate.xls");
}*/
require("../database.mssql.class/msdatabase.class.php");
require("../database.mssql.class/config.inc.php");
require("../function/function.php");  
require("../function/AES.class.php");
require("../function/ascii.php");
$objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);
//echo $_SESSION["encryp"];
$aes = new AES($_SESSION["encryp"]);
?>

<html>
	<meta charset="TIS-620">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>การเลื่อนขั้นเงินเดือน</title>

	<head>
		<script src="../bootstrap-4.0/vendor/jquery/jquery.min.js"></script>
		<!-- Normalize or reset CSS with your favorite library -->
		<!-- <link rel="stylesheet" href="ajax/libs/normalize/7.0.0/normalize.min.css"> -->

		<!-- Load paper.css for happy printing -->
		<!-- <link rel="stylesheet" href="ajax/libs/paper-css/0.3.0/paper.css"> -->

		 <!-- Set page size here: A5, A4 or A3 -->
		 <!-- Set also "landscape" if you need -->
		 <style>
			@page { size: A4 }
			@font-face {
				font-family: "ThSarabunNew";
				src: url(font/THSarabunNew.ttf);
			}
			.font{
				font-family: "ThSarabunNew";
				font-size: 1.4em;
			}
		 </style>
	</head>

	<body>

	  <!-- Each sheet element should have the class "sheet" -->
	  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
		<?php
		$years = $_SESSION["year"];
		$note = $_SESSION["note"];
		$unitid = $_SESSION["unit"];
		$employee = $_SESSION["employee"];
		$typeid = $_SESSION["typeid"];
		$class = $_SESSION["class"];
		$yy = date("Y");
		$datetoday = date("Y-m-d");
		$dateround1 = $yy."-10-01";
		$dateround2 = $yy."-04-01";
		
		if ($unitid == 0)
		{
			$unit = "WHERE w.unitid <> '0' ";
		}
		else
		{
			$unit = "WHERE w.unitid = '$unitid'";
		}

		if ($employee <> "")
		{
			$con .= " AND e.empid = '$employee' ";
		}
		if ($typeid <> "")
		{
			$con .= " AND w.typeid = '$typeid' ";
		}

		if ($class == "1")
		{
			$classname = "สายวิชาการ";
		}
		else
		{
			$classname = "สายสนับสนุน";
		}

		$sqltype = "SELECT * FROM $hrmed.mttype WHERE typeid = '$typeid' ";
		$type = $objdb->query_first($sqltype);

		if ($typeid == "1" OR $typeid == "4" OR $typeid == "5")
		{
			if ($datetoday > $dateround2 AND $datetoday < $dateround1)
			{
				$dateround = "1 ตุลาคม ".($yy+543);
				$datesalary = "1 เม.ย. ".(($yy+543));
			}
			else
			{
				$dateround = "1 เมษายน ".($yy+543);
				$datesalary = "1 ต.ค. ".(($yy+543));
			}
		}
		else
		{
			$dateround = "1 กรกฏาคม ".($yy+543);
			$datesalary = "1 ก.ค. ".(($yy+543)-1);
		}

		$sql = "SELECT DISTINCT e.empid,emptitle,emprankname,CAST(empname AS varchar(100)) AS empname
			,CAST(empsname AS varchar(100)) AS empsname,CAST(typename AS varchar(100)) AS typename
			,CAST(positionname AS varchar(100)) AS positionname,CAST(unitname AS varchar(500)) AS unitname
			,CAST(spositionname AS VARCHAR(100)) AS spositionname 
			FROM tborder AS o
			LEFT JOIN $hrmed.tbemployee AS e ON o.empid=e.empid Collate Thai_CI_AI
			LEFT JOIN $hrmed.tbempwork AS w ON e.id=w.id 
			LEFT JOIN $hrmed.mtposition AS mp ON w.positionid=mp.positionid 
			LEFT JOIN $hrmed.mttype AS mt ON w.typeid=mt.typeid 
			LEFT JOIN $hrmed.mtunit AS mu ON w.unitid=mu.unitid 
			$unit
		";
		$sql .= $con;
		//echo $sql;

		$dmy = explode("-",$recorder["dateeffect"]);
		$d = (int)$dmy[2];
		$m = $dmy[1];
		$y = $dmy[0];

		$arr_month=array("01"=>"มกราคม","02"=>"กุมภาพันธ์", "03"=>"มีนาคม", "04"=>"เมษายน", "05"=>"พฤษภาคม", "06"=>"มิถุนายน", "07"=>"กรกฎาคม", "08"=>"สิงหาคม", "09"=>"กันยายน", "10"=>"ตุลาคม", "11"=>"พฤศจิกายน", "12"=>"ธันวาคม");

		$dd = "วันที่ ".$d." ".$arr_month[$m]." ".($y+543);
		/*if ($recorder["round"] == "1")
		{
			$dd = "วันที่ 1 ตุลาคม ".$recorder["year"];
		}
		else
		{
			$dd = "วันที่ 1 เมษายน ".$recorder["year"];
		}*/
		?>
				<section class="font">

					<!-- Write HTML just like a web page -->
					<!-- <article>This is an A4 document.</article> -->
					<p style="text-align:center;">
						<strong>แบบพิจารณาการเลื่อนขั้นเงินเดือน <?=$dateround?>
							<br>
							<?=$type["typename"]?> (<?=$classname?>)
						<!-- <br>
						ณ <?=$dd;?> --></strong>
					</p>
					<table width="100%" border="1" cellspacing="0" cellpadding="5">
						<thead>
							<tr>
								<th>ลำดับที่</th>
								<th>ชื่อ-สกุล</th>
								<th>ตำแหน่ง</th>
								<th>สาขาวิชา</th>
								<th>เลื่อนขั้น <?=$datesalary?></th>
								<?php
								if ($typeid == "7" OR $typeid == "11")
								{
								?>
									<th>คะแนนประเมิน 1 ก.ค. <?=date("Y")+543?></th>
									<th>คะแนนประเมิน 1 ม.ค. <?=date("Y")+543?></th>
								<?php
								}
								else
								{
									$sql_type145 = "SELECT TOP 1 * 
										FROM tbevaluate AS eva
										INNER JOIN $hrmed.tbemployee AS e ON eva.empid=e.empid Collate Thai_CI_AI
										INNER JOIN $hrmed.tbempwork AS w ON e.id=w.id 
										WHERE w.typeid = '$typeid' ORDER BY eva.id DESC 
									";
									$type145 = $objdb->query_first($sql_type145);
									/*$dmy145 = explode("-",$type145["datestart"]);
									$d145 = (int)$dmy145[2];
									$m145 = $dmy145[1];
									$y145 = $dmy145[0];
									$dd145 = "วันที่ ".$d145." ".$arr_month[$m145]." ".($y145+543);*/
									if ($type145["round"] == "1")
									{
										$dd145 = "1 ก.ค. ".date("Y")+543;
									}
									else
									{
										$dd145 = "1 ม.ค. ".date("Y")+543;
									}
								?>
									<th>คะแนนประเมิน <?=$dd145?></th>
								<?php
								}
								?>
								<th>สาขาวิชาเสนอ</th>
								<th>ภาควิชาเสนอ</th>
								<th>หมายเหตุ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$arr = $objdb->getArray($sql);
							if ($arr > 0)
							{
								$i = 1;
								foreach ($arr AS $rec)
								{
									//echo "rankname : ".$rec["emprankname"];
									if ($rec["emprankname"] == "" OR $rec["emprankname"] == " ")
									{
										switch ($rec["emptitle"])
										{
											case 1:
												$rank = "นาย";
												break;
											case 2:
												$rank = "น.ส.";
												break;
											case 3:
												$rank = "นาง";
												break;
										}
									}
									else
									{
										switch ($rec["emptitle"])
										{
											case 1:
												$rank = "นพ.";
												break;
											case 2:
												$rank = "พญ.";
												break;
											case 3:
												$rank = "พญ.";
												break;
										}
										$rank = $rec["spositionname"].$rank;
									}

									$sql_eva = "SELECT TOP 1 * FROM tbevaluate WHERE empid = $rec[empid] ORDER BY id DESC ";
									//echo $sql_eva."<br>";
									$rec_eva = $objdb->query_first($sql_eva);
									$row_eva = $objdb->numrows($sql_eva);
									if ($row_eva > 0)
									{
										if ($rec_eva["evaluate"] == "" AND $rec_eva["evaluate"] == " ")
										{
											$evalute = 0;
										}
										else
										{
											$evaluate = $rec_eva["evaluate"];
											//$evaluate = $aes->decrypt(asciitotext($rec_eva["evaluate"]));
										}
									}
									else
									{
										$evaluate = 0;
									}
									$sql_order = "SELECT TOP 1 * FROM tborder WHERE empid = $rec[empid] AND orderno <> '' ORDER BY id DESC ";
									$rec_order = $objdb->query_first($sql_order);
									$row_order = $objdb->numrows($sql_order);
									if ($row_order > 0)
									{
										if ($rec_order["levelup"] == "" AND $rec_order["levelup"] == " ")
										{
											$order = 0;
										}
										else
										{
											$order = $rec_order["levelup"];
											//$order = $aes->decrypt(asciitotext($rec_order["levelup"]));
										}
									}
									else
									{
										$order = 0;
									}
							?>
									<tr>
										<td style="text-align:center;"><?=$i?></td>
										<td><?=$rank.$rec["empname"]. " ".$rec["empsname"]?></td>
										<td><?=$rec["positionname"]?></td>
										<td><?=$rec["unitname"]?></td>
										<td style="text-align:center;"><?=$order?></td>
										<?php
										if ($typeid == "7" OR $typeid == "11")
										{
											$sql_eva1 = "SELECT TOP 1 * FROM tbevaluate WHERE round = '1' AND empid = $rec[empid] ORDER BY id DESC";
											$eva1 = $objdb->query_first($sql_eva1);
											$row_eva1 = $objdb->numrows($sql_eva1);
											if ($row_eva1 > 0)
											{
												if ($eva1["evaluate"] == "" AND $eva1["evaluate"] == " ")
												{
													$evalute1 = 0;
												}
												else
												{
													$evaluate1 = $eva1["evaluate"];
													//$evaluate1 = $aes->decrypt(asciitotext($eva1["evaluate"]));
												}
											}
											else
											{
												$evaluate1 = 0;
											}

											$sql_eva2 = "SELECT TOP 1 * FROM tbevaluate WHERE round = '2' AND empid = $rec[empid] ORDER BY id DESC";
											$eva2 = $objdb->query_first($sql_eva2);
											$row_eva2 = $objdb->numrows($sql_eva2);
											if ($row_eva2 > 0)
											{
												if ($eva2["evaluate"] == "" AND $eva2["evaluate"] == " ")
												{
													$evalute2 = 0;
												}
												else
												{
													$evaluate2 = $eva2["evaluate"];
													//$evaluate2 = $aes->decrypt(asciitotext($eva2["evaluate"]));
												}
											}
											else
											{
												$evaluate2 = 0;
											}
										?>
											<td style="text-align:center;"><?=$evaluate1?></td>
											<td style="text-align:center;"><?=$evaluate2?></td>
										<?php
										}
										else
										{
											$sql_eva = "SELECT TOP 1 * FROM tbevaluate WHERE empid = '$rec[empid]' ORDER BY id DESC ";
											$eva = $objdb->query_first($sql_eva);
											$row_eva = $objdb->numrows($sql_eva);
											if ($row_eva > 0)
											{
												if ($eva["evaluate"] == "" AND $eva["evaluate"] == " ")
												{
													$evaluate = 0;
												}
												else
												{
													$evaluate = $eva["evaluate"];
													//$evaluate = $aes->decrypt(asciitotext($eva["evaluate"]));
												}
											}
											else
											{
												$evaluate = 0;
											}
										?>
											<td style="text-align:center;"><?=$evaluate?></td>
										<?php
										}
										?>
										<td></td>
										<td></td>
										<td></td>
									</tr>
							<?php
									$i++;
								}
							}
							?>
						</tbody>
					</table>
				</section>

	</body>
</html>