<?php
session_start();

$_SESSION["year"] = "";
$_SESSION["unit"] = "";
$_SESSION["note"] = "";
$_SESSION["employee"] = "";
$_SESSION["typeid"] = "";
$_SESSION["class"] = "";

$_SESSION["year"] = $_POST["years"];
$_SESSION["unit"] = $_POST["unit"];
$_SESSION["note"] = $_POST["note"];
$_SESSION["employee"] = $_POST["employee"];
$_SESSION["typeid"] = $_POST["typeid"];
$_SESSION["class"] = $_POST["class"];
$report = $_POST["report"];

if ($report == "1")
{
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=report_order.php">';
}
elseif ($report == "2")
{
	//echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=report_order_sign.php?chk=excel">';
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=report_order_sign.php">';
}
elseif ($report == "3")
{
	//echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=report_evaluate.php?chk=excel">';
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=report_evaluate.php">';
}
elseif ($report == "4")
{
	//echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=report_salary.php?chk=excel">';
	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=report_salary.php">';
}
?>