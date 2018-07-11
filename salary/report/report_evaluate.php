<?php
session_start();
if($_GET["chk"]=="excel"){
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=report_evaluate.xls");
}
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

	<title>�������͹����Թ��͹</title>

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
		<form method="post" action="?chk=excel">
			<input type="hidden" name="years" value="<?=$_SESSION["year"]?>">
			<input type="hidden" name="note" value="<?=$_SESSION["note"]?>">
			<input type="hidden" name="unitid" value="<?=$_SESSION["unit"]?>">
			<input type="hidden" name="employee" value="<?=$_SESSION["employee"]?>">
			<input type="hidden" name="typeid" value="<?=$_SESSION["typeid"]?>">
			<input type="hidden" name="class" value="<?=$_SESSION["class"]?>">
			<!-- <input type="submit" value="excel"> -->
		</form>
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
		if ($class <> "")
		{
			if ($class == "1")
			{
				$qclass = " AND mpt.positiontypeid = '1' ";
			}
			else
			{
				$qclass = " AND mpt.positiontypeid <> '1' ";
			}
		}
		else
		{
			$qclass = "";
		}

		if ($class == "1")
		{
			$classname = "����Ԫҡ��";
		}
		else
		{
			$classname = "���ʹѺʹع";
		}

		$sqltype = "SELECT * FROM $hrmed.mttype WHERE typeid = '$typeid' ";
		$type = $objdb->query_first($sqltype);

		if ($typeid == "1" OR $typeid == "4" OR $typeid == "5")
		{
			if ($datetoday > $dateround2 AND $datetoday < $dateround1)
			{
				$dateround = "1 ���Ҥ� ".($yy+543);
				$datesalary = "1 ��.�. ".(($yy+543));
			}
			else
			{
				$dateround = "1 ����¹ ".($yy+543);
				$datesalary = "1 �.�. ".(($yy+543));
			}
		}
		else
		{
			$dateround = "1 �á�Ҥ� ".($yy+543);
			$datesalary = "1 �.�. ".(($yy+543)-1);
		}

		$sql = "SELECT DISTINCT e.empid,emptitle,emprankname,CAST(empname AS varchar(100)) AS empname
			,CAST(empsname AS varchar(100)) AS empsname,CAST(typename AS varchar(100)) AS typename
			,CAST(positionname AS varchar(100)) AS positionname,CAST(unitname AS varchar(500)) AS unitname
			,CAST(spositionname AS VARCHAR(100)) AS spositionname 
			FROM tborder AS o
			LEFT JOIN $hrmed.tbemployee AS e ON o.empid=e.empid Collate Thai_CI_AI
			LEFT JOIN $hrmed.tbempwork AS w ON e.id=w.id 
			LEFT JOIN $hrmed.mtposition AS mp ON w.positionid=mp.positionid 
			LEFT JOIN $hrmed.mtpositiontype AS mpt ON mp.positiontypeid=mpt.positiontypeid
			LEFT JOIN $hrmed.mttype AS mt ON w.typeid=mt.typeid 
			LEFT JOIN $hrmed.mtunit AS mu ON w.unitid=mu.unitid 
			$unit $qclass AND empflag = '1'
		";
		$sql .= $con;
		//echo $sql;

		$dmy = explode("-",$recorder["dateeffect"]);
		$d = (int)$dmy[2];
		$m = $dmy[1];
		$y = $dmy[0];

		$arr_month=array("01"=>"���Ҥ�","02"=>"����Ҿѹ��", "03"=>"�չҤ�", "04"=>"����¹", "05"=>"����Ҥ�", "06"=>"�Զع�¹", "07"=>"�á�Ҥ�", "08"=>"�ԧ�Ҥ�", "09"=>"�ѹ��¹", "10"=>"���Ҥ�", "11"=>"��Ȩԡ�¹", "12"=>"�ѹ�Ҥ�");

		$dd = "�ѹ��� ".$d." ".$arr_month[$m]." ".($y+543);
		/*if ($recorder["round"] == "1")
		{
			$dd = "�ѹ��� 1 ���Ҥ� ".$recorder["year"];
		}
		else
		{
			$dd = "�ѹ��� 1 ����¹ ".$recorder["year"];
		}*/
		?>
				<section class="font">

					<!-- Write HTML just like a web page -->
					<!-- <article>This is an A4 document.</article> -->
					<p style="text-align:center;">
						<strong>Ẻ�Ԩ�óҡ������͹����Թ��͹ <?=$dateround?>
							<br>
							<?=$type["typename"]?> (<?=$classname?>)
						<!-- <br>
						� <?=$dd;?> --></strong>
					</p>
					<table width="100%" border="1" cellspacing="0" cellpadding="5">
						<thead>
							<tr>
								<th>�ӴѺ���</th>
								<th>����-ʡ��</th>
								<th>���˹�</th>
								<th>�Ң��Ԫ�</th>
								<th>����͹��� <?=$datesalary?></th>
								<?php
								if ($typeid == "7" OR $typeid == "11")
								{
								?>
									<th>��ṹ�����Թ 1 �.�. <?=date("Y")+543?></th>
									<th>��ṹ�����Թ 1 �.�. <?=date("Y")+543?></th>
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
									$dd145 = "�ѹ��� ".$d145." ".$arr_month[$m145]." ".($y145+543);*/
									if ($type145["round"] == "1")
									{
										$dd145 = "1 �.�. ".(date("Y")+543);
									}
									else
									{
										$dd145 = "1 �.�. ".(date("Y")+543);
									}
								?>
									<th>��ṹ�����Թ <? echo $dd145?></th>
								<?php
								}
								?>
								<th>�Ң��Ԫ��ʹ�</th>
								<th>�Ҥ�Ԫ��ʹ�</th>
								<th>�����˵�</th>
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
												$rank = "���";
												break;
											case 2:
												$rank = "�.�.";
												break;
											case 3:
												$rank = "�ҧ";
												break;
										}
									}
									else
									{
										switch ($rec["emptitle"])
										{
											case 1:
												$rank = "��.";
												break;
											case 2:
												$rank = "��.";
												break;
											case 3:
												$rank = "��.";
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
													$suggest = $eva2["suggest"];
												}
												else
												{
													$evaluate2 = $eva2["evaluate"];
													//$evaluate2 = $aes->decrypt(asciitotext($eva2["evaluate"]));
													$suggest = "";
												}
											}
											else
											{
												$evaluate2 = 0;
												$suggest = $eva2["suggest"];
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
													$suggest = $eva2["suggest"];
												}
												else
												{
													$evaluate = $eva["evaluate"];
													$suggest = "";
													//$evaluate = $aes->decrypt(asciitotext($eva["evaluate"]));
												}
											}
											else
											{
												$evaluate = 0;
												$suggest = $eva["suggest"];
											}
										?>
											<td style="text-align:center;"><?=$evaluate?></td>
										<?php
										}
										?>
										<td></td>
										<td></td>
										<td><?=$suggest;?></td>
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