<?
if($_GET["doc"]=="doc"){
	//echo "aaa";
	//header("Content-type:text/html; charset=tis-620");
	header("Content-Type: application/msword");
	header('Content-Disposition: attachment; filename="report_manage.doc"');
}

require("../database.mssql.class/msdatabase.class.php");
require("../database.mssql.class/config.hr.inc.php");
require("../function/function.php"); 
$objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<meta name=Generator content="Microsoft Word 12 (filtered)">
</head>

<body lang=EN-US>

<?php

function dec2min($vTime){
	if($vTime<=0) return "-";
	$arr = explode(".", $vTime);
	$minute=0;
	if($arr[1]>0){
		$dec="0.".$arr[1];
		$minute=$dec*0.6;
	}
	return number_format($arr[0]+$minute, 2);
}

$unit = $_GET["unit"];
$emp = $_GET["emp"];
$date_start = sqlthaidate($_GET["date_start"]);
$date_end = sqlthaidate($_GET["date_end"]);
$con = "";

if ($unit <> "")
{
	$con .= " workunit = '$unit' ";
}

if ($emp <> "")
{
	$con .= " AND md.id = '$emp' ";
}

$sql = "SELECT DISTINCT md.id as id,emprankname,empname,empsname  
	FROM tbmanagedetail AS md 
	INNER JOIN mtmanageposition AS mp ON md.manageid=mp.id
	INNER JOIN View_tbemployee AS e ON md.id=e.empid
	INNER JOIN View_tbempwork AS w ON e.empid=w.empid
	WHERE $con
";
$ord = " ORDER BY md.id ASC ";
$sql = $sql.$ord;
//echo $sql;
$arr = $objdb->getArray($sql);
if (count($arr) > 0)
{
	foreach ($arr as $rec)
	{
?>
		<table border="1" cellspacing=0 cellpadding="5"
		style='margin-left:-7.65pt;border-collapse:collapse;border:none;mso-border-alt: 
		solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
			<thead>
				<tr>
					<th width="5%">ลำดับ</th>
					<th width="30%">ชื่อคณะกรรมการ</th>
					<th width="25%">ชื่อตำแหน่ง</th>
					<th width="20%">ระยะเวลา</th>
					<th width="10%">ชั่วโมง/เดือน<br>(เดิม)</th>
					<th width="10%">ชั่วโมง/เดือน<br>(ใหม่)</th>
				</tr>
				<tr>
					<th colspan="6" align="left"><?=$rec["emprankname"]?>&nbsp;<?=$rec["empname"]?>&nbsp;<?=$rec["empsname"]?></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql1 = "SELECT groupname,managepositiontype,datestart,dateend,sumhour
					FROM tbmanagedetail AS md 
					INNER JOIN mtmanageposition AS mp ON md.manageid=mp.id
					INNER JOIN View_tbemployee AS e ON md.id=e.empid
					INNER JOIN View_tbempwork AS w ON e.empid=w.empid
					WHERE md.id = '".$rec["id"]."' AND (datestart <= '$date_end' AND dateend >= '$date_start' OR dateend = '1900-01-01') 
					AND managelevel = '1'
				";// ระดับสาขาวิชาฯ
				//echo $sql1;
				$arr1 = $objdb->getArray($sql1);
				if (count($arr1) > 0)
				{
					$i1 = 1;
				?>
					<tr>
						<td colspan="6">ระดับสาขาวิชาฯ</td>
					</tr>
				<?php
					foreach ($arr1 as $rec1)
					{
				?>
						<tr>
							<td style="text-align:center;"><?=$i1;?></td>
							<td><?=$rec1["groupname"];?></td>
							<td><?=$rec1["managepositiontype"];?></td>
							<td style="text-align:center;">
								<?=thaidate543($rec1["datestart"]);?>
								-
								<?php
								if ($rec1["dateend"] == "1900-01-01")
								{
									echo "ปัจจุบัน";
								}
								else
								{
									echo thaidate543($rec1["dateend"]);
								}
								?>
							</td>
							<td style="text-align:center;"><?=dec2min($rec1["sumhour"]);?></td>
							<td>&nbsp;</td>
						</tr>
				<?php
						$i1++;
					}
				?>
					<tr>
						<td colspan="6">&nbsp;</td>
					</tr>
				<?php
				}
				?>
				<!-- 2 -->
				<?php
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				$sql2 = "SELECT groupname,managepositiontype,datestart,dateend,sumhour
					FROM tbmanagedetail AS md 
					INNER JOIN mtmanageposition AS mp ON md.manageid=mp.id
					INNER JOIN View_tbemployee AS e ON md.id=e.empid
					INNER JOIN View_tbempwork AS w ON e.empid=w.empid
					WHERE md.id = '".$rec["id"]."' AND (datestart <= '$date_end' AND dateend >= '$date_start' OR dateend = '1900-01-01') 
					AND managelevel = '2'
				";// ระดับภาควิชาฯ
				/*$sql2 = "SELECT groupname,managepositiontype,datestart,dateend,sumhour
					FROM tbmanagedetail AS md 
					INNER JOIN mtmanageposition AS mp ON md.manageid=mp.id
					INNER JOIN View_tbemployee AS e ON md.id=e.empid
					INNER JOIN View_tbempwork AS w ON e.empid=w.empid
					WHERE md.id = '".$rec["id"]."' AND expire = '2' 
					AND managelevel = '2'
				";// ระดับภาควิชาฯ*/
				$arr2 = $objdb->getArray($sql2);
				if (count($arr2) > 0)
				{
					$i2 = 1;
				?>
					<tr>
						<td colspan="6">ระดับภาควิชาอายุรศาสตร์</td>
					</tr>
				<?php
					foreach ($arr2 as $rec2)
					{
				?>
						<tr>
							<td style="text-align:center;"><?=$i2;?></td>
							<td><?=$rec2["groupname"];?></td>
							<td><?=$rec2["managepositiontype"];?></td>
							<td style="text-align:center;">
								<?=thaidate543($rec2["datestart"]);?>
								-
								<?php
								if ($rec2["dateend"] == "1900-01-01")
								{
									echo "ปัจจุบัน";
								}
								else
								{
									echo thaidate543($rec2["dateend"]);
								}
								?>
							</td>
							<td style="text-align:center;"><?=dec2min($rec2["sumhour"]);?></td>
							<td>&nbsp;</td>
						</tr>
				<?php
						$i2++;
					}
				?>
					<tr>
						<td colspan="6">&nbsp;</td>
					</tr>
				<?php
				}
				?>
				<!-- 3 -->
				<?php
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				$sql3 = "SELECT groupname,managepositiontype,datestart,dateend,sumhour
					FROM tbmanagedetail AS md 
					INNER JOIN mtmanageposition AS mp ON md.manageid=mp.id
					INNER JOIN View_tbemployee AS e ON md.id=e.empid
					INNER JOIN View_tbempwork AS w ON e.empid=w.empid
					WHERE md.id = '".$rec["id"]."' AND (dateend >= '$date_start' OR dateend like '%1900-01-01%')
					AND managelevel = '3'
				";// ระดับคณะฯ
				echo $sql3;
				echo "<br>";
				$arr3 = $objdb->getArray($sql3);
				if (count($arr3) > 0)
				{
					$i3 = 1;
				?>
					<tr>
						<td colspan="6">ระดับคณะแพทยศาสตร์ศิริราชพยาบาล</td>
					</tr>
				<?php
					foreach ($arr3 as $rec3)
					{
				?>
						<tr>
							<td style="text-align:center;"><?=$i3;?></td>
							<td><?=$rec3["groupname"];?></td>
							<td><?=$rec3["managepositiontype"];?></td>
							<td style="text-align:center;">
								<?=thaidate543($rec3["datestart"]);?>
								-
								<?php
								if ($rec3["dateend"] == "1900-01-01")
								{
									echo "ปัจจุบัน";
								}
								else
								{
									echo thaidate543($rec3["dateend"]);
								}
								?>
							</td>
							<td style="text-align:center;"><?=dec2min($rec3["sumhour"]);?></td>
							<td>&nbsp;</td>
						</tr>
				<?php
						$i3++;
					}
				?>
					<tr>
						<td colspan="6">&nbsp;</td>
					</tr>
				<?php
				}
				?>
				<!-- 4 -->
				<?php
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				$sql4 = "SELECT groupname,managepositiontype,datestart,dateend,sumhour
					FROM tbmanagedetail AS md 
					INNER JOIN mtmanageposition AS mp ON md.manageid=mp.id
					INNER JOIN View_tbemployee AS e ON md.id=e.empid
					INNER JOIN View_tbempwork AS w ON e.empid=w.empid
					WHERE md.id = '".$rec["id"]."' AND (datestart <= '$date_end' AND dateend >= '$date_start' OR dateend = '1900-01-01') 
					AND managelevel = '4'
				";// ระดับมหาลัยฯ
				$arr4 = $objdb->getArray($sql4);
				if (count($arr4) > 0)
				{
					$i4 = 1;
				?>
					<tr>
						<td colspan="6">ระดับมหาวิทยาลัยมหิดล</td>
					</tr>
				<?php
					foreach ($arr4 as $rec4)
					{
				?>
						<tr>
							<td style="text-align:center;"><?=$i4;?></td>
							<td><?=$rec4["groupname"];?></td>
							<td><?=$rec4["managepositiontype"];?></td>
							<td style="text-align:center;">
								<?=thaidate543($rec4["datestart"]);?>
								-
								<?php
								if ($rec4["dateend"] == "1900-01-01")
								{
									echo "ปัจจุบัน";
								}
								else
								{
									echo thaidate543($rec4["dateend"]);
								}
								?>
							</td>
							<td style="text-align:center;"><?=dec2min($rec4["sumhour"]);?></td>
							<td>&nbsp;</td>
						</tr>
				<?php
						$i4++;
					}
				?>
					<tr>
						<td colspan="6">&nbsp;</td>
					</tr>
				<?php
				}
				?>
				<!-- 5 -->
				<?php
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				$sql5 = "SELECT groupname,managepositiontype,datestart,dateend,sumhour
					FROM tbmanagedetail AS md 
					INNER JOIN mtmanageposition AS mp ON md.manageid=mp.id
					INNER JOIN View_tbemployee AS e ON md.id=e.empid
					INNER JOIN View_tbempwork AS w ON e.empid=w.empid
					WHERE md.id = '".$rec["id"]."' AND (datestart <= '$date_end' AND dateend >= '$date_start' OR dateend = '1900-01-01') 
					AND managelevel = '5'
				";// ระดับนอกมหาลัย
				//echo $sql5;
				$arr5 = $objdb->getArray($sql5);
				if (count($arr5) > 0)
				{
					$i5 = 1;
				?>
					<tr>
						<td colspan="6">ระดับนอกมหาวิทยาลัยมหิดล</td>
					</tr>
				<?php
					foreach ($arr5 as $rec5)
					{
						//$sumhour5 = dec2min($rec5["sumhour"]);
				?>
						<tr>
							<td style="text-align:center;"><?=$i5;?></td>
							<td><?=$rec5["groupname"];?></td>
							<td><?=$rec5["managepositiontype"];?></td>
							<td style="text-align:center;">
								<?=thaidate543($rec5["datestart"]);?>
								-
								<?php
								if ($rec5["dateend"] == "1900-01-01")
								{
									echo "ปัจจุบัน";
								}
								else
								{
									echo thaidate543($rec5["dateend"]);
								}
								?>
							</td>
							<td style="text-align:center;"><?=dec2min($rec5["sumhour"]);?></td>
							<td>&nbsp;</td>
						</tr>
				<?php
						$i5++;
					}
				?>
					<tr>
						<td colspan="6">&nbsp;</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
<?php
	}
}

?>
</body>
</html>