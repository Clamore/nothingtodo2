<?
/*if($_GET["doc"]=="doc"){
header("Content-Type: application/msword");
header('Content-Disposition: attachment; filename="report_t1.doc"');
}*/
require("../database.mssql.class/msdatabase.class.php");
require("../database.mssql.class/config.inc.php");
require("../function/function.php");
//require("../database.mssql.class/accms_config.php");

$editor_arr = array("","˹ѧ���","����","�������ҧ�Ԫҡ��","�ԴԷ�ȹ�","����","�Ѵ��������觾���������������");

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
	</head>
	<body>
		<?php
		$sql_emp = "SELECT * FROM View_tbemployee AS e INNER JOIN View_tbempwork AS w ON e.empid=w.empid $con ";
		//echo $sql_emp;
		$arr_emp = $objdb->getArray($sql_emp);
		if ($arr_emp > 0)
		{
			foreach ($arr_emp AS $emp)
			{
				$empid = $emp["empid"];
				if ($emp["emprankname"] == "�.��.")
				{
					$rank = "��ʵ�Ҩ���� ���ᾷ��";
				}
				elseif ($emp["emprankname"] == "��.��.")
				{
					$rank = "�ͧ��ʵ�Ҩ���� ���ᾷ��";
				}
				elseif ($emp["emprankname"] == "��.��.")
				{
					$rank = "��������ʵ�Ҩ���� ���ᾷ��";
				}
				elseif ($emp["emprankname"] == "�.��.")
				{
					$rank = "�Ҩ���� ���ᾷ��";
				}
				elseif ($emp["emprankname"] == "�.��.")
				{
					$rank = "��ʵ�Ҩ���� ᾷ��˭ԧ";
				}
				elseif ($emp["emprankname"] == "��.��.")
				{
					$rank = "�ͧ��ʵ�Ҩ���� ᾷ��˭ԧ";
				}
				elseif ($emp["emprankname"] == "��.��.")
				{
					$rank = "��������ʵ�Ҩ���� ᾷ��˭ԧ";
				}
				elseif ($emp["emprankname"] == "�.��.")
				{
					$rank = "�Ҩ���� ᾷ��˭ԧ";
				}
				else
				{
					$rank = $emp["emprankname"];
				}
				?>
				<table border="0" cellpadding="5" width="800" style="font-family: Cordia New, Cordia, serif;">
					<thead>
						<tr>
							<th style="font-size:28px;">��������´�Ҩ�����Ш���ѡ�ٵ�</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="font-size:24px;">
								<strong>����</strong>&nbsp;<?=$rank.$emp["empname"]?>&nbsp;<?=$emp["empsname"]?>
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;"><strong>�س�ز�</strong></td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<table border="1" cellspacing="0" cellpadding="5" width="100%">
									<thead>
										<tr>
											<th rowspan="2">�س�ز�</th>
											<th rowspan="2">�Ң��Ԫ�</th>
											<th colspan="2">����稡���֡�Ҩҡ</th>
										</tr>
										<tr>
											<th>ʶҺѹ</th>
											<th>�.�.</th>
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
								<strong>�ѧ�Ѵ</strong>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?=$unitname?>&nbsp;�Ҥ�Ԫ��������ʵ�� ���ᾷ���ʵ�������Ҫ��Һ�� ����Է�������Դ�
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<br>
								<strong>�ҹ�Ԩ�·��ʹ������դ����ӹҭ���</strong>
							</td>
						</tr>
						<tr>
							<td style="font-size:24px;">
								<strong>�ŧҹ�ҧ�Ԫҡ�÷���������ǹ˹�觢ͧ����֡�������Ѻ��ԭ�� ����繼ŷ�����Ѻ������������ѡࡳ�����˹�㹡�þԨ�ó��觵�����ؤ�Ŵ�ç���˹觷ҧ�Ԫҡ����ͺ 5 ����͹��ѧ
								<br>
								�ŧҹ�Ԩ�·�����Ѻ��õվ���������</strong>
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
								<strong>�������ҧ�Ԫҡ��</strong>
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
								<strong>˹ѧ��� ����</strong>
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
					</tbody>
				</table>
				<br>
			<?php
			}//End foreach
		}//End Employee
		?>
	</body>
</html>