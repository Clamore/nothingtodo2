<?
if($_GET["doc"]=="doc"){
	/*header("Content-Type: application/msword");
	header('Content-Disposition: attachment; filename="report_personal.doc"');*/
	header("Content-type: application/vnd.ms-excel");
	header('Content-Disposition: attachment; filename="report_personal.xls"');
}
require("../database.mssql.class/msdatabase.class.php");
require("../database.mssql.class/config.inc.php");
require("../function/function.php");
//require("../database.mssql.class/accms_config.php");

$editor_arr = array("","หนังสือ","ตำรา","บทความทางวิชาการ","วิดิทัศน์","อื่นๆ","จัดทำสื่อสิ่งพิมพ์เผยแพร่ความรู้");

$objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);
$unit = $_GET["unit"];
$unitname = $_GET["unit_name"];
$emp = $_GET["empid"];
if ($emp <> "" AND $emp <> "0")
{
	$con = " WHERE e.empid = '$emp' ";
}
else
{
	$con = " WHERE w.workunit = '$unit' AND positiontype = '1' AND empflag = '1' ";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
		<meta name=Generator content="Microsoft Word 12 (filtered)">
		<style>
		<!--
			 /* Style Definitions */
			 p.MsoNormal, li.MsoNormal, div.MsoNormal
				{margin-top:0cm;
				margin-right:0cm;
				margin-bottom:10.0pt;
				margin-left:0cm;
				line-height:115%;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";}
			p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
				{mso-style-link:"Balloon Text Char";
				margin:0cm;
				margin-bottom:.0001pt;
				font-size:8.0pt;
				font-family:"Tahoma","sans-serif";}
			p.MsoNoSpacing, li.MsoNoSpacing, div.MsoNoSpacing
				{margin:0cm;
				margin-bottom:.0001pt;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";}
			p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
				{margin-top:0cm;
				margin-right:0cm;
				margin-bottom:10.0pt;
				margin-left:36.0pt;
				line-height:115%;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";}
			p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
				{margin-top:0cm;
				margin-right:0cm;
				margin-bottom:0cm;
				margin-left:36.0pt;
				margin-bottom:.0001pt;
				line-height:115%;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";}
			p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
				{margin-top:0cm;
				margin-right:0cm;
				margin-bottom:0cm;
				margin-left:36.0pt;
				margin-bottom:.0001pt;
				line-height:115%;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";}
			p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
				{margin-top:0cm;
				margin-right:0cm;
				margin-bottom:10.0pt;
				margin-left:36.0pt;
				line-height:115%;
				font-size:11.0pt;
				font-family:"Calibri","sans-serif";}
			span.BalloonTextChar
				{mso-style-name:"Balloon Text Char";
				mso-style-link:"Balloon Text";
				font-family:"Tahoma","sans-serif";}
			span.jrnl
				{mso-style-name:jrnl;}
			.MsoPapDefault
				{margin-bottom:10.0pt;
				line-height:115%;}
			@page Section1
				{size:612.0pt 792.0pt;
				margin:49.65pt 45.0pt 35.45pt 42.55pt;}
			div.Section1
				{page:Section1;}
			 /* List Definitions */
			 ol
				{margin-bottom:0cm;}
			ul
				{margin-bottom:0cm;}
		-->
		</style>
	</head>
	<body>
		<div class="Section1">
		<p class=MsoNoSpacing><span style='font-size:7.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
		<?php
		$sql_emp = "SELECT * FROM View_tbemployee AS e INNER JOIN View_tbempwork AS w ON e.empid=w.empid $con ";
		//echo $sql_emp;
		$arr_emp = $objdb->getArray($sql_emp);
		if ($arr_emp > 0)
		{
			foreach ($arr_emp AS $emp)
			{
				$empid = $emp["empid"];
				if ($emp["emprankname"] == "ศ.นพ.")
				{
					$rank = "ศาสตราจารย์ นายแพทย์";
				}
				elseif ($emp["emprankname"] == "รศ.นพ.")
				{
					$rank = "รองศาสตราจารย์ นายแพทย์";
				}
				elseif ($emp["emprankname"] == "ผศ.นพ.")
				{
					$rank = "ผู้ช่วยศาสตราจารย์ นายแพทย์";
				}
				elseif ($emp["emprankname"] == "อ.นพ.")
				{
					$rank = "อาจารย์ นายแพทย์";
				}
				elseif ($emp["emprankname"] == "ศ.พญ.")
				{
					$rank = "ศาสตราจารย์ แพทย์หญิง";
				}
				elseif ($emp["emprankname"] == "รศ.พญ.")
				{
					$rank = "รองศาสตราจารย์ แพทย์หญิง";
				}
				elseif ($emp["emprankname"] == "ผศ.พญ.")
				{
					$rank = "ผู้ช่วยศาสตราจารย์ แพทย์หญิง";
				}
				elseif ($emp["emprankname"] == "อ.พญ.")
				{
					$rank = "อาจารย์ แพทย์หญิง";
				}
				else
				{
					$rank = $emp["emprankname"];
				}
				?>
				
				

				<table border="0" cellpadding="5" width="800" style="font-family: Cordia New, Cordia, serif;">
					<tbody>
						<tr>
							<td style="font-size:28px;text-align:center;"><strong>รายละเอียดอาจารย์ประจำหลักสูตร</strong></td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<strong>ชื่อ</strong>&nbsp;<?=$rank.$emp["empname"]?>&nbsp;<?=$emp["empsname"]?>
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;"><strong>คุณวุฒิ</strong></td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<table border="1" cellspacing="0" cellpadding="5" width="100%">
									<thead>
										<tr>
											<th rowspan="2">คุณวุฒิ</th>
											<th rowspan="2">สาขาวิชา</th>
											<th colspan="2">สำเร็จการศึกษาจาก</th>
										</tr>
										<tr>
											<th>สถาบัน</th>
											<th>พ.ศ.</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql_edu = "SELECT * FROM View_tbempeducation WHERE empid = '$empid' ";
										$arr = $objdb->getArray($sql_edu);
										if ($arr > 0)
										{
											foreach($arr AS $rec)
											{
										?>
												<tr>
													<td><?=$rec["seducation"]?></td>
													<td><?=$rec["education"]?></td>
													<td><?=$rec["eduplace"]?></td>
													<td><?=$rec["eduyear"]?></td>
												</tr>
										<?php
											}
										}
										?>
									</tbody>
								</table>
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<br>
								<strong>สังกัด</strong>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?=$unitname?>&nbsp;ภาควิชาอายุรศาสตร์ คณะแพทยศาสตร์ศิริราชพยาบาล มหาวิทยาลัยมหิดล
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<strong>งานวิจัยที่สนใจหรือมีความชำนาญการ</strong>
								<br><br>
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<strong>ผลงานทางวิชาการที่ไม่ใช่ส่วนหนึ่งของการศึกษาเพื่อรับปริญญา และเป็นผลที่ได้รับการเผยแพร่ตามหลักเกณฑ์ที่กำหนดในการพิจารณาแต่งตั้งให้บุคคลดำรงตำแหน่งทางวิชาการในรอบ 5 ปีย้อนหลัง
								<br>
								ผลงานวิจัยที่ได้รับการตีพิมพ์เผยแพร่</strong>
								<br>
								<?php
								$year = date("Y");
								$year = $year -6;
								$sql_research = "SELECT * 
									FROM task_action AS a
									INNER JOIN task_action_book AS b ON a.task_ref=b.task_ref
									INNER JOIN task_action_emp AS e ON b.task_ref=e.task_ref
									WHERE id='92' AND e.task_emp = '$empid' AND datetime_start > '$year' AND task_flag IS NULL
								";
								//echo $sql_research;
								$arr_research = $objdb->getArray($sql_research);
								if ($arr_research > 0)
								{
									foreach($arr_research AS $research)
									{
										$remonth = $research["book_month"];
										$arryear = array("1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");
										echo "<p>-".$research["emp_join"].". ".$research["topic_detail"]." ".$research["name"].". ".$research["book_year"]." ".$arryear["$remonth"].";".$research["page_start"]."-".$research["page_end"]."</p>";
									}
								}
								?>
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<strong>บทความทางวิชาการ</strong>
								<br>
								<?php
								$year = date("Y");
								$year = $year -6;
								$sql_article = "SELECT * 
									FROM task_action AS a
									INNER JOIN task_action_book AS b ON a.task_ref=b.task_ref
									INNER JOIN task_action_emp AS e ON b.task_ref=e.task_ref
									WHERE id='1361' AND editor_type = '3' AND e.task_emp = '$empid' AND datetime_start > '$year' AND task_flag IS NULL
								";
								//echo $sql_article;
								$arr_article = $objdb->getArray($sql_article);
								if ($arr_article > 0)
								{
									foreach($arr_article AS $article)
									{
										$armonth = $article["book_month"];
										$arryear = array("1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");
										echo "<p>-".$article["topic_detail"].". ".$article["name"].". ".$article["book_year"]." ".$arryear["$armonth"].";".$article["page_start"]."-".$article["page_end"]."</p>";
									}
								}
								?>
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<strong>หนังสือ ตำรา</strong>
								<br>
								<?php
								$year = date("Y");
								$year = $year -6;
								$sql_book = "SELECT * 
									FROM task_action AS a
									INNER JOIN task_action_book AS b ON a.task_ref=b.task_ref
									INNER JOIN task_action_emp AS e ON b.task_ref=e.task_ref
									WHERE id='1361' AND editor_type IN ('1','2') AND e.task_emp = '$empid' AND datetime_start > '$year' AND task_flag IS NULL
								";
								//echo $sql_book;
								$arr_book = $objdb->getArray($sql_book);
								if ($arr_book > 0)
								{
									foreach($arr_book AS $book)
									{
										$armonth = $book["book_month"];
										$arryear = array("1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");
										echo "<p>-".$book["topic_detail"].". ".$book["name"].". ".$book["book_year"]." ".$arryear["$armonth"].";".$book["page_start"]."-".$book["page_end"]."</p>";
									}
								}
								?>
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<strong>ผลงานทางวิชาการในลักษณะอื่น</strong>
								<br>
								<?php
								$year = date("Y");
								$year = $year -6;
								$sql_acade = "SELECT * 
									FROM task_action AS a
									INNER JOIN task_main AS m ON a.id=m.id
									INNER JOIN task_action_emp AS e ON a.task_ref=e.task_ref
									WHERE task_id = '0401' AND e.task_emp = '$empid'
									AND datetime_start > '$year' AND task_flag IS NULL
									AND task_confirm = 'Y'
								";
								//echo $sql_acade;
								$arr_acade = $objdb->getArray($sql_acade);
								if ($arr_acade > 0)
								{
									foreach($arr_acade AS $acade)
									{
										if ($acade["topic_detail"] <> "" AND $acade["topic_detail"] <> " ")
										{
											$detail = $acade["topic_detail"];
										}
										elseif ($acade["task_detail"] <> "" AND $acade["task_detail"] <> " ")
										{
											$detail = $acade["task_detail"];
										}
										else
										{
											$detail = $acade["meet_name"];
										}
										echo "<p>-".$detail." ณ ".$acade["place"]."</p>";
									}
								}
								?>
							</td>
						</tr>
					</tbody>
				</table>
				<br>
			<?php
			}//End foreach
		}//End Employee
		?>
		</p>
		</div><!-- page section1 -->
	</body>
</html>