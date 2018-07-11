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
		<form method="post" action="?chk=excel">
			<input type="hidden" name="years" value="<?=$_SESSION["year"]?>">
			<input type="hidden" name="note" value="<?=$_SESSION["note"]?>">
			<input type="hidden" name="unitid" value="<?=$_SESSION["unit"]?>">
			<input type="hidden" name="employee" value="<?=$_SESSION["employee"]?>">
			<input type="hidden" name="typeid" value="<?=$_SESSION["typeid"]?>">
			<input type="hidden" name="class" value="<?=$_SESSION["class"]?>">
			<input type="submit" value="excel">
		</form>
		<?php
		$years = $_SESSION["year"];
		$note = $_SESSION["note"];
		$unitid = $_SESSION["unit"];
		$employee = $_SESSION["employee"];
		$typeid = $_SESSION["typeid"];
		$class = $_SESSION["class"];
		$yy = date("Y");

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

		$sql = "SELECT *
			FROM $hrmed.tbemployee AS e
			INNER JOIN $hrmed.tbempwork AS w ON e.id=w.id
			LEFT JOIN $hrmed.mtposition AS mp ON w.positionid=mp.positionid
			$unit AND empflag = '1'
		";
		$sql .= $con;
		$arr = $objdb->getArray($sql);
		?>
		<table width="50%" cellpadding="5">
			<thead>
				<tr>
					<th>SAP ID</th>
					<th>ชื่อ-นามสกุล</th>
					<th>เงินเดือน</th>
				</tr>
			</thead>
			<tbody>
		<?php
		if ($arr > 0)
		{
			foreach ($arr AS $rec)
			{
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
				$sql_order = "SELECT TOP 1 * FROM tborder WHERE empid = '$rec[empid]' ORDER BY id DESC ";
				$recorder = $objdb->query_first($sql_order);
				$roworder = $objdb->numrows($sql_order);
				if ($roworder > 0)
				{
					if ($recorder["amount"] == "" AND $recorder["amount"] == " ")
					{
						$amount = 0;
					}
					else
					{
						$amount = $recorder["amount"];
						//$amount = $aes->decrypt(asciitotext($recorder["amount"]));
					}
				}
				else
				{
					$amount = 0;
				}
			?>
				<tr>
					<td><?=$rec["empid"]?></td>
					<td><?=$rank.$rec["empname"]." ".$rec["empsname"]?></td>
					<td><?=$amount?></td>
				</tr>
			<?php
			}// End foreach arr as rec
		}// End if arr > 0
		?>
	</body>
</html>