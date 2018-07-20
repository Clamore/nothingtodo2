<?
/*if($_GET["doc"]=="doc"){
header("Content-Type: application/msword");
header('Content-Disposition: attachment; filename="report_t1.doc"');
}*/
require("../database.mssql.class/msdatabase.class.php");
require("../database.mssql.class/config.inc.php");
require("../function/function.php");
//require("../database.mssql.class/accms_config.php");

$editor_arr = array("","หนังสือ","ตำรา","บทความทางวิชาการ","วิดิทัศน์","อื่นๆ","จัดทำสื่อสิ่งพิมพ์เผยแพร่ความรู้");

$objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);
$unit = $_GET["unit"];
$empid = $_GET["empid"];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
		<meta name=Generator content="Microsoft Word 12 (filtered)">
	</head>
	<body>
		<?php
		$sql_emp = "SELECT * FROM View_tbemployee WHERE empid = '$empid' ";
		$emp = $objdb->query_first($sql_emp);
		?>
		<table border="0" cellpadding="5" width="800">
			<thead>
				<tr>
					<th>รายละเอียดอาจารย์ประจำหลักสูตร</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><strong>ชื่อ</strong>&nbsp;<?=$emp["emprankname"].$emp["empname"]?>&nbsp;<?=$emp["empsname"]?></td>
				</tr>
				<tr>
					<td><strong>คุณวุฒิ</strong></td>
				</tr>
				<tr>
					<td>
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
								?>
								<tr>
									<td>1</td>
									<td>2</td>
									<td>3</td>
									<td>4</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<strong>สังกัด</strong>&nbsp;
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>