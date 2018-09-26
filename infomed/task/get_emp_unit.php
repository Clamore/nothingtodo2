<?php
//กำหนดให้ IE อ่าน page นี้ทุกครั้ง ไม่ไปเอาจาก cache
//header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header("content-type: application/x-javascript; charset=tis-620");

require("../database.mssql.class/database.class.php");
require("../database.mssql.class/config.inc.php");

$objdb = new MyDatabase($strHost,$strDB,$strUser,$strPassword);

$unit_id = $_GET["unit_id"];
/// เพิ่มสองบรรทัดนี้ก่อนทำการ Select ข้อมูล
$sql = mssql_query("set ansi_nulls ON") ;//or die(mssql_get_last_message());
$sql = mssql_query("set ansi_warnings ON") ;//or 
 
$sql = "SELECT     w.empid, w.workunit, e.emprankname, e.empname, e.empsname,e.empflag 
FROM         View_tbempwork AS w LEFT OUTER JOIN
                      View_tbemployee AS e ON w.empid = e.empid
WHERE     (w.workunit='$unit_id') and ((w.positiontype ='1') OR (w.positiontype = '2' AND workposition = '72')) and ((e.empflag<>'2') and  (e.empflag<>'3') and  (e.empflag<>'6') )  order by e.empname ";
//echo $sql;and  (e.empflag<>'6')
	
 $arr= $objdb->getArray($sql);
echo "<option value='0'></option>";
if(count($arr)!=0){
 foreach($arr as $rec){
								$id = $rec['empid'];
								$name =$rec['emprankname']."  ".$rec['empname']."  ".$rec['empsname'];
								//echo "$name";
								echo "<option value='$id'>$name</option>";
						 }	
	}


?>

