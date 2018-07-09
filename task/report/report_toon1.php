<?
if($_GET["doc"]=="doc"){
header("Content-Type: application/msword");
header('Content-Disposition: attachment; filename="report_t1.doc"');
}
require("../database.mssql.class/msdatabase.class.php");
require("../database.mssql.class/config.inc.php");
require("../function/function.php");
//require("../database.mssql.class/accms_config.php");

$editor_arr = array("","หนังสือ","ตำรา","บทความทางวิชาการ","วิดิทัศน์","อื่นๆ","จัดทำสื่อสิ่งพิมพ์เผยแพร่ความรู้");

$objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<meta name=Generator content="Microsoft Word 12 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;}
@font-face
	{font-family:"Angsana New";
	panose-1:2 2 6 3 5 4 5 2 3 4;}
@font-face
	{font-family:"Cordia New";
	panose-1:2 11 3 4 2 2 2 2 2 4;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
@font-face
	{font-family:"Browallia New";
	panose-1:2 11 6 4 2 2 2 2 2 4;}
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

<body lang=EN-US>
<?
//Get param
$emp_id = $_GET["emp_id"];
$strDatestart = $_GET["date_start"];
$strDateend= $_GET["date_end"];
$month = $_GET["mon"];

 $date_start_db =  sqldate($date_start);
 $date_end_db =  sqldate($date_end);

$con_date = "  AND (a.task_flag is  NULL) AND (e.emp_status !='0')  AND ((a.datetime_start <= '$date_end_db "." 23:59"."') AND (a.datetime_end >= '$date_start_db"." 00:00"."')) ";

?>
<?
function DateThai($strDate)
	{
		//$strYear = date("Y",strtotime($strDate))+543;
		//$strMonth= date("n",strtotime($strDate));
		//$strDay= date("j",strtotime($strDate));
		//$strHour= date("H",strtotime($strDate));
		//$strMinute= date("i",strtotime($strDate));
		//$strSeconds= date("s",strtotime($strDate));
		$arr = explode('/',$strDate);
		//$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฏาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
		$thai_month_arr=array(  
						"0"=>"",  
						"01"=>"มกราคม",  
						"02"=>"กุมภาพันธ์",  
						"03"=>"มีนาคม",  
						"04"=>"เมษายน",  
						"05"=>"พฤษภาคม",  
						"06"=>"มิถุนายน",   
						"07"=>"กรกฎาคม",  
						"08"=>"สิงหาคม",  
						"09"=>"กันยายน",  
						"10"=>"ตุลาคม",  
						"11"=>"พฤศจิกายน",  
						"12"=>"ธันวาคม"                    
					);  
		$m = $thai_month_arr[$arr[1]];
		$y =  $arr[2]+543;
		//$strMonthThai=$strMonthCut[$arr[1]];
		return "$arr[0] $m $y";
	}

	$ds = DateThai($strDatestart);
	$de = DateThai($strDateend);
?>
<?
//================= MONTH
$arr = explode('/',$strDatestart);
$d1 = $arr[2].'-'.$arr[1].'-'.$arr[0];
$arr = explode('/',$strDateend);
$d2 = $arr[2].'-'.$arr[1].'-'.$arr[0];
date_default_timezone_set('Asia/Tokyo');  // you are required to set a timezone

$date1 = new DateTime($d1); //วันที่เริ่ม
$date2 = new DateTime($d2); //วันที่สิ้นสุด

/*$diff = $date1->diff($date2);
$month = ($diff->format('%m')+1);*/
//$month = ($diff->format('%m'));
//echo (($diff->format('%y') * 12) + $diff->format('%m')) . " full months difference";

?>
<div class=Section1 >



<p class=MsoNoSpacing><span style='font-size:7.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<?
/*//$emp_id = $_GET["emp_id"];
$sql = " SELECT     SUBSTRING(m.task_id, 1, 1) AS Expr1, SUM(a.task_hr1) AS Expr2, SUM(CASE WHEN SUBSTRING(m.task_id, 1, 2) = '01' THEN a.task_hr1 END) AS t01,  SUM(CASE WHEN SUBSTRING(m.task_id, 1, 2) = '02' THEN a.task_hr1 END) AS t02, SUM(CASE WHEN SUBSTRING(m.task_id, 1, 2) = '03' THEN a.task_hr1 END)  AS t03
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id')  ". $con_date."  GROUP BY SUBSTRING(m.task_id, 1, 1) " ;
//echo $sql;
$rec  = $objdb->query_first($sql);
$st = 115*6;*/
?>



<!--########## 1.งานสอน ##################################################################################-->

<p class=MsoNoSpacing><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>
  <![if !supportLists]>
  <b><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif";mso-fareast-font-family:"Browallia New"'><span
style='mso-list:Ignore'>1.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></span></b>
  <![endif]>
  <b><span lang=TH style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>งานสอน</span></b><b><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>
  <o:p></o:p>
  </span></b></p>

<p class=MsoNoSpacing style='margin-left:54.0pt;text-indent:-18.0pt;mso-list:
l2 level2 lfo8'><![if !supportLists]><b><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif";mso-fareast-font-family:"Browallia New"'><span
style='mso-list:Ignore'>1.1<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span></b><![endif]><b><span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานการศึกษา(ก่อนปริญญา)</span></b><b><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>



<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNoSpacing><b><span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif"'>หลักสูตรแพทยศาสตรบัณฑิต<span
style='mso-spacerun:yes'>&nbsp; </span>(<u>ภายใน</u>ภาควิชาอายุรศาสตร์)</span></b><b><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:-7.65pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=329 rowspan=2 style='width:246.95pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายวิชา</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 rowspan=2 style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ประเมิน/ภาคสนาม<o:p></o:p></span></b></p>  </td>
  <td width=132 colspan=2 style='width:99.25pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอนทฤษฎี</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=139 colspan=2 style='width:104.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอนปฏิบัติ</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:67.05pt'>
  <td width=132 style='width:49.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=66 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=139 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=73 style='width:54.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
 </tr>
 
 <?
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0101')  ". $con_date . "
 ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
$tm1=0;
$tm11=0;
$tm12=0;
$tm13=0;
$tm14=0;

$sum_t11_hr1 =0;
$sum_t11_hr2 =0;
$sum_t11_hr1t =0;
$sum_t11_hr2t =0;
$sum_t11_hr3 =0;
$sum_t11=0;

$sum_t1 = 0;

if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>

 <tr style='mso-yfti-irow:2'>
  <td width=329 valign=top style='width:246.95pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
<span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec_m["tm"]?></span>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;background:
  #DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=139 valign=top style='width:49.6pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 
 
 <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  
(SELECT     task_name  FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name, m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]')  ". $con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main  " ;
//echo "<br>".$sql;
$arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$hr1 = 0;
$hr2 = 0;
$hr3 = 0;
if(count($arr)>0){
foreach($arr as $rec){
//if(($rec["task_main"]=="11203") || ($rec["task_main"]=="11401") || ($rec["task_main"]=="11301") ){
if(($rec["task_main"]=="11401") || ($rec["task_main"]=="11301") ){
$hr3 = $rec["hr"];
$hr1 = 0;
$hr2 = 0;
}else if(($rec["task_main"]=="11101") || ($rec["task_main"]=="11102") ){
$hr1 = $rec["hr"];
$hr2 = 0;
$hr3 = 0;
}else{
$hr2 = $rec["hr"];
$hr1 =0;
$hr3= 0;
}
//echo $hr1.$hr2.$hr3;
?>

 <tr style='mso-yfti-irow:3'>
  <td width=329 valign=top style='width:246.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  
  <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>- &nbsp;<?=$rec["tm_name"]?></span>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  </span><span class="MsoNoSpacing" style="text-align:center"><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <? 
	if($hr3!=0){
	 $sum_t11_hr3 =  $sum_t11_hr3 + $hr3;
	 echo number_format($hr3,1);
	 
	 }
	//$tm1_hr2 = $tm1_hr2+$hr2;
	 ?>
  </span></span></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>
  <? 
  if($hr1!=0){
	 $sum_t11_hr1 =  $sum_t11_hr1 + $hr1;
	 echo number_format($hr1,1);
	 }
	//if($hr1!=0) echo number_format($hr1,1);
	//$tm1_hr1 = $tm1_hr1+$hr1;
 ?>
 </o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>
  <?
    //if($hr1 != 0) echo number_format($hr1*3,1) ;
    if($hr1!=0){
	 $sum_t11_hr1t =  $sum_t11_hr1t + ($hr1*3);
	 echo number_format($hr1*3,1);
	 }
  ?>
  
  </o:p></span></p>  </td> 
  <td width=139 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <?
  //echo number_format($hr2,1);
	if($hr2 != 0 ){
	 $hr = $hr2;
	 echo number_format($hr,1);
	 $sum_t11_hr2 =  $sum_t11_hr2 + $hr;
	 
	//$tm1_hr2 = $tm1_hr2+$hr2;
	}
	 ?>
	 </p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <? if($hr2 != "" ) {
			/*if($rec["task_main"]=="11102"){
					 $sum_t11_hr2t =  $sum_t11_hr2t + ($hr2*1.50);
					echo (number_format($hr2*1.50,1));
			}else{*/
			  $sum_t11_hr2t =  $sum_t11_hr2t + ($hr2*1.50);
			echo (number_format($hr2*1.50,1));
			// }
	}

	?></p>  </td>
 </tr>
 
  <? 
  } 
  }
  }
  }
  //=====================
  ?>
  
 <tr style='mso-yfti-irow:61;mso-yfti-lastrow:yes'>
  <td width=329 valign=top style='width:246.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .25pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานสอน
  หลักสูตรแพทยศาสตรบัณฑิต</span></b><b><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(ภายในภาควิชาอายุรศาสตร์)
  ทั้งหมด</span></b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .25pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  $sum_t11 = $sum_t11 + $sum_t11_hr3;
  echo number_format($sum_t11_hr3,1);
  $sum_t1 = $sum_t1 + $sum_t11;
  $t11_111 += $sum_t11_hr3
  ?>
    <o:p></o:p></span></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .25pt;
  mso-border-top-alt:.5pt;mso-border-left-alt:.25pt;mso-border-bottom-alt:.5pt;
  mso-border-right-alt:.25pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b><span class="MsoNoSpacing" style="text-align:center"><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
	echo number_format($sum_t11_hr1,1);
	?>
  </span></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .25pt;
  mso-border-top-alt:.5pt;mso-border-left-alt:.25pt;mso-border-bottom-alt:.5pt;
  mso-border-right-alt:.25pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <? 
  	$sum_t11 = $sum_t11 + $sum_t11_hr1t;
  echo number_format($sum_t11_hr1t,1);
   $sum_t1 = $sum_t1 + $sum_t11_hr1t;
    $t11_111 += $sum_t11_hr1t;
  ?>
    <o:p></o:p></span></p>  </td>
  <td width=139 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?= number_format($sum_t11_hr2,1);?><o:p></o:p></span></p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:windowtext;
  mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $sum_t11 = $sum_t11 + $sum_t11_hr2t;
  echo number_format($sum_t11_hr2t,1);
  $sum_t1 = $sum_t1 + $sum_t11_hr2t;
  $t11_111 += $sum_t11_hr2t;
  ?><o:p></o:p></span></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>




<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNoSpacing><b><span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif"'>หลักสูตรแพทยศาสตรบัณฑิต<span
style='mso-spacerun:yes'>&nbsp; </span>(<u>ภายนอก</u>ภาควิชาอายุรศาสตร์)</span></b><b><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=329 rowspan=2 style='width:246.95pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายวิชา</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 rowspan=2 style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ประเมิน<o:p></o:p></span></b></p>  </td>
  <td width=132 colspan=2 style='width:99.25pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอนทฤษฎี</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=139 colspan=2 style='width:104.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอนปฏิบัติ</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:67.05pt'>
  <td width=132 style='width:49.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=66 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=139 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=73 style='width:54.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
 </tr>
 
 
 <?
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0102') ". $con_date."
ORDER BY m.task_main  ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
$tm1_hr2 = 0;

$sum_t12_hr1 = 0;
$sum_t12_hr2 = 0;
$sum_t12_hr1t = 0;
$sum_t12_hr2t = 0;
$sum_t12_hr3 = 0;

if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr style='mso-yfti-irow:2'>
  <td width=329 valign=top style='width:246.95pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><b><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></b><b><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;background:
  #DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=139 valign=top style='width:49.6pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
 
 <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name, m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]')  ". $con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main  " ;
//echo $sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);

if(count($arr)>0){

foreach($arr as $rec){

if($rec["task_main"]=="12101"){
$hr1 = $rec["hr"];
$hr2 = 0;
}else{
$hr2 = $rec["hr"];
$hr1 =0;
}
//$hr2 = $rec["hr"];
//$tm1_hr2 = $tm1_hr2+$rec["hr"];
?>
 <tr style='mso-yfti-irow:3'>
  <td width=329 height="34" valign=top style='width:246.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec["tm_name"]?><o:p></o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <? 
  if($hr1 != "")
  {
  	$sum_t12_hr1 = $sum_t12_hr1 +  $hr1;
    echo (number_format($hr1,1));
   }
   ?>
  <o:p>&nbsp;</o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
   if($hr1 != ""){
   $sum_t12_hr1t = $sum_t12_hr1t +  $hr1*3.0;
   echo (number_format($hr1*3.0,1));
   }
   
   ?><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=139 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
   if($hr2 != "" ){
     $sum_t12_hr2 = $sum_t12_hr2 +  $hr2;
    echo ( number_format($hr2,1));
	}
  ?><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
	if($hr2 != "" ){
	  if($rec["task_main"]=='12102')
	  {
		 $sum_t12_hr2t = $sum_t12_hr2t +  $hr2*1.50;
		 echo ( number_format($hr2*1.50,1));
	  }
	  else
	  {
		  $sum_t12_hr2t = $sum_t12_hr2t +  $hr2;
		  echo ( number_format($hr2,1));
	  }
	}
  
  ?><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
  <? 
  } 
  }
  }//end count
  }
  ?>
 <tr style='mso-yfti-irow:10;mso-yfti-lastrow:yes'>
  <td width=329 valign=top style='width:246.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .25pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานสอนหลักสูตรแพทยศาสตรบัณฑิต</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(ภายนอกภาควิชาฯ)
  ทั้งหมด</span></b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .25pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <o:p></o:p></span></b></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .25pt;
  mso-border-top-alt:.5pt;mso-border-left-alt:.25pt;mso-border-bottom-alt:.5pt;
  mso-border-right-alt:.25pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> 
  <?
    echo  number_format($sum_t12_hr1,1);

  ?>
  <o:p></o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .25pt;
  mso-border-top-alt:.5pt;mso-border-left-alt:.25pt;mso-border-bottom-alt:.5pt;
  mso-border-right-alt:.25pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif"'> </span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
 <?
  $sum_t11 = $sum_t11 + $sum_t12_hr1t;
  echo  number_format($sum_t12_hr1t,1);
  $sum_t1 = $sum_t1 + $sum_t12_hr1t;
  $t11_111 +=  $sum_t12_hr1t;
  ?>
  <o:p></o:p></span></p>  </td>
  <td width=139 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo  number_format($sum_t12_hr2,1);
  ?>
  <o:p></o:p></span></p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:windowtext;
  mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif"'></span></b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>

  <?
    $sum_t11 = $sum_t11 + $sum_t12_hr2t;
  echo  number_format($sum_t12_hr2t,1);
   $sum_t1 = $sum_t1 + $sum_t12_hr2t;
   $t11_111 +=  $sum_t12_hr2t;
  ?>
  <o:p></o:p></span></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNoSpacing><b><span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif"'>หลักสูตรอื่นๆ ระดับปริญญาตรี (ภายในมหาวิทยาลัยมหิดล)</span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=329 rowspan=2 style='width:246.95pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายวิชา</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 rowspan=2 style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ประเมิน<o:p></o:p></span></b></p>  </td>
  <td width=132 colspan=2 style='width:99.25pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอนทฤษฎี</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=139 colspan=2 style='width:104.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอนปฏิบัติ</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:67.05pt'>
  <td width=132 style='width:49.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=66 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=139 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=73 style='width:54.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
 </tr>
 
 <?
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0103') ". $con_date."
ORDER BY m.task_main  ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
$sum_t13_hr1 = 0;
$sum_t13_hr2 = 0;
$sum_t13_hr1t = 0;
$sum_t13_hr2t = 0;
$sum_t13_hr3 = 0;

if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>

 <tr style='mso-yfti-irow:2'>
  <td width=329 valign=top style='width:246.95pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><b><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?=$rec_m["tm"]?><span style='color:#333333;letter-spacing:
  .2pt;background:white'><o:p></o:p></span></span></b></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:solid windowtext 1.0pt;
  border-bottom:solid windowtext 1.0pt;border-right:none;mso-border-top-alt:
  solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:
  solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;background:
  #DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=139 valign=top style='width:49.6pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>  </td>
 </tr>
  <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name, m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main  " ;
//echo $sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){

foreach($arr as $rec){

$hr = $rec["hr"];

?>

 <tr style='mso-yfti-irow:3'>
  <td width=329 valign=top style='width:246.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'>
    <o:p><?=$rec["tm_name"]?></o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p>
  </span><span class="MsoNoSpacing" style="text-align:center"><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $sum_t13_hr1 = $sum_t13_hr1   + $hr;
  echo number_format($hr,1);
  
  ?>
  </span></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;<span class="MsoNoSpacing" style="text-align:center">
    <?
	$sum_t13_hr1t = $sum_t13_hr1t   + $hr*3;
	echo number_format($hr*3,1);
	
	 ?>
  </span></o:p></span></p>  </td>
  <td width=139 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p><?//=number_format($hr2,1) ?></o:p></span></p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p><?// if($hr2 != "" ) echo ($hr2*1.5);?></o:p></span></p>  </td>
 </tr>
  <? 
  } 
  }
  }//end count
  }
  ?>
  
  
 <tr style='mso-yfti-irow:10;mso-yfti-lastrow:yes'>
  <td width=329 valign=top style='width:246.95pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .25pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานสอนหลักสูตรอื่นๆ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภายในมหาวิทยาลัยมหิดลทั้งหมด</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .25pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=132 valign=top style='width:49.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .25pt;
  mso-border-top-alt:.5pt;mso-border-left-alt:.25pt;mso-border-bottom-alt:.5pt;
  mso-border-right-alt:.25pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  
  echo number_format($sum_t13_hr1,1);
  ?>
  <o:p></o:p></span></p>  </td>
  <td width=66 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .25pt;
  mso-border-top-alt:.5pt;mso-border-left-alt:.25pt;mso-border-bottom-alt:.5pt;
  mso-border-right-alt:.25pt;mso-border-color-alt:windowtext;mso-border-style-alt:
  solid;background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif"'></span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  
  <?
  $sum_t11 = $sum_t11 + $sum_t13_hr1t;
  echo number_format($sum_t13_hr1t,1);
 $t11_111 +=  $sum_t13_hr1t;
  ?><o:p></o:p></span></p>  </td>
  <td width=139 valign=top style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif"'></span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($sum_t13_hr2,1);
  ?>
  <o:p></o:p></span></p>  </td>
  <td width=73 valign=top style='width:54.75pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:windowtext;
  mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif"'></span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> 
   <?
    $sum_t11 = $sum_t11 + $sum_t13_hr2t;
  echo number_format($sum_t13_hr2t,1);
   $t11_111 +=  $sum_t13_hr2t;
  ?>
  <o:p></o:p></span></p>  </td>
 </tr>
</table>






<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>




<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานวิทยานิพนธ์/สารนิพนธ์/โครงงาน</span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=574 valign=top style='width:430.65pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับปริญญาตรี</span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 <tr>
  <td width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>หลักสูตร...........&nbsp;
  คณะ..................... มหาวิทยาลัย&nbsp;
  วิชา......................................</span></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <tr style='height:27.8pt'>
  <td width=574 style='width:430.65pt;border:solid windowtext 1.0pt;border-top:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานวิทยานิพนธ์/สารนิพนธ์/โครงงานทั้งหมด</span></b></p>  </td>
  <td width=124 style='width:92.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
</table>-->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>


<?
$sql = "SELECT e.task_emp, m.id, m.task_id,m.task_main,  (SELECT  task_name  FROM  task_main  WHERE      (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_name,  m.task_main, e.emp_hr, e.emp_research, a.topic_detail,a.task_detail,  a.topic_eng,a.datetime_start, a.datetime_end,a.task_hr1 
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0105') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);

?>

<p class=MsoNoSpacing><b><span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif"'>งานวิทยานิพนธ์/สารนิพนธ์/โครงงาน </span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานวิทยานิพนธ์/สารนิพนธ์/โครงงาน</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">จำนวน
      ชม</span></p>  </td>
 </tr>
 <?
 if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
$c++;

$task_detail =  $rec["task_detail"];

 ?>
 <tr>
  <td width=541 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span>  </p>  </td>
  <td width=493 valign=top style='width:370.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'><?=$rec["tm_name"] . '&nbsp;&nbsp;' .$task_detail?> 

  </span>  </p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
 $sum_hr = $sum_hr +  $rec["task_hr1"];
 echo number_format($rec["task_hr1"],1);
  ?>
  </span>  </p>  </td>
 </tr>
 <?
 }}
 ?>
  <tr>
  <td width=541 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span>  </p>  </td>
  <td width=493 valign=top style='width:370.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>  </span>  &nbsp;</p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  </p>  </td>
 </tr>
 <tr>
  <td width=541 colspan=2 valign=top style='width:405.6pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center"><span style='font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;'
  lang="th" xml:lang="th">รวมงานวิทยานิพนธ์/สารนิพนธ์/โครงงานทั้งหมด</span></b></span></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $sum_t11 = $sum_t11 + $sum_hr;
  echo  number_format($sum_hr,1); 
  $t11_112 = $sum_hr;
  ?></span></b></p>  </td>
 </tr>
</table>

<!-- ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
<p class=MsoNoSpacing><b><span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif"'>รับดูงานและอบรม Elective</span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รับดูงานและอบรม Elective</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">จำนวน
      ชม</span></p>  </td>
 </tr>

 <?
 $sql = "SELECT DISTINCT m.task_main as task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0106')  ". $con_date . "
 ORDER BY m.task_main ";
//echo $sql."<br>";
 $arr_m = $objdb->getArray($sql);
 $elec=0;
//echo "count===".count($arr);

if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
<tr>
  <td width=541 colspan="3" style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:left'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></b></p>  </td>
 </tr>

 <?php
 $sql = "SELECT e.task_emp, m.id, m.task_id,m.task_main,  (SELECT  task_name  FROM  task_main  WHERE      (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_name,  m.task_main, e.emp_hr, e.emp_research, a.topic_detail as topic_detail,a.task_detail as task_detail,  a.topic_eng,convert(char(10),a.datetime_start,120) as datetime_start, convert(char(10),a.datetime_end,120) as datetime_end,a.task_hr1 as hr 
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_main LIKE '".$rec_m["task_main"]."') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
 if(count($arr)>0){
 $ss=1;
 foreach($arr as $rec){
 ?>

  <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$ss;?></span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:left'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec["task_detail"]?> (<?=$rec["datetime_start"]?>)</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;"><?=number_format($rec["hr"],1)?></span></p>  </td>
 </tr>

<?php
$ss++;
$sum_hr = $sum_hr +  $rec["hr"];
//$elec=$elec+$rec["hr"];
 }// foreach main
 }// if count main
}// foreach id
}// if count id
?>
<tr>
  <td width=541 colspan=2 valign=top style='width:405.6pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center"><span style='font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;'
  lang="th" xml:lang="th">รวมรับดูงานและอบรม Electiveทั้งหมด</span></b></span></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $sum_t11 = $sum_t11 + $sum_hr;
  echo  number_format($sum_hr,1); 
  $t11_112 = $sum_hr;
  ?></span></b></p>  </td>
 </tr>
</table>

<!-- END ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- END ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- END ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- END ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- END ADD//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>




<!--<p class=MsoNoSpacing style='margin-left:65.95pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานเตรียมและพัฒนาการศึกษา
(ก่อนปริญญา)</span></b></p>-->

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานเตรียมและพัฒนาการศึกษา</span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 

 <?
  /*
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0104') ". $con_date."
ORDER BY m.task_main ";
// echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){*/
?>

<!--
 <tr>
  <td width=574 valign=top style='width:430.65pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
    <?=$rec_m["tm"]?>
  </span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>-->
 <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  
(SELECT   DISTINCT  task_name  FROM   task_main    WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT   DISTINCT  task_name    FROM   task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0104') AND (m.task_main <> '14103') ". $con_date."  
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main  " ;
//echo "<br>>>>>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);

if(count($arr)>0){
$sum_hr = 0;
foreach($arr as $rec){

$hr = $rec["hr"];

?>
 
 <tr>
  <td width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  if($rec["tm_name"] ==$rec["tm_name2"]){
  	echo $rec["tm_name2"];
  }else{
  	echo $rec["tm_name"] ." /".  $rec["tm_name2"];
  }
  
  ?>
  </span></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $sum_hr = $sum_hr + $hr;
  echo number_format($hr,1); 
  
  ?></span></p>  </td>
 </tr>
 
 <? 
  } 
  }
/*  }//end count
  }*/
  ?>
 <tr style='height:27.8pt'>
  <td width=574 style='width:430.65pt;border:solid windowtext 1.0pt;border-top:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานเตรียมและพัฒนาการศึกษาทั้งหมด</span></b></p>  </td>
  <td width=124 style='width:92.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <?
  $sum_t11 = $sum_t11 + $sum_hr;
   echo number_format($sum_hr,1); 
   $t11_113 = $sum_hr;
   ?></p>  </td>
 </tr>
 <tr style='height:27.8pt'>
  <td width=574 style='width:430.65pt;border:solid windowtext 1.0pt;border-top:
  none;background:#9BBB59;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมภาระงานการศึกษา
  (ก่อนปริญญา) ทั้งหมด</span></b></p> </td>
  <td width=124 style='width:92.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#9BBB59;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <?
  //echo number_format($sum_t11,1);
  //echo "<br>";
  echo number_format($t11_111+$t11_112+$t11_113,1);
  $t11 = ($t11_111+$t11_112+$t11_113);
  ?>
  &nbsp;</p>  </td>
 </tr>
</table>




<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span><!--</p>

<p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
"Browallia New","sans-serif"'>คำอธิบาย “งานเตรียมและพัฒนาการศึกษา”</span></b></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รหัสงาน
</span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0104-1410 <u>x</u></b>-0&nbsp;
<span lang=TH>อาจมีการเพิ่มเติมได้ เช่น หัวข้อปฐมนิเทศ,
บริหารการศึกษา/สัมมนาการศึกษา/เตรียมการเรียนการสอน, พัฒนาข้อสอบ ฯลฯ&nbsp;
ดังนั้นหากมีเพิ่มขึ้นมา ขอให้รายงานขึ้นโดยอัตโนมัติ</span></span></p>





<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>--></p>

<p class=MsoNoSpacing style='margin-left:54.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>1.2<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></b> <span lang=TH
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานการศึกษา (หลังปริญญา)</span></b></p>

<!--<p class=MsoNoSpacing style='margin-left:78.0pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานสอน</span></b></p>-->

<!--<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>-->

<p class=MsoNoSpacing> <span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif";color:#333333;letter-spacing:.2pt;background:white'>ฝึกอบรมแพทย์ประจำบ้านอายุรศาสตร์
</span></b>/ <span style="font-size:16.0pt;font-family:
&quot;Browallia New&quot;,&quot;sans-serif&quot;;color:#333333;letter-spacing:.2pt;background:white;">แพทย์ประจำบ้านต่อยอด/แพทย์เฟลโลว์
</span></b></p>

<?
    $sum_t12=0;
	$t21 = 0;
	$t21_hr1 = 0;
	$t21_hr2 = 0;
	$t21_hr3 = 0;
	
?>

 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=295 rowspan=2 style='width:221.1pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>หลักสูตร/วิชา/กิจกรรม</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=62 rowspan=2 style='width:46.15pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>ประเมิน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=170 colspan=3 valign=top style='width:127.5pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม. สอนทฤษฎี</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=170 colspan=3 valign=top style='width:127.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม. สอนปฏิบัติ</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>เข้าร่วม</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>สอน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>ภาระงาน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>เข้าร่วม</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>สอน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>ภาระงาน</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
 </tr>
 

 <tr style='mso-yfti-irow:2'>
  <td width=295 valign=top style='width:221.1pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><b><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>กิจกรรมทางวิชาการ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span></b></p>  </td>
  <td width=62 valign=top style='width:46.15pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
 </tr>
    <?
	
	$t12_hr2_1 = 0;
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT     m.task_main,  (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_name, 
							SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0201')
GROUP BY m.task_main ORDER BY m.task_main" ;*/

$sql = "SELECT     m.task_main,    
(SELECT   DISTINCT  task_name     FROM   task_main     WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, SUM(a.task_hr1) AS hr, SUM(CASE WHEN e.emp_teach = '1' THEN 1 ELSE 0 END) AS 'et'
  FROM  task_action AS a INNER JOIN  task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref
WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0201') ". $con_date."  GROUP BY m.task_main ORDER BY m.task_main";

//echo $sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
foreach($arr as $rec){
$hr = $rec["hr"];
$et = $rec["et"];
//$task_name =  $rec["tm_name"]." ".$rec["tm_sub"];
$task_name =  $rec["tm_name"];
?>
 <tr style='mso-yfti-irow:3'>
  <td width=295 valign=top style='width:221.1pt;border:solid windowtext 1.0pt; border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
 <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-&nbsp;<?=$task_name?></span>  </td>
  <td width=62 valign=top style='width:46.15pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>
  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>
   </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
    <p>&nbsp;</p>
    </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>
  <?
  echo number_format($hr,1);
  $t12_hr2_1 +=  $hr;
  ?></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>
  <? 
  if($et!=0) {
    echo number_format($et,1) ;
   	$t12_hr2_2 =  $t12_hr2_2 + $et;
  }
  ?>
  </span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>
  <?
   // if($et!=0) echo $et*4 ;
    if($et!=0) {
  echo number_format(($et*4),1) ;
   	$t12_hr2_t =  $t12_hr2_t + ($et*4);
  }
  ?>
 
  </span></p>  </td>
 </tr>
 
  <?
 }
}
 ?>
 
 
 <tr style='mso-yfti-irow:4'>
  <td width=295 valign=top style='width:221.1pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><b><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>สอนทฤษฎี</span></b><b><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=62 valign=top style='width:46.15pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
 </tr>
 
 <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name3, 
m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN 
 task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0202') ". $con_date. "
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY m.task_main" ;
/*$sql="SELECT    m.task_main as main,(SELECT   DISTINCT  task_name     FROM          task_main     WHERE  (task_main = m.task_main) AND (task_sub = '0') AND (task_topic ='0')) AS tm_name, 
 SUM(a.task_hr1) AS hr  
 FROM    task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref   
 WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0202') ". $con_date."  GROUP BY  m.task_main ORDER BY m.task_main";
//  echo "<br> id ".$sql."<br>";
  $arr = $objdb->getArray($sql);
 //echo "count===".count($arr);
if(count($arr)>0){
foreach($arr as $rec){

$sql="SELECT    m.task_sub as sub,(SELECT   DISTINCT  task_name     FROM          task_main     WHERE  (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic ='0')) AS tm_name, 
 SUM(a.task_hr1) AS hr  
 FROM    task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref   
 WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '".$rec["main"]."') ". $con_date."  GROUP BY  m.task_main,m.task_sub ORDER BY m.task_main";
//  echo "<br> main ".$sql."<br>";
  $arr = $objdb->getArray($sql);
 //echo "count===".count($arr);
if(count($arr)>0){
foreach($arr as $rec){

$sql="SELECT    m.task_topic as topic,m.task_sub as sub,m.task_main as main,(SELECT   DISTINCT  task_name     FROM          task_main     WHERE  (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic =m.task_topic)) AS tm_name, 
 SUM(a.task_hr1) AS hr  
 FROM    task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref   
 WHERE (e.task_emp = '$emp_id') AND (m.task_sub LIKE '".$rec["sub"]."') ". $con_date."  GROUP BY  m.task_main,m.task_sub,m.task_topic ORDER BY m.task_main";
 // echo "<br> topic ".$sql."<br>";
  $arr = $objdb->getArray($sql);
 //echo "count===".count($arr);
if(count($arr)>0){
foreach($arr as $rec){

$sql = "SELECT    m.task_main,(SELECT   DISTINCT  task_name     FROM          task_main     WHERE  (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic =m.task_topic)) AS tm_name, 
 SUM(a.task_hr1) AS hr  
 FROM    task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref   
 WHERE (e.task_emp = '$emp_id') AND (m.task_topic LIKE '".$rec["topic"]."') AND (m.task_sub LIKE '".$rec["sub"]."') AND (m.task_main LIKE '".$rec["main"]."')". $con_date."  GROUP BY m.task_main,m.task_sub,m.task_topic ORDER BY m.task_main ";  */

 //echo "<br>".$sql;
 $arr = $objdb->getArray($sql);
 //echo "count===".count($arr);
if(count($arr)>0){

foreach($arr as $rec){
		$hr = $rec["hr"];
		//$task_name =  $rec["name"]."/".$rec["tm_name"];
		//$task_name =  $rec["tm_name"];
		$task_name =  $rec["tm_name"]."/".$rec["tm_name2"]."/".$rec["tm_name3"];
?>

 <tr style='mso-yfti-irow:5'>
  <td width=295 valign=top style='width:221.1pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>- &nbsp;<?=$task_name?>
 </span>  </td>
  <td width=62 valign=top style='width:46.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>
    <?
  
  $t12_hr1_1 = $t12_hr1_1 + $hr ;
  echo number_format($hr,1);
  
  ?>
  </span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>
  <?
  $t12_hr1_t = $t12_hr1_t + ($hr*4) ;
  echo number_format($hr*4,1);
  
  ?></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
 </tr>
 <?
/*}}// end foreach 0202 and end if count 0202 topic
}} // end foreach 0202 and end if count 0202 sub
}}// end foreach 0202 and end if count 0202 main
}}// end foreach 0202 and end if count 0202 id*/
}}
 ?>
 <tr style='mso-yfti-irow:6'>
  <td width=295 valign=top style='width:221.1pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><b><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>สอนปฏิบัติ</span></b><b><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=62 valign=top style='width:46.15pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
 </tr>
 
   <?
//$emp_id = $_GET["emp_id"];
/*<!--$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0203')
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ;-->*/
$sql = "SELECT     m.task_main,    (SELECT   DISTINCT  task_name     FROM          task_main     WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_main <> '0') AND (task_topic = '0')) AS tm_name, SUM(a.task_hr1) AS hr FROM    task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref
WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0203') ". $con_date."   GROUP BY m.task_main ORDER BY m.task_main";
//echo  "<br>" . $sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){

foreach($arr as $rec){

$hr = $rec["hr"];
///$task_name =  $rec["tm_name"]."/".$rec["tm_name2"];
$task_name =  $rec["tm_name"];

?>


 <tr style='mso-yfti-irow:7'>
  <td width=295 valign=top style='width:221.1pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  
 <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>- &nbsp;<?=$task_name?></span>  </td>
  <td width=62 valign=top style='width:46.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>
  <?
  
  echo number_format($hr,1);
   $t12_hr2_1 += $hr;
   //echo " -- ";
   //echo $t12_hr2_1;
  ?></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing>&nbsp;</p>  </td>
 </tr>
 <? }} ?>
 <tr style='mso-yfti-irow:8'>
  <td width=295 valign=top style='width:221.1pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><b><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>คุมสอบ</span></b><b><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=62 valign=top style='width:46.15pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
 </tr>
 
   <?
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0203')
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ;*/
$sql = "SELECT     m.task_main,    (SELECT  DISTINCT    task_name     FROM     task_main     WHERE      (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_name, SUM(a.task_hr1) AS hr FROM    task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref
WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0204') ". $con_date."   GROUP BY m.task_main ORDER BY m.task_main";
//echo $sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){

foreach($arr as $rec){

$hr = $rec["hr"];
//$task_name =  $rec["tm_name"]."/".$rec["tm_name2"];
$task_name =  $rec["tm_name"];

?>

 <tr style='mso-yfti-irow:9'>
  <td width=295 valign=top style='width:221.1pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
<span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>- &nbsp;<?=$task_name?></span>  </td>
  <td width=62 valign=top style='width:46.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>
  <?
  echo number_format($hr,1);
  $t12_hr3 =  $t12_hr3 + $hr;
  ?>
  </span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;'>
  
  </span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
 </tr>
 
  <?
 }}
 ?>
 
<tr style='mso-yfti-irow:10'>
  <td width=295 valign=top style='width:221.1pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-bottom-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><b><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ออกข้อสอบ/ตรวจข้อสอบ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=62 valign=top style='width:46.15pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border:none;border-bottom:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:
  windowtext;mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
 </tr>
 
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0203')
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ;*/
$sql = "SELECT     m.task_main,    (SELECT  DISTINCT    task_name     FROM     task_main     WHERE      (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_name, SUM(a.task_hr1) AS hr FROM    task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref
WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0205')  ". $con_date."  GROUP BY m.task_main ORDER BY m.task_main";
//echo $sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){

foreach($arr as $rec){

$hr = $rec["hr"];
//$task_name =  $rec["tm_name"]."/".$rec["tm_name2"];
$task_name =  $rec["tm_name"];

?>

<tr style='mso-yfti-irow:11'>
  <td width=295 valign=top style='width:221.1pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>- &nbsp;<?=$task_name?></span>  </td>
  <td width=62 valign=top style='width:46.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p align="center" class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>
  <?
  $t12_hr3 =  $t12_hr3 + $hr;
  echo number_format($hr,1);
  ?>
  
 </span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 <tr style='mso-yfti-irow:12;mso-yfti-lastrow:yes'>
  <td width=295 valign=top style='width:221.1pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมฝึกอบรมแพทย์ประจำบ้านต่อยอด</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>/แพทย์เฟลโลว์
  (สาขาวิชาฯ) ทั้งหมด</span></b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'><o:p></o:p></span></p>  </td>
  <td width=62 valign=top style='width:46.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:windowtext;
  mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <span
  style='color:#333333;letter-spacing:.2pt;'><o:p>
  <? 
  echo number_format($t12_hr3,1);
  $sum_t12=  $sum_t12 + $t12_hr3;
  $t12_121 += $t12_hr3;
  ?>
  </o:p></span></span></b></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:windowtext;
  mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <span
  style='color:#333333;letter-spacing:.2pt;background:white'><o:p></o:p></span></span></b></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:windowtext;
  mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <span
  style='color:#333333;letter-spacing:.2pt;'><o:p>
    <?
 // echo  $t12_hr1_1;
  echo number_format( $t12_hr1_1,1);
  ?>
  </o:p></span></span></b></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <span
  style='color:#333333;letter-spacing:.2pt;'>
  <?
  echo  number_format($t12_hr1_t,1);
  $sum_t12=  $sum_t12+ $t12_hr1_t;
  $t12_121 += $t12_hr1_t;
  ?>
  <o:p></o:p></span></span></b></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  mso-border-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;
  background:#DFDFDF;mso-shading:windowtext;mso-pattern:gray-125 auto;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <span
  style='color:#333333;letter-spacing:.2pt;'>
  <?
  //echo $t12_hr2_1;
  echo  number_format($t12_hr2_1,1);
  $t12_121 += $t12_hr2_1;
  ?>
  <o:p></o:p></span></span></b></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:windowtext;
  mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <span
  style='color:#333333;letter-spacing:.2pt;'>
    <span class="MsoNoSpacing" style="text-align:center"><b>
    <?
  echo  number_format($t12_hr2_2,1);
  ?>
    </b></span>
    <o:p></o:p></span></span></b></p>  </td>
  <td width=57 valign=top style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:#DFDFDF;mso-shading:windowtext;
  mso-pattern:gray-125 auto;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <span
  style='color:#333333;letter-spacing:.2pt;'>
    <o:p></o:p></span></span></b><span class="MsoNoSpacing" style="text-align:center"><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><span
  style='color:#333333;letter-spacing:.2pt;'>
    <?
  echo  number_format($t12_hr2_t,1);
  $sum_t12=  $sum_t12 + $t12_hr2_t;
  $t12_121 += $t12_hr2_t;
 // echo "<br>".$t12_121 ;
  ?>
    </span></span></b></span></p>  </td>
 </tr>
</table>


<p class=MsoNoSpacing>&nbsp;</p>
<p class=MsoNoSpacing><b><span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif"'>งานวิทยานิพนธ์/สารนิพนธ์/โครงงาน </span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center"><span style='font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;'
  lang="th" xml:lang="th">งานวิทยานิพนธ์/สารนิพนธ์/โครงงาน</span></b></span></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">จำนวน
      ชม</span></p>  </td>
 </tr>
 
 
<?
$sql = "SELECT e.task_emp, m.id, m.task_id,m.task_main,  (SELECT DISTINCT  task_name  FROM  task_main  WHERE     (task_id = m.task_id) AND (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_main,  (SELECT DISTINCT  task_name  FROM  task_main  WHERE     (task_id = m.task_id) AND (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = 0)) AS tm_tm_sub,  m.task_main, e.emp_hr, e.emp_research, a.topic_detail,a.task_detail,  a.topic_eng,a.datetime_start, a.datetime_end,a.task_hr1 
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0208') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);

?>

 <?
 if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
$c++;
$task_detail =  $rec["task_detail"];

 ?>
 <tr>
  <td width=541 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span>  </p>  </td>
  <td width=493 valign=top style='width:370.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'><?=$rec["tm_main"] . '  ' . $rec["tm_sub"] .'&nbsp;&nbsp;' .$task_detail?> 
  </span>  </p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $hr = $rec["task_hr1"];
 echo number_format($hr,1);
 $t122_hr =  $t122_hr + $hr;
  ?>
  </span>  </p>  </td>
 </tr>
 <?
 }}
 ?>
  <tr>
  <td width=541 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span>  </p>  </td>
  <td width=493 valign=top style='width:370.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>  </span>  &nbsp;</p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  </p>  </td>
 </tr>
 <tr>
  <td width=541 colspan=2 valign=top style='width:405.6pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center"><span style='font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;'
  lang="th" xml:lang="th">รวมงานวิทยานิพนธ์/สารนิพนธ์/โครงงานทั้งหมด</span></b></span></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?
  echo  number_format($t122_hr,1); 
  $sum_t12=  $sum_t12 + $t122_hr;
  $t12_122 = $t122_hr;
  ?></span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
<p class=MsoNoSpacing><b><span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif"'>รับดูงานและอบรม Elective</span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รับดูงานและอบรม Elective</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">จำนวน
      ชม</span></p>  </td>
 </tr>

 <?
 $sql = "SELECT DISTINCT m.task_main as task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0207')  ". $con_date . "
 ORDER BY m.task_main ";
//echo $sql."<br>";
 $arr_m = $objdb->getArray($sql);
 $elec=0;
//echo "count===".count($arr);

if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
<tr>
  <td width=541 colspan="3" style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:left'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></b></p>  </td>
 </tr>

 <?php
 $sql = "SELECT e.task_emp, m.id, m.task_id,m.task_main,  (SELECT  task_name  FROM  task_main  WHERE      (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_name,  m.task_main, e.emp_hr, e.emp_research, a.topic_detail as topic_detail,a.task_detail as task_detail,  a.topic_eng,convert(char(10),a.datetime_start,120) as datetime_start, convert(char(10),a.datetime_end,120) as datetime_end,a.task_hr1 as hr 
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_main LIKE '".$rec_m["task_main"]."') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
 if(count($arr)>0){
 $ss=1;
 foreach($arr as $rec){
 ?>

  <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$ss;?></span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:left'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec["task_detail"]?> (<?=$rec["datetime_start"]?>)</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;"><?=$rec["hr"]?></span></p>  </td>
 </tr>

<?php
$ss++;
$t124_hr =  $t124_hr + $rec["hr"];
//$sum_hr = $sum_hr +  $rec["hr"];
//$elec=$elec+$rec["hr"];
 }// foreach main
 }// if count main
}// foreach id
}// if count id
?>
<tr>
  <td width=541 colspan=2 valign=top style='width:405.6pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center"><span style='font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;'
  lang="th" xml:lang="th">รวมรับดูงานและอบรม Electiveทั้งหมด</span></b></span></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $sum_t14=  $sum_t14 +$t124_hr;
  //$sum_t11 = $sum_t11 + $sum_hr;
  echo  number_format($t124_hr,1); 
  $t12_124 = $t124_hr;
  //$t11_112 = $sum_hr;
  ?></span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>


<!--<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานเตรียมและพัฒนาการศึกษา
(หลังปริญญา)</span></b></p>-->
<?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT  m.task_main,  
(SELECT  DISTINCT   task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT   DISTINCT  task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0206') ". $con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ;
//echo $sql;
 //$arr = $objdb->getArray($sql);
//echo "count===".count($arr);
/*if(count($arr)>0){

foreach($arr as $rec){

$hr2 = $rec["hr"];
$task_name =  $rec["tm_name"]."/".$rec["tm_name2"];

}}*/
?>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 <?
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT  DISTINCT   task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0206') AND (task_main <> '26103') ". $con_date."
ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <!--<tr>
  <td width=546 valign=top style='width:409.4pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>-->
 
 <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  (SELECT  DISTINCT    task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name, m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ;
//echo "<br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
foreach($arr as $rec){

?>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white;'><?=$rec["tm_name"]?></span></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $hr = $rec["hr"];
  $t123_hr = $t123_hr +  $hr;
  echo number_format($hr,1);
  ?></span></p>  </td>
 </tr>
 
 <?
 }
      }
 }
 
 ?>
<!-- <tr>
  <td width=546 valign=top style='width:409.4pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>ฝึกอบรมแพทย์ประจำบ้านต่อยอด/แพทย์เฟลโลว์</span></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
<!-- <tr>
  <td width=546 valign=top style='width:409.4pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>บริหารการศึกษา/สัมมนาการศึกษา/เตรียมการเรียนการสอน</span></b></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>-->
 <!--<tr>
  <td width=546 valign=top style='width:409.4pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด......
  <span style='background:yellow'>(ภาระงานที่อยู่ภายใต้รหัส </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>2</u></b>-0<span lang=TH> ทั้งหมด)</span></span></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>พัฒนาข้อสอบ</span></b></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>-->
<!-- <tr>
  <td width=546 valign=top style='width:409.4pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด......
  <span style='background:yellow'>(ภาระงานที่อยู่ภายใต้รหัส </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>3</u></b>-0<span lang=TH> ทั้งหมด)</span></span></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ควบคุมการฝึกอบรม/ดูงาน/สัมภาษณ์</span></b></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด......
  <span style='background:yellow'>(ภาระงานที่อยู่ภายใต้รหัส </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>4</u></b>-0<span lang=TH> ทั้งหมด)</span></span></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ตรวจเยี่ยมสนามสอบ</span></b></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด......
  <span style='background:yellow'>(ภาระงานที่อยู่ภายใต้รหัส </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>6</u></b>-0<span lang=TH> ทั้งหมด)</span></span></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ประชุมตัดสินผลการสอบ</span></b></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=546 valign=top style='width:409.4pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด......
  <span style='background:yellow'>(ภาระงานที่อยู่ภายใต้รหัส </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>7</u></b>-0<span lang=TH> ทั้งหมด)</span></span></p>
  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 
 
 <tr style='height:27.8pt'>
  <td width=546 style='width:409.4pt;border:solid windowtext 1.0pt;border-top:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานเตรียมและพัฒนาการศึกษา“หลังปริญญา”
  ทั้งหมด</span></b></p>  </td>
  <td width=124 style='width:92.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo  number_format($t123_hr,1) ;
  $sum_t21=  $sum_t21 + $t123_hr;
  $t12_123 = $t123_hr;
  ?>
        </span></b></p>  </td>
 </tr>
 <tr style='height:27.8pt'>
  <td width=546 style='width:409.4pt;border:solid windowtext 1.0pt;border-top:
  none;background:#9BBB59;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมภาระงานสอนหลังปริญญาทั้งหมด
  </span></b></p>  </td>
  <td width=124 style='width:92.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#9BBB59;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
 // echo number_format($sum_t12,1);
  //echo $t12_121;
 // echo $t12_122;
 // echo $t12_123;
  echo ( $t12_121+ $t12_122+ $t12_123+$t12_124);
  $t12 = ( $t12_121+ $t12_122+ $t12_123+$t12_124);
  //$t12 = $sum_t12;
  ?>
  </span></b></p>  </td>
 </tr>
 <tr style='height:27.8pt'>
  <td width=546 style='width:409.4pt;border:solid windowtext 1.0pt;border-top:
  none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานสอนทั้งหมด</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(งานการศึกษาก่อนปริญญา
  + งานการศึกษาหลังปริญญา)</span></b></p>  </td>
  <td width=124 style='width:92.7pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format(($t11+$t12 ),1);
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>


<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>2.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานวิจัย</span></b></p>

<p class=MsoNoSpacing style='margin-left:49.65pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>โครงการวิจัยที่กำลังดำเนินการ</span></b></p>




<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ชื่อโครงการวิจัย</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวนเวลาที่ใช้
  (ชม.)</span></b></p>  </td>
 </tr>
 <?
/* $sql = "SELECT  DISTINCT e.task_emp, m.id, m.task_id, m.task_main, e.emp_hr, e.emp_research, a.topic_detail, a.topic_eng, a.datetime_start, a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0501') AND (m.task_main = '0') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') " . $con_date;*/
$sql = "SELECT  DISTINCT e.task_emp, m.task_id, m.task_main, e.emp_hr, e.emp_research, a.topic_detail, a.topic_eng, convert(char(10),a.datetime_start,120) as datetime_start, convert(char(10),a.datetime_end,120)  as datetime_end 
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE a.task_flag is null and e.emp_status !='0' AND     (m.task_id LIKE '0501') AND a.project_type!='3' AND  (m.task_main = '0') AND (e.task_emp = '$emp_id') AND (e.emp_status <> '0') AND (e.task_confirm = 'Y') " . $con_date;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);

?>
 <?
 if(count($arr)>0){
 $t21=0;
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
$c++;

$topic_detail =  $rec["topic_detail"];
$topic_eng=  $rec["topic_eng"];
 ?>
 <tr>
  <td width=541 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span>  </p>  </td>
  <td width=493 valign=top style='width:370.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  โครงการวิจัย : <?=$topic_detail?> &nbsp;&nbsp;/ <?=$topic_eng?>  &nbsp;
  <?
  echo "(".$rec["datetime_start"] . " - " .$rec["datetime_end"] . ")";
  ?>
  <br />
  <?
  $arr_research = Array("","หัวหน้าโครงการ","ผู้ร่วมวิจัย","ที่ปรึกษา");
  ?>
  บทบาท : <?=$arr_research[$rec["emp_research"]]?>
  </span>  </p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
 <?
 /*$datestart = $rec["datetime_start"];
 $dateend = $rec["datetime_end"];
 $months = $dateend->diff($datestart);
 $months->format('%m months');*/
  /*$datestart = $date_start_db;
 $dateend = $date_end_db;

if ($rec["datetime_end"] >= $dateend OR $rec["datetime_end"] == "0000-00-00")
 {
	 $rs_hr = $rec["emp_hr"]*$month;
 }
 elseif ($rec["datetime_end"] < $dateend)
 {
	$datestart = new DateTime($date_start_db);
    $dateend =  new DateTime($date_end_db);
	$datetimestart = new DateTime($rec["datetime_start"]);
	$datetimeend = new DateTime($rec["datetime_end"]);
	
	$df = $datestart->diff($datetimeend);
	echo $df;
	$months = ($df->format('%m'));
	$rs_hr = $rec["emp_hr"]*$months;
 }*/

 /*$diffs = $datestart->diff($dateend);
 $months = ($diffs->format('%m'));

 if ($dateend == "" OR $dateend == "0000-00-00" OR $dateend == NULL)
 {
	$rs_hr = $rec["emp_hr"]*$month;
 }
 else
 {
	$rs_hr = $rec["emp_hr"]*$months;
 }*/


 $rs_hr = $rec["emp_hr"]*$month;
 // ให้ 6 เดือนไว้ก่อน แล้วค่อยคำนวน
 // $rs_hr = $rec["emp_hr"]*6;
 //$sum_hr = $sum_hr + $rs_hr;
 $t21 +=  $rs_hr;
 echo number_format($rs_hr,1);
 
  ?>
  </span>  </p>  </td>
 </tr>
 <?
 }}
 ?>
 <tr>
  <td width=541 colspan=2 valign=top style='width:405.6pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมงโครงการวิจัยทั้งหมด</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> 
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t21,1); 
  //$t21 = $sum_hr;
  ?></span></b></p>  </td>
 </tr>
</table>



<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<!--<p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
"Browallia New","sans-serif";background:yellow'>คำอธิบายเพิ่มเติม
“โครงการวิจัยที่กำลังดำเนินการ”</span></u></p>
<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>หากเลือกประเภทโครงการเป็น “โครงการรับทำให้ธุรกิจภายนอก
(บริษัทยา)” ไม่ให้คิดภาระงานที่งานวิจัย แต่ไปอยู่ที่งานบริการวิชาการแทน</span></p>-->

<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>


<p class=MsoNoSpacing style='margin-left:49.65pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>ผลงานวิจัยที่ได้รับการตีพิมพ์</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=605 valign=top style='width:16.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ชื่อผลงานวิจัยที่ได้รับการตีพิมพ์</span></b></p>  </td>
 </tr>
 <?
$sql = "SELECT     e.task_emp, e.emp_hr, e.emp_research, a.datetime_start, a.datetime_end, b.type, b.editor_type,b.book_year, b.book_num1, b.book_num2, b.page_start, b.page_end,  b.article_type, b.editor_orther, a.topic_detail,a.topic_eng,a.emp_join, b.name, b.journal_level, b.press
FROM         task_action AS a INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref INNER JOIN
                      task_action_book AS b ON a.task_ref = b.task_ref
WHERE     (a.id LIKE '92') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
?>
 <?
 if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];

 ?>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $c++;
  echo $c;
  ?>
  </span>
  </p>  </td>
  <td width=605 valign=top style='width:16.0cm;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
 <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
 echo "ชื่อบทความ ".$rec["topic_detail"]  ." :  " . $rec["topic_eng"] ;
 echo "<br>ชื่อวารสาร  ".$rec["name"].
 "  ปีที่พิมพ์ ".$rec["book_year"].".   ;เล่มที่  ". $rec["book_num1"]." ฉบับ ".$rec["book_num2"] ." ของวารสาร:".$rec["page_start"] ." - ".$rec["page_end"] ."."
  ?>
  </span>
 </p>  </td>
 </tr>
 <?
 }
 }
 ?>
</table>



<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>


<p class=MsoNoSpacing style='margin-left:49.65pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานแต่งตำรา/หนังสือ/สื่อสิ่งพิมพ์</span></b></p>


<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=605 valign=top style='width:16.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานแต่งตำรา/หนังสือ/สื่อสิ่งพิมพ์</span></b></p>  </td>
 </tr>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  
  <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  
  </span>
  </p>  </td>
  <td width=605 valign=top style='width:16.0cm;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
<span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
 
  </span>  </td>
 </tr>

</table>-->
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=593 height="50" style='width:40.85pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=539 style='width:404.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานแต่งตำรา/หนังสือ/สื่อสิ่งพิมพ์</span></b></p>  </td>
  <td width=65 style='width:48.4pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  (ชม.)</span></b></p>  </td>
 </tr>
 
  <?
$sql = "SELECT     e.task_emp, e.emp_hr, e.emp_research, a.datetime_start, a.datetime_end, b.type, b.editor_type,b.book_year, b.book_num1, b.book_num2, b.page_start, b.page_end,  b.article_type, b.editor_orther, a.topic_detail,a.topic_eng,a.emp_join, b.name, b.journal_level, b.press
FROM         task_action AS a INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref INNER JOIN
                      task_action_book AS b ON a.task_ref = b.task_ref
WHERE     (a.id LIKE '1361') AND (b.editor_type IN ('1','2','3')) AND (b.article_type = '' OR b.article_type IS NULL OR b.article_type IN ('3','4')) AND  (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date . " order by editor_type,a.datetime_start";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
?>
 <?
 if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
 ?>


 <tr>
  <td width=593 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">
    <?
  $c++;
  echo $c;
  ?>
  </span></p>  </td>
  <td width=539 valign=top style='width:404.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
 echo $editor_arr[$rec["editor_type"]] . " : ";
 echo "".$rec["topic_detail"]  ." :  " . $rec["topic_eng"] ;
 echo "<br>".$rec["name"].
 "  ปีที่พิมพ์ ".$rec["book_year"].".   ;เล่มที่  ". $rec["book_num1"]." ฉบับ ".$rec["book_num2"] ." ของวารสาร:".$rec["page_start"] ." - ".$rec["page_end"] ."."
  ?></span></b></p>
  </td>
  <td width=65 valign=top style='width:48.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;
  <?
 $hr = $rec["emp_hr"];
 $t22 += $hr;
 echo number_format($hr,1);
  ?></p>  </td>
 </tr>
  <?
 }}
 ?>
 
 <tr>
  <td width=593 colspan=2 valign=top style='width:444.85pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง งานแต่งตำรา/หนังสือ/สื่อสิ่งพิมพ์</span></b></p>  </td>
  <td width=65 valign=top style='width:48.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  &nbsp;
  <?
  echo number_format($t22,1);
  ?>
  </p>  </td>
 </tr>
</table>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>


<p class=MsoNoSpacing style='margin-left:49.65pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>บรรณาธิการ/กองบรรณาธิการ</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=593 height="50" style='width:40.85pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=539 style='width:404.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>บรรณาธิการ/กองบรรณาธิการ</span></b></p>  </td>
  <td width=65 style='width:48.4pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  (ชม.)</span></b></p>  </td>
 </tr>
 
  <?
$sql = "SELECT     e.task_emp, e.emp_hr, e.emp_research, a.datetime_start, a.datetime_end, b.type, b.editor_type,b.book_year, b.book_num1, b.book_num2, b.page_start, b.page_end,  b.article_type, b.editor_orther, a.topic_detail,a.topic_eng,a.emp_join, b.name, b.journal_level, b.press
FROM         task_action AS a INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref INNER JOIN
                      task_action_book AS b ON a.task_ref = b.task_ref
WHERE     (a.id LIKE '1361') AND (b.editor_type IN ('1','2','3')) AND (b.article_type IN ('1','2')) AND  (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date . " order by editor_type,a.datetime_start";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
?>
 <?
 if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
 ?>


 <tr>
  <td width=593 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">
    <?
  $c++;
  echo $c;
  ?>
  </span></p>  </td>
  <td width=539 valign=top style='width:404.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
 echo $editor_arr[$rec["editor_type"]] . " : ";
 echo "".$rec["topic_detail"]  ." :  " . $rec["topic_eng"] ;
 echo "<br>".$rec["name"].
 "  ปีที่พิมพ์ ".$rec["book_year"].".   ;เล่มที่  ". $rec["book_num1"]." ฉบับ ".$rec["book_num2"] ." ของวารสาร:".$rec["page_start"] ." - ".$rec["page_end"] ."."
  ?></span></b></p>
  </td>
  <td width=65 valign=top style='width:48.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;
  <?
 $hr = $rec["emp_hr"];
 $t24 += $hr;
 echo number_format($hr,1);
  ?></p>  </td>
 </tr>
  <?
 }}
 ?>
 
 <tr>
  <td width=593 colspan=2 valign=top style='width:444.85pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง งานแต่งตำรา/หนังสือ/สื่อสิ่งพิมพ์</span></b></p>  </td>
  <td width=65 valign=top style='width:48.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  &nbsp;
  <?
  echo number_format($t24,1);
  ?>
  </p>  </td>
 </tr>
</table>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:49.65pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานจดสิทธิบัตร/อนุสิทธิบัตร (นวัตกรรม/สิ่งประดิษฐ์)</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=605 valign=top style='width:16.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียดผลงานจดสิทธิบัตร/อนุสิทธิบัตร</span></b></p>  </td>
 </tr>
 <?php
 $sql = "SELECT * FROM task_innovation AS i INNER JOIN task_innovation_emp AS e ON i.task_ref=e.task_ref WHERE (e.empid = '$emp_id') AND  (e.task_confirm = 'Y') AND (i.task_flag is  NULL) AND (e.emp_status !='0')  AND ((i.date_lc <= '$date_end_db "." 23:59"."') AND (i.date_lc >= '$date_start_db"." 00:00"."'))";
 $arr = $objdb->getArray($sql);
 if ($arr > 0)
 {
	 $reno = 1;
	 foreach ($arr AS $rec)
	 {
		 if ($rec["innoname_th"] != "" OR $rec["innoname_th"] != NULL)
		 {
			$task_name = $rec["innoname_th"];
		 }
		 else
		 {
			$task_name = $rec["innoname_eng"];
		 }
 ?>
	 <tr>
		 <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
			 border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
		  <p class=MsoNoSpacing align=center style='text-align:center'><?=$reno;?></p>  </td>
		  <td width=605 valign=top colspan=2 style='width:404.0pt;border-top:none;border-left:
		  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
		  padding:0cm 5.4pt 0cm 5.4pt'>
		  <p class=MsoNoSpacing><?=$task_name?></p>  </td>
	 </tr>
 <?php
		$reno++;
	 }
 }
  ?>
 
</table>

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:49.65pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>การนำเสนอผลงานในที่ประชุมวิชาการ
</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=593 style='width:40.85pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=539 style='width:404.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียดการนำเสนอผลงาน</span></b></p>  </td>
  <td width=65 style='width:48.4pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  (ชม.)</span></b></p>  </td>
 </tr>
 
 <?

/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
//0401-41101-04 			0
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, e.emp_hr, e.emp_research, a.topic_detail,a.meet_name,  a.topic_eng,convert(char(10),a.datetime_start,120) as datetime_start, a.datetime_end,a.task_hr1 
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0401') AND (m.task_main = '41101') AND (m.task_sub = '04') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);

 if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
$c++;

$topic_detail =  $rec["topic_detail"];
$meet_name=  $rec["meet_name"];
 ?>


 <tr>
  <td width=593 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<?=$c?></p>  </td>
  <td width=539 valign=top style='width:404.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
  
  ชื่อผลงานวิจัย</span></b> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>:</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <?=$topic_detail?></span></p>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ชื่อการประชุม</span></b> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>:</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <?=$meet_name?></span></p>
  <!--<p class=MsoNoSpacing> 
  <span lang=TH style='font-size:14.0pt;font-family: "Browallia New","sans-serif"'>ลักษณะการนำเสนอ</span></b> 
  <span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>:</span></b>
  <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  xxxxxxxxxxxxxxxxxxxxxxxxxxxxx <span lang=TH style='background:yellow'>(โปสเตอร์, บรรยาย, อื่นๆ)</span></span></p>
  -->
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>วันที่นำเสนอผลงาน</span></b> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>:</span></b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <?=$rec["datetime_start"]?></span></p>  </td>
  <td width=65 valign=top style='width:48.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;
  <?
 $hr = $rec["task_hr1"];
 $t23 += $hr;
 echo number_format($hr,1);
  ?></p>  </td>
 </tr>
 
  <?
 }}
 ?>
 
 <tr>
  <td width=593 colspan=2 valign=top style='width:444.85pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมงการนำเสนอผลงานในที่ประชุมวิชาการทั้งหมด</span></b></p>  </td>
  <td width=65 valign=top style='width:48.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  &nbsp;
  <?
  echo number_format($t23,1);
  ?>
  </p>  </td>
 </tr>
 <tr>
  <td width=593 colspan=2 valign=top style='width:444.85pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานวิจัยทั้งหมด</span></b></p>  </td>
  <td width=65 valign=top style='width:48.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
    <?
	//$t2 = $t21 + $t22 + $t23;
	$t2 = $t21 + $t22 + $t23+$t24;
  echo number_format($t2,1);
  ?>
  </p>  </td>
 </tr>
</table>



<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>



<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>3.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานบริการทางวิชาการ</span></b></p>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:14.0pt;
font-family:"Browallia New","sans-serif"'>3.1<span lang=TH>&nbsp;
งานบริการทางวิชาการที่ปฏิบัติเป็นประจำ</span></span></p>

<p class=MsoNoSpacing style='margin-left:99.25pt;text-indent:-42.55pt'> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>- งานบริการผู้ป่วยนอก</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470  colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>  </td>
<!--  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
  <?
$t31=0;
$t311=0;
$t312=0;
$t313=0;
$t314=0;
$t315=0;
  
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = 0)) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0301') ". $con_date."
ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr>
  <td width=470  colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></u></p>  
  </td>
  <!--<td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT     m.task_main,  (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name1,(SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2,  m.task_sub,m.task_topic, SUM(a.task_hr1) AS hr 
							FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]')
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY m.task_main" ;*/
$sql = "SELECT     m.task_main,  
(SELECT     task_name   FROM    task_main  WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = 0)) AS tm_name1
,  
(SELECT     task_name   FROM    task_main  WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2
, m.task_sub,m.task_topic, SUM(a.task_hr1) AS hr 
							FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY m.task_main" ;
//echo "<br>sub----". $sql;
 $arr = $objdb->getArray($sql);
if(count($arr)>0){
foreach($arr as $rec){

?>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'><p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  //if($rec["task_main"]!="31101"){
  	echo $rec["tm_name1"] . "/" .$rec["tm_name2"] ;
  /// } else echo $rec["tm_name1"];
  // echo $rec["tm_name1"];
    ?>
  </span></p>  </td>
  
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  
  echo number_format( $rec["hr"],1);
  $t311 += $rec["hr"];
  ?>
  </span></p>  </td>
 </tr>
 <?
 }}
 }}
 ?>
 
 <!--<tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สาขาวิชาฯ</span></u></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>คลินิกเฉพาะทาง
  <span style='background:yellow'>(รหัสทุกอย่างภายใต้ </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0301-31102-01- xxxx</b>)<span lang=TH>&nbsp; ถ้ามีหลายคลินิก
  ให้ขึ้นอีกบรรทัดค่ะ</span></span></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>คลินิก....................</span></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “งานบริการผู้ป่วยนอก” ทั้งหมด</span></b></p>  </td>
 
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <?
  echo number_format($t311,1);
  ?>
  </p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:70.9pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานบริการผู้ป่วยใน</span></b></p>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td  colspan="2"  width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>  </td>
 
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
  <?
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0302') ". $con_date."
ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></u></p>  </td>
  
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name1,(SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = 0)) AS tm_name2,  m.task_sub, SUM(a.task_hr1) AS hr 
							FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ;
//echo "<br>----".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
foreach($arr as $rec){

?>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'><p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
 // if($rec["task_main"]!="32101"){
 // 	echo $rec["tm_name1"] . "/" .$rec["tm_name2"] ;
 //  } else echo $rec["tm_name1"];
 echo $rec["tm_name1"];
    ?>
  </span></p>  </td>
 <!-- <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>  </p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:   none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?
  /* if($rec["task_main"]=="32101"){
  echo number_format( $rec["hr"]*2,1);
   $t312 +=  $rec["hr"]*2;
   }else{ }*/
   echo number_format( $rec["hr"],1);
   $t312 +=  $rec["hr"];
   ?>
	</span></p>  </td>
 </tr>
 <?
 }
 }}
 ?>
  <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">รวมจำนวนชั่วโมง
        “งานบริการผู้ป่วยใน” ทั้งหมด</span></b></p>  </td>
  <!--<td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
   <?
  echo number_format($t312,1);
 
  ?>
  </p>  </td>
 </tr>
</table>
<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ครั้ง</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ส่วนกลาง</span></u></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>อาจารย์อำนวยการหอผู้ป่วย
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(Attending
  Ward)</span></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สาขาวิชาฯ</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>(หากในงานย่อยด้านล่างมี </span><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif";background:yellow'>sub <span
  lang=TH>งานลงไปอีก ไม่ต้องแสดงค่ะให้ใส่จำนวน ชม. รวมเลย)</span></span></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>Attending
  <span lang=TH>หน่วย </span></span></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>Conference</span></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>Grand
  Round</span></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>Service
  round</span></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานดูแลผู้ป่วยรับปรึกษาภาควิชา/</span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ward <span
  lang=TH>พิเศษ</span></span></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “งานบริการผู้ป่วยใน” ทั้งหมด</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>
  </td>
 </tr>
</table>-->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:70.9pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>หัตถการวินิจฉัย
/ หัตถการรักษา</span></b></p>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>  </td>
 <!-- <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span></b></p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
  <?
  /*
  (SELECT   DISTINCT  task_name  FROM   task_main    WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT   DISTINCT  task_name    FROM   task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2
  */
 $sql = "SELECT DISTINCT m.task_main,
 (SELECT  DISTINCT   task_name    FROM     task_main   WHERE   (task_main = m.task_main) AND (task_sub = '0') )  AS  tm
 FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0303') ". $con_date."
ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></u></p>  </td>
<!--  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <?
//$emp_id = $_GET["emp_id"];
//edit paiboon 9-10-15
$sql = "SELECT    m.task_main,  
(SELECT  DISTINCT   task_name  FROM   task_main  WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name1,
(SELECT DISTINCT task_name FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2,  
m.task_sub,m.task_topic, SUM(a.task_hr1) AS hr 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]')  ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY m.task_main" ;
//echo "<br>----".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
foreach($arr as $rec){

?>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'><p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  //if($rec["task_main"]!="32101"){
  	echo $rec["tm_name1"] . "/" .$rec["tm_name2"] ;
  // } else echo $rec["tm_name1"];
    ?>
  </span></p>  </td>
 <!-- <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>  </p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?
  echo number_format( $rec["hr"],1);
  $t313 +=  $rec["hr"];
  ?></span></p>  </td>
 </tr>
 <?
 }
 }}
 ?>
  <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">รวมจำนวนชั่วโมง“หัตถการวินิจฉัย
        / หัตถการรักษา” ทั้งหมด</span></b></p>  </td>
  <!--<td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <?
  echo number_format($t313,1);
  ?></p>  </td>
 </tr>
</table>
<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ครั้ง</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>รายละเอียดที่อยู่ภายใต้รหัส </span><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif";background:yellow'>0303-33102-02-0
  <span lang=TH>ทั้งหมด ให้แยกออกเป็นหัวข้อ</span></span></p>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>หัตถการ............................</span></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง“หัตถการวินิจฉัย
  / หัตถการรักษา” ทั้งหมด</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>
  </td>
 </tr>
</table>-->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:70.9pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>ควบคุมการตรวจทางห้องปฏิบัติการ</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 valign=top colspan="2" style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>  </td>
 <!-- <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
  <?
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0304') ". $con_date."
ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr>
  <td width=470 valign=top colspan="2" style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></u></p>  </td>
  <!--<td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = 0)) AS tm_name1,(SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2,  m.task_sub,m.task_topic, SUM(a.task_hr1) AS hr 
							FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY m.task_main" ;
//echo "<br>----".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
foreach($arr as $rec){

?>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'><p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  //if($rec["task_main"]!="32101"){
  	echo $rec["tm_name1"] . "/" .$rec["tm_name2"] ;
  // } else echo $rec["tm_name1"];
    ?>
  </span></p>  </td>
 <!-- <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>  </p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?
  echo  number_format( $rec["hr"],1);
   $t314 +=  $rec["hr"];
  ?>
  </span></p>  </td>
 </tr>
 <?
 }
 }}
 ?>
  <tr>
  <td width=470 valign=top colspan="2" style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">รวมจำนวนชั่วโมง“ควบคุมการตรวจทางห้องปฏิบัติการ”
        ทั้งหมด</span></b></p>  </td>
 <!-- <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <?
  echo number_format($t314,1);
  ?></p>  </td>
 </tr>
</table>

<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ครั้ง</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ทุกภาระงานที่อยู่ภายใต้รหัส
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0304-34102-0
  <span lang=TH>ทั้งหมด <span style='background:yellow'>(ซึ่งขณะนี้ยังไม่มีภาระงานย่อยหากไม่มี
  ให้เป็นสัญลักษณ์ (-) ได้ไม๊คะ)</span></span></span></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง“ควบคุมการตรวจทางห้องปฏิบัติการ”
  ทั้งหมด</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>
  </td>
 </tr>
</table>-->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:70.9pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานเตรียมและพัฒนาคุณภาพงานบริการทางการแพทย์</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>  </td>
 
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
  <?
 $sql = "SELECT DISTINCT m.task_main,(SELECT     task_name
                            FROM    task_main
                            WHERE     (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0305') ". $con_date."
ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></u></p>  </td>
  
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT     m.task_main, a.task_detail , (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name1,(SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2,  m.task_sub,m.task_topic, SUM(a.task_hr1) AS hr 
							FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY m.task_main" ;*/

$sql = "SELECT     m.task_main, a.task_detail , (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name1,(SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2,  m.task_sub,m.task_topic, task_hr1,task_detail ,convert(char(10),a.datetime_start,120) as datetime_start 
							FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
 ORDER BY m.task_main" ;

//echo "<br>----".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
foreach($arr as $rec){

?>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'><p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  //if($rec["task_main"]!="32101"){
  	//echo $rec["tm_name1"] . "/" .$rec["tm_name2"] ;
	//	echo  $rec["tm_name2"] ;
	echo " " .  $rec["task_detail"] ;
	echo " (". $rec["datetime_start"] .")";
  // } else echo $rec["tm_name1"];
    ?>
  </span></p>  </td>
  
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format( $rec["task_hr1"],1);
  $t315 +=  $rec["task_hr1"];
  ?></span></p>  </td>
 </tr>
 <?
 }
 }}
 ?>
  <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">รวมจำนวนชั่วโมง“งานเตรียมและพัฒนาคุณภาพงานบริการทางการแพทย์”
        ทั้งหมด</span></b></p>  </td>
  
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <?
  echo number_format($t315,1);
  ?></p>  </td>
 </tr>
 
   <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">รวมงานบริการทางการแพทย์ทั้งหมด
       </span></b></p>  </td>
  
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> 
 <?
 	$t31 = $t311+$t312+$t313+$t314+$t315;
   	echo number_format($t31,1);
  ?>
  </p>  </td>
 </tr>
 
</table>

<!--<table width="706" border=1 cellpadding=0 cellspacing=0 class=MsoTableGrid
 style='border-collapse:collapse;border:none'>
 <tr>
  <!--<td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงาน</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ครั้ง</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ส่วนกลาง</span></u></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>administrative
  round</span></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สาขาวิชาฯ</span></u></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ทุกภาระงานที่อยู่ภายใต้รหัส
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0305-35102-0
  <span lang=TH>ทั้งหมด <span style='background:yellow'>(ซึ่งขณะนี้ยังไม่มีภาระงานย่อยหากไม่มี
  ให้เป็นสัญลักษณ์ (-) ได้ไม๊คะ)</span></span></span></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง“งานเตรียมและพัฒนาคุณภาพงานบริการ”
  ทั้งหมด</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>
  </td>
 </tr>
 <tr>
  <td  valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานบริการทางการแพทย์ทั้งหมด</span></b></p>  </td>
  <td width=104 colspan=2 valign=top style='width:77.95pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <?
   	echo number_format(($t311+$t312+$t313),1);
  ?>
  </p>  
  </td>
 </tr>
</table>-->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:54.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>3.2<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span><span
lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานบริการทางวิชาการที่ปฏิบัติเป็นครั้งคราว</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานวิชาการ</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานประชุมวิชาการ</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>วิทยากรบรรยาย</span></u></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 <?
 $t321_1 = 0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
//0401-41101-01
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub,e.emp_hr, e.emp_research, a.topic_detail,a.meet_name,a.place,a.task_hr1,a.task_travel,convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE a.task_flag is null and e.emp_status !='0' AND     (m.task_id LIKE '0401') AND (m.task_main = '41101') AND (m.task_sub = '01') AND (e.task_emp = '$emp_id') ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);AND  (e.task_confirm = 'Y') 
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>

 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
		  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
		  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<?=$c;?></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
  เรื่อง :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;ใน<?=$rec["meet_name"]?>
&nbsp;&nbsp; ณ &nbsp;
    <?=$rec["place"];
	  
	  echo  "  ( " . $rec["datetime_start"] . ")";
	  
	  ?>
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<span class="MsoNoSpacing" style="text-align:center">
    <?
	$hr1="";
	$route = $rec["task_travel"];
	$hr = $rec["task_hr1"];
	//echo $route;
	if($route=="2"){
			if($hr<=3){
			$hr1= "3";
			}else{
			$hr1= "7";
			}
	}else if($route=="3"){
	 $hr1= "7";
	}else{
	 $hr1= $hr;
	 }
	 echo number_format($hr1,1);
	$t321_1 += $hr1;
	?>
  </span></p>  </td>
 </tr>
 
 <?
 }}
 ?>
 
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “วิทยากรบรรยาย” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t321_1,1);
  ?>
  </span></b></p>  </td>
 </tr>
 
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ผู้ดำเนินการอภิปราย/ผู้ร่วมอภิปราย</span></u></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
 <?
$t321_2 = 0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub, e.emp_hr, e.emp_research, a.topic_detail,a.meet_name,a.place,a.task_hr1, convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE a.task_flag is null and e.emp_status !='0' AND     (m.task_id LIKE '0401') AND (m.task_main = '41101') AND (m.task_sub = '02') AND (e.task_emp = '$emp_id')   ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
		  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
		  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<?=$c;?></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  					padding:0cm 5.4pt 0cm 5.4pt'>
	 <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
  เรื่อง :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;ใน
<?=$rec["meet_name"]?>
&nbsp;&nbsp; ณ &nbsp;
<?=$rec["place"];
	  
	  echo  "  ( " . $rec["datetime_start"] . ")";
	  
	  ?>
  </span></p>
	  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;
 <?
	$hr1="";
	$route = $rec["task_travel"];
	$hr = $rec["task_hr1"];
	//echo $route;
	if($route=="2"){
			if($hr<=3){
			$hr1= "3";
			}else{
			$hr1= "6";
			}
	}else if($route=="3"){
	 $hr1= "6";
	}else{
	 $hr1= $hr;
	 }
	 echo number_format($hr1,1);
	$t321_2  += $hr1;
	?>
  </p>  </td>
 </tr>
 
 <?
 }}
 ?>
 
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “ผู้ดำเนินการอภิปราย/ผู้ร่วมอภิปราย” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t321_2 ,1);
  ?>
  </span></b></p>  </td>
 </tr>



 <!-- ประธาน/ประธานร่วม -->

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ประธาน/ประธานร่วม</span></u></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
 <?
$t321_4 = 0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub, e.emp_hr, e.emp_research, a.topic_detail,a.meet_name,a.place,a.task_hr1, convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE a.task_flag is null and e.emp_status !='0' AND     (m.task_id LIKE '0401') AND (m.task_main = '41101') AND (m.task_sub = '05') AND (e.task_emp = '$emp_id')   ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
		  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
		  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<?=$c;?></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  					padding:0cm 5.4pt 0cm 5.4pt'>
	 <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
  เรื่อง :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;ใน
<?=$rec["meet_name"]?>
&nbsp;&nbsp; ณ &nbsp;
<?=$rec["place"];
	  
	  echo  "  ( " . $rec["datetime_start"] . ")";
	  
	  ?>
  </span></p>
	  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;
 <?
	$hr1="";
	$route = $rec["task_travel"];
	$hr = $rec["task_hr1"];
	//echo $route;
	if($route=="2"){
			if($hr<=3){
			$hr1= "3";
			}else{
			$hr1= "6";
			}
	}else if($route=="3"){
	 $hr1= "6";
	}else{
	 $hr1= $hr;
	 }
	 echo number_format($hr1,1);
	$t321_4  += $hr1;
	?>
  </p>  </td>
 </tr>
 
 <?
 }}
 ?>
 
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “ประธาน/ประธานร่วม” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t321_4 ,1);
  ?>
  </span></b></p>  </td>
 </tr>

  <!-- รองประธาน -->

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รองประธาน</span></u></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
 <?
$t321_5 = 0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub, e.emp_hr, e.emp_research, a.topic_detail,a.meet_name,a.place,a.task_hr1, convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE a.task_flag is null and e.emp_status !='0' AND     (m.task_id LIKE '0401') AND (m.task_main = '41101') AND (m.task_sub = '06') AND (e.task_emp = '$emp_id')   ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
		  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
		  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<?=$c;?></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  					padding:0cm 5.4pt 0cm 5.4pt'>
	 <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
  เรื่อง :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;ใน
<?=$rec["meet_name"]?>
&nbsp;&nbsp; ณ &nbsp;
<?=$rec["place"];
	  
	  echo  "  ( " . $rec["datetime_start"] . ")";
	  
	  ?>
  </span></p>
	  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;
 <?
	$hr1="";
	$route = $rec["task_travel"];
	$hr = $rec["task_hr1"];
	//echo $route;
	if($route=="2"){
			if($hr<=3){
			$hr1= "3";
			}else{
			$hr1= "6";
			}
	}else if($route=="3"){
	 $hr1= "6";
	}else{
	 $hr1= $hr;
	 }
	 echo number_format($hr1,1);
	$t321_5  += $hr1;
	?>
  </p>  </td>
 </tr>
 
 <?
 }}
 ?>
 
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “ประธาน/ประธานร่วม” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t321_5 ,1);
  ?>
  </span></b></p>  </td>
 </tr>


 <!-- ที่ปรึกษา -->

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ที่ปรึกษา</span></u></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
 <?
$t321_6 = 0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub, e.emp_hr, e.emp_research, a.topic_detail,a.meet_name,a.place,a.task_hr1, convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE a.task_flag is null and e.emp_status !='0' AND     (m.task_id LIKE '0401') AND (m.task_main = '41101') AND (m.task_sub = '07') AND (e.task_emp = '$emp_id')   ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
		  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
		  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<?=$c;?></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  					padding:0cm 5.4pt 0cm 5.4pt'>
	 <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
  เรื่อง :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;ใน
<?=$rec["meet_name"]?>
&nbsp;&nbsp; ณ &nbsp;
<?=$rec["place"];
	  
	  echo  "  ( " . $rec["datetime_start"] . ")";
	  
	  ?>
  </span></p>
	  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;
 <?
	$hr1="";
	$route = $rec["task_travel"];
	$hr = $rec["task_hr1"];
	//echo $route;
	if($route=="2"){
			if($hr<=3){
			$hr1= "3";
			}else{
			$hr1= "6";
			}
	}else if($route=="3"){
	 $hr1= "6";
	}else{
	 $hr1= $hr;
	 }
	 echo number_format($hr1,1);
	$t321_6  += $hr1;
	?>
  </p>  </td>
 </tr>
 
 <?
 }}
 ?>
 
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “ที่ปรึกษา” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t321_6 ,1);
  ?>
  </span></b></p>  </td>
 </tr>
 
 
 
 <!--
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ผู้ดำเนินการอภิปราย/ผู้ร่วมอภิปราย</span></u><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>(รายละเอียดที่อยู่ภายใต้ </span><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif";background:yellow'>0401-41101- <u>02</u></b>)
  <span lang=TH>ทั้งหมด</span></span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>เรื่อง</span></b><span lang=TH  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>....................................&nbsp;
   ใน</b>..........ชื่องาน...........  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ. ที่ไปพูด)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>
 </tr>-->
<!-- <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “ผู้ดำเนินการอภิปราย/ผู้ร่วมอภิปราย” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></b></p>  </td>
 </tr>-->
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family: 
  "Browallia New","sans-serif"'>กรรมการดำเนินการ</span></u><span lang=TH   style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'><!--(รายละเอียดที่อยู่ภายใต้ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>0401-41101- <u>03</u></b>)
  <span lang=TH>ทั้งหมด--></span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
 
 <?
$t321_3 = 0; 
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, m.task_sub,e.emp_hr, e.emp_research, a.topic_detail, a.task_detail,a.meet_name,a.place, a.task_hr1, convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE a.task_flag is null and e.emp_status !='0' AND     (m.task_id LIKE '0401') AND (m.task_main = '41101') AND (m.task_sub = '03') AND (e.task_emp = '$emp_id')  ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>

<!--<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ผู้ดำเนินการอภิปราย/ผู้ร่วมอภิปราย</span></u></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>-->
 
 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
		  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<?=$c;?></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left: none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  					padding:0cm 5.4pt 0cm 5.4pt'>
	 <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?=$rec["topic_detail"]?>
<?=$rec["meet_name"]?>
&nbsp;&nbsp; ณ &nbsp;
<?=$rec["place"];
	  
	  echo  "  ( " . $rec["datetime_start"] . ")";
	  
	  ?>
  </span></p>
	  </td>

  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;<? //=$rec["task_hr1"]?>
   <?
	$hr1="";
	$route = $rec["task_travel"];
	$hr = $rec["task_hr1"];
	//echo $route;
	if($route=="2"){
			if($hr<=3){
			$hr1= "3";
			}else{
			$hr1= "6";
			}
	}else if($route=="3"){
	 $hr1= "6";
	}else{
	 $hr1= $hr;
	 }
	 echo number_format($hr1,1);
	$t321_3 += $hr1;
	?>
  </p>  </td>
 </tr>
 
 <?
 }}
 ?>
 
 
 <tr>
  <!--<td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานการประชุม...............................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span></p>  </td>-->
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “กรรมการดำเนินการ” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
 <?
 echo  number_format($t321_3,1);
 ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  
  รวมจำนวน
  “งานประชุมวิชาการ” ทั้งหมด
  </span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $t321 += $t321_1+$t321_2+$t321_3+$t321_4+$t321_5+$t321_6;
 echo  number_format(($t321_1+$t321_2+$t321_3+$t321_4+$t321_5+$t321_6),1);
 ?>
  </span></b></p>  </td>
 </tr>
 <!--
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <!--<td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>-->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานกรรมการองค์กร/สมาคมวิชาชีพ</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานประชุมต่างๆ</span></u><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'><!--(รายละเอียดที่อยู่ภายใต้ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>0401-41102- <u>02</u></b>)
  <span lang=TH>ทั้งหมด</span>--></span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
 
 
 <?
$t321_21=0;
$t321_211=0;
$t321_212=0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, m.task_sub,e.emp_hr, e.emp_research, a.topic_detail, a.task_detail,a.meet_name,a.place, a.task_hr1, convert(char(10),a.datetime_start,120) as date_start, a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0401') and a.task_flag is null and e.emp_status !='0' AND (m.task_main = '41102') AND (m.task_sub = '02') AND (e.task_emp = '$emp_id')  ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
//ส่วนที่แก้ไขเพิ่มมาคือ and a.task_flag is null and e.emp_status !='0' วันที่ 6/10/2558
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  <?=$c;?>  </span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?=$rec["meet_name"]?>&nbsp;&nbsp; ณ&nbsp;<?=$rec["place"]?> &nbsp;(<?=$rec["date_start"]?>) 
  <!--รายละเอียดการประชุม</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปประชุม)-->
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?
  echo number_format($rec["task_hr1"],1);
  $t321_211 += $rec["task_hr1"];
  ?></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> </span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
  <!--รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ประชุมคณะกรรมการบริหารสมาคมโลหิตวิทยาแห่งประเทศไทย
  ครั้งที่ 1/2557&nbsp; ณ ห้องเครือฟ้า ตึกสมาคมโลหิตวิทยา (16/07/57)-->
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “งานประชุมต่างๆ” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  
  <?
  echo number_format($t321_211,1);
  ?>
      </span></b></p>  </td>
 </tr>
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานดำรงตำแหน่ง</span></u><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'><!--(รายละเอียดที่อยู่ที่ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>InfoMed Version
  1.0<span lang=TH>เฉพาะประเภท “กรรมการในสมาคมวิชาชีพ</span>)--></span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = " SELECT   p.id, p.groupname, p.[level], p.unit, p.type, p.expire, p.userin, p.datein, p.status, d.id AS Expr1, d.empid, d.position, d.datestart, d.datestop, d.sumhour, d.status AS Expr2
FROM         View_tbmanageposition AS p INNER JOIN
                      View_tbmanagedetail AS d ON p.id = d.id
WHERE     (p.expire <> 'Y') AND (d.datestop >= '$date_start_db' OR  d.datestop IS NULL) AND (d.empid = '$emp_id')  AND (p.[level] = '5') order by d.datestart asc ";*/
$sql = " SELECT   p.id, p.groupname, p.managelevel, p.manageunit, p.managetype, d.id AS Expr1, d.id, d.managepositiontype, d.datestart, d.dateend, d.sumhour, d.status AS Expr2
FROM         hrmedicine_db.dbo.mtmanageposition AS p 
INNER JOIN hrmedicine_db.dbo.tbmanagedetail AS d ON p.id = d.manageid
WHERE     (d.expire <> '1') AND (d.dateend >= '$date_start_db' OR  d.dateend = '1900-01-01') AND (d.id = '$emp_id')  AND (p.managelevel = '5')  order by d.datestart asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =  $rec["tm_name2"];
$c++;
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  
  <?
  echo $rec["groupname"] . "   ตำแหน่ง  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
   if($rec["dateend"]=="1900-01-01") 
  {
   echo " ปัจจุบัน )";
   $mm = $month;
  }else{
  echo $rec["dateend"]. " ) ";
  $date_diff=strtotime($rec["dateend"])-strtotime($date_start_db);
  $mm = floor(($date_diff)/2628000);
  $mm = $mm+1;
 }
 ?>
  
  </span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>  
  <?
  if($rec["sumhour"]!=0){
  echo  number_format($rec["sumhour"]*$mm,1);
  $t321_212 += $rec["sumhour"]*$mm;
  }else echo "-";
  ?>
  
  </span></p>  </td>
 </tr>
 <?
 }}
 ?>
 
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><!--1.--></span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><!--ชื่อคณะกรรมการ&nbsp;
   ตำแหน่ง</b>&nbsp; (วาระที่ดำรงตำแหน่ง)</span></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>คณะกรรมการบริหารสมาคมโลหิตวิทยาแห่งประเทศไทย
  ตำแหน่ง อุปนายกสมาคม (01/01/2550-ปัจจุบัน)</span>--></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><!--xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>(จำนวน ชม. / เดือน จาก </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>InfoMed V. 1)--></span></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “</span></b> <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>’<span
  lang=TH>งานดำรงตำแหน่ง” ทั้งหมด</span></span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t321_212,1);
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวน
  “งานกรรมการองค์กร/สมาคมวิชาชีพ” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
   $t321 += $t321_211+$t321_212;
  echo number_format(($t321_211+$t321_212),1);
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>อาจารย์พิเศษ (นอกมหาวิทยาลัย)</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 <?
$t321_31  = 0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/

$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, m.task_sub,e.emp_hr, e.emp_research, a.task_detail,a.topic_detail,a.meet_name,a.place,a.task_travel, a.task_hr1, convert(char,a.datetime_start,120) as date_start, a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0401')  AND    (m.task_main LIKE '41103')  AND (e.task_emp = '$emp_id')  ".$con_date ." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  <?=$c;?>  </span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
    <?=$rec["topic_detail"]?>&nbsp;ณ&nbsp;
	<?=$rec["place"]?>&nbsp;(<?=$rec["date_start"]?>) </span>
  <!--รายละเอียดการประชุม</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปประชุม)-->
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $hr1="";
	$route = $rec["task_travel"];
	$hr = $rec["task_hr1"];
	//echo $route;
	if($route=="2"){
			if($hr<=3){
			$hr1= "3";
			}else{
			$hr1= "6";
			}
	}else if($route=="3"){
	 $hr1= "6";
	}else{
	 $hr1= $hr;
	 }
	 echo number_format($hr1,1);
	$t321_31 += $hr1;

  //echo  number_format($rec["task_hr1"],1);
  //$t321_31 += $rec["task_hr1"];
  ?></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 
 <tr>
  <!--<td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รายละเอียดที่ไปปฏิบัติ</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สอนรายวิชาโภชนบำบัด
  1&nbsp; แก่นักศึกษาแพทย์คณะสหเวชศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย&nbsp; ณ
  ห้องเรียน 1408&nbsp; ชั้น 14&nbsp; คณะสหเวชศาสตร์ จุฬาลงกรณ์มหาวิทยาลัย (08/05/57)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>-->
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “อาจารย์พิเศษ (นอกมหาวิทยาลัย)” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $t321 += $t321_31;
  echo number_format($t321_31 ,1);
  ?></span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวน
  “งานวิชาการ” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>
 <?
 echo number_format($t321,1);
 ?>
  </span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>การเผยแพร่ความรู้</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
  
 <?
 $t322 = 0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, m.task_sub,e.emp_hr, e.emp_research, a.task_detail,a.topic_detail,a.meet_name,a.place, a.task_hr1, convert(varchar(10),a.datetime_start,120) as datetime_start , convert(varchar(10),a.datetime_end,120) AS datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0402')  AND (e.task_emp = '$emp_id')  ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr); 
$c=0;$sum_hr = 0;
if(count($arr)>0){

foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  <?=$c;?>  </span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
    <?=$rec["topic_detail"]?>
	&nbsp;
    <? echo $rec["meet_name"];
	//if($rec["task_detail"]!="") echo 
	?>
	&nbsp;ณ &nbsp;
    <?=$rec["place"]?> 
	&nbsp;(<?=$rec["datetime_start"]?> - <?=$rec["datetime_end"]?>)
	</span>
  <!--รายละเอียดการประชุม</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปประชุม)-->
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo  number_format($rec["task_hr1"],1);
  $t322 += $rec["task_hr1"];
  ?></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 
 <?
$sql = "SELECT     e.task_emp, e.emp_hr, e.emp_research, a.datetime_start, a.datetime_end, b.type, b.editor_type,b.book_year, b.book_num1, b.book_num2, b.page_start, b.page_end,  b.article_type, b.editor_orther, a.topic_detail,a.topic_eng,a.emp_join, b.name, b.journal_level, b.press
FROM         task_action AS a INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref INNER JOIN
                      task_action_book AS b ON a.task_ref = b.task_ref
WHERE     (a.id LIKE '1361') AND (b.editor_type IN ('4','5','6')) AND  (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') ".$con_date . " order by editor_type,a.datetime_start";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
//$c=0;
?>
 <?
 if(count($arr)>0){
 //$c=0;$sum_hr = 0;
foreach($arr as $rec){
$c++;
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
 ?>


 <tr>
  <td width=593 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">
    <?
  //$c++;
  echo $c;
  ?>
  </span></p>  </td>
  <td width=539 valign=top style='width:404.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
 echo $editor_arr[$rec["editor_type"]] . " : ";
 echo "".$rec["topic_detail"]  ." :  " . $rec["topic_eng"] ;
 echo "<br>".$rec["name"].
 "  ปีที่พิมพ์ ".$rec["book_year"].".   ;เล่มที่  ". $rec["book_num1"]." ฉบับ ".$rec["book_num2"] ." ของวารสาร:".$rec["page_start"] ." - ".$rec["page_end"] ."."
  ?></span></b></p>
  </td>
   <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
 $hr = $rec["emp_hr"];
 $t322 += $hr;
 echo number_format($hr,1);
  ?></span></p>  </td>
 </tr>
  <?
 }}
 ?>

 <tr>
  <!--<td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียดที่ปฏิบัติ&nbsp;
  ณ ...............สถานที่........................ (วัน/เดือน/ปี ที่ทำ)</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>((ในหัวข้อนี้จะแบ่งเป็นเว็บไซต์, โทรทัศน์, วิทยุ,
  หนังสือพิมพ์ แต่อ้อมไม่แยกเป็นหัวข้อย่อย ให้รวมกันไปเลย))</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>บันทึกเทปรายการ
  “พบหมอศิริราช”&nbsp; หัวข้อ การทานอาหารในหน้าร้อน&nbsp; ณ ห้องบันทึกเทป
  สภาอาจารย์ศิริราช รพ.ศิริราช (01/08/57)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>-->
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “การเผยแพร่ความรู้” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t322,1);
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span lang=TH
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><br>
</span><span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-
 บริการด้านการตรวจสอบ/วินิจฉัย/ประเมิน/ตรวจรับรองคุณภาพ</b></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 
 <?
$t323 = 0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, m.task_sub,e.emp_hr, e.emp_research, a.task_detail,a.topic_detail,a.meet_name,a.place, a.task_hr1, convert(varchar(10),a.datetime_start,120) as datetime_start, a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0403')  AND (e.task_emp = '$emp_id')  ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  <?=$c;?>  </span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
    <?=$rec["topic_detail"]?>

    <?=$rec["task_detail"]?>
&nbsp;&nbsp;ณ 
    <?=$rec["place"]?>
	&nbsp;(<?=$rec["datetime_start"]?>)
	 </span>
  <!--รายละเอียดการประชุม</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปประชุม)-->
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?
  echo  number_format($rec["task_hr1"],1);
  $t323 += $rec["task_hr1"];
  ?></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 <tr>
  <!--<td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียดที่ปฏิบัติ&nbsp;
  ณ ...............สถานที่........................ (วัน/เดือน/ปี ที่ทำ)</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>((ในหัวข้อนี้จะแบ่งย่อยลงไปอีก แต่อ้อมไม่แยกเป็นหัวข้อย่อย
  ให้รวมกันไปเลย))</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ตรวจประเมินคุณภาพการศึกษา
  คณะแพทยศาสตร์ มหาวิทยาลัยธรรมศาสตร์&nbsp; ณ คณะแพทยศาสตร์
  มหาวิทยาลัยธรรมศาสตร์ (02/05/57)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>-->
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “บริการด้านการตรวจสอบ/วินิจฉัย/ประเมิน/ตรวจรับรองคุณภาพ” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?
  echo number_format($t323,1);
  ?></span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>บริการศึกษา/วิจัย</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 
 <?
$t324=0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, m.task_sub,e.emp_hr, e.emp_research, a.task_detail,a.topic_detail,a.meet_name,a.place, a.task_hr1
,CONVERT(varchar(10),a.datetime_start,120) AS datetime_start ,CONVERT(varchar(10),a.datetime_end,120) AS datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0404') AND (m.task_main <> '41108')  AND (e.task_emp = '$emp_id')  ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
 $t324 = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  <?=$c;?>  </span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
	<?php
	echo $rec["task_detail"];
   ?>
&nbsp;&nbsp;ณ&nbsp;
    <?=$rec["place"]?> (<?=$rec["datetime_start"]?>) </span>
  <!--รายละเอียดการประชุม</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปประชุม)-->
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo  number_format($rec["task_hr1"],1);
  $t324+= $rec["task_hr1"];
  ?></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 
 
 <tr>
  <!--<td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงานทุกอย่างที่อยู่ภายใต้
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0404-0-0&nbsp;
  <span lang=TH style='background:yellow'>((ในหัวข้อนี้จะแบ่งย่อยลงไปอีก แต่อ้อมไม่แยกเป็นหัวข้อย่อย
  ให้รวมกันไปเลย))</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียดที่ปฏิบัติ
  &nbsp;ณ ...............สถานที่........................ (วัน/เดือน/ปี ที่ทำ)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>เข้าร่วมตัดสินผลการประกวดผลงานวิจัยของแพทย์ประจำบ้าน&nbsp;
  ณ ห้องประชุมประเสริฐ กังสดาลย์ 4&nbsp; ตึกธนาคารไทยพาณิชย์ ชั้น 2 (28/07/57)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>-->
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>โครงการวิจัยรับทำให้ธุรกิจภายนอก (บริษัทยา)</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
<?
/* $sql = "SELECT  DISTINCT e.task_emp, m.id, m.task_id, m.task_main, e.emp_hr, e.emp_research, a.topic_detail, a.topic_eng, a.datetime_start, a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0501') AND (m.task_main = '0') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') " . $con_date;*/
$sql = "SELECT  DISTINCT e.task_emp, m.task_id, m.task_main, e.emp_hr, e.emp_research, a.topic_detail, a.topic_eng, a.datetime_start, a.datetime_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0501') AND a.project_type='3' AND  (m.task_main = '0') AND (e.task_emp = '$emp_id') AND  (e.task_confirm = 'Y') " . $con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);

?>
 <?
 if(count($arr)>0){
 $t21=0;
 $c=0;$sum_hr = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
$c++;

$topic_detail =  $rec["topic_detail"];
$topic_eng=  $rec["topic_eng"];
 ?>
 <tr>
  <td width=541 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span>  </p>  </td>
  <td width=493 valign=top style='width:370.1pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  โครงการวิจัย : <?=$topic_detail?> &nbsp;&nbsp;/ <?=$topic_eng?>
  <br />
  <?
  $arr_research = Array("","หัวหน้าโครงการ","ผู้ร่วมวิจัย","ที่ปรึกษา");
  ?>
  บทบาท : <?=$arr_research[$rec["emp_research"]]?>
  </span>  </p>  </td>
  <td width=85 valign=top style='width:63.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
   $t325+= $rec["emp_hr"]*$month;
  $rs_hr = $rec["emp_hr"]*$month;
 //$sum_hr = $sum_hr + $rs_hr;
 //$t21 +=  $rs_hr;
 
 echo number_format($rs_hr,1);
 
  ?>
  </span>  </p>  </td>
 </tr>
 <?
 }}
 ?>
 
 <tr>
  <!--<td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>และมันจะมีหัวข้อที่ไปฝากไว้ที่ “งานวิจัย”
  อยู่อันนึงคือ <span style='background:yellow'>“โครงการรับทำให้ธุรกิจภายนอก
  (บริษัทยา)”</span> ให้นำมาใส่ไว้ที่นี่</span></u></b></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูลกรณีโครงการวิจัยรับทำให้ธุรกิจภายนอก
  (บริษัทยา)</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>........................ชื่อโครงการวิจัย............................................</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>-->
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “บริการศึกษา/วิจัย” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $t324 = $t324 + $t325;
  echo number_format($t324,1);
  ?>
  </span></b></p>  </td>
 </tr>
<!-- <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานบริการวิชาการทั้งมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  //echo number_format($t322+$t322+$t324,1);
  ?>
  </span></b></p>  </td>
 </tr>-->
 
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>
<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานเตรียมและพัฒนางานบริการวิชาการ</span></b></p>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 
 <?
//$t324=0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, m.task_sub,e.emp_hr, e.emp_research, a.task_detail,a.topic_detail,a.meet_name,a.place, a.task_hr1, convert(varchar(10),a.datetime_start,120) as date_start, convert(varchar(10),a.datetime_end,120) as date_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0405')  AND (e.task_emp = '$emp_id')  ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
 $t326 = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  <?=$c;?>  </span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
    <?=$rec["task_detail"]?>
&nbsp;&nbsp;ณ&nbsp;
    <?=$rec["place"]?> &nbsp;
	 (<?=$rec["date_start"] ;?>)
	  <!--(<?=$rec["date_start"] . ' - ' .$rec["date_end"]?>)-->
	  </span>
  <!--รายละเอียดการประชุม</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปประชุม)-->
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo  number_format($rec["task_hr1"],1);
  $t326+= $rec["task_hr1"];
  ?></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 
 
 <tr>
  <!--<td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงานทุกอย่างที่อยู่ภายใต้
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0404-0-0&nbsp;
  <span lang=TH style='background:yellow'>((ในหัวข้อนี้จะแบ่งย่อยลงไปอีก แต่อ้อมไม่แยกเป็นหัวข้อย่อย
  ให้รวมกันไปเลย))</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียดที่ปฏิบัติ
  &nbsp;ณ ...............สถานที่........................ (วัน/เดือน/ปี ที่ทำ)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>เข้าร่วมตัดสินผลการประกวดผลงานวิจัยของแพทย์ประจำบ้าน&nbsp;
  ณ ห้องประชุมประเสริฐ กังสดาลย์ 4&nbsp; ตึกธนาคารไทยพาณิชย์ ชั้น 2 (28/07/57)</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>-->
 </tr>
 
 
 <tr>
  <!--<td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>และมันจะมีหัวข้อที่ไปฝากไว้ที่ “งานวิจัย”
  อยู่อันนึงคือ <span style='background:yellow'>“โครงการรับทำให้ธุรกิจภายนอก
  (บริษัทยา)”</span> ให้นำมาใส่ไว้ที่นี่</span></u></b></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูลกรณีโครงการวิจัยรับทำให้ธุรกิจภายนอก
  (บริษัทยา)</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>........................ชื่อโครงการวิจัย............................................</span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>  </td>-->
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง
  “เตรียมและพัฒนางานบริการวิชาการ” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t326,1);
  ?>
  </span></b></p>  </td>
 </tr>
 </table>
<!-- <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานบริการวิชาการทั้งมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  //echo number_format($t322+$t322+$t324,1);
  ?>
  </span></b></p>  </td>
 </tr>-->
 <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>
<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานภารกิจพิเศษ </span></b></p>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 
 <?
//$t324=0;
/*$sql = "SELECT  e.task_emp,m.task_main,e.emp_hr,a.topic_detail 
FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE ((m.task_id LIKE '0501')   AND ( e.task_confirm = 'Y'))   
AND  (((a.datetime_start BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db'))  or  (a.datetime_end BETWEEN '$date_start_db' AND DATEADD(dd, 1, '$date_end_db')))) " ;*/
$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main, m.task_sub,e.emp_hr, e.emp_research, a.task_detail,a.topic_detail,a.meet_name,a.place, a.task_hr1, convert(varchar(10),a.datetime_start,120) as date_start, convert(varchar(10),a.datetime_end,120) as date_end
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (m.task_id LIKE '0406')  AND (e.task_emp = '$emp_id')  ".$con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
 $c=0;$sum_hr = 0;
 $t327 = 0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$topic_detail =  $rec["topic_detail"];
$c++;
?>
 
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  <?=$c;?>  </span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>
    <?=$rec["task_detail"]?>
&nbsp;&nbsp;ณ&nbsp;
    <?=$rec["place"]?> &nbsp;
	 (<?=$rec["date_start"] ;?>)
	  <!--(<?=$rec["date_start"] . ' - ' .$rec["date_end"]?>)-->
	  </span>
  <!--รายละเอียดการประชุม</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   ณ</b> ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปประชุม)-->
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo  number_format($rec["task_hr1"],1);
  $t327+= $rec["task_hr1"];
  ?></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมง “งานภารกิจพิเศษ” ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t327,1);
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานบริการทางวิชาการทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format(($t321+$t322+$t323+$t324+$t326+$t327),1);
  $t32 = ($t321+$t322+$t323+$t324+$t326+$t327);
  ?>
  </span></b></p>  </td>
 </tr>
</table>
  <!--
<p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
"Browallia New","sans-serif";background:yellow'>คำอธิบายเพิ่มเติมการคิดเวลาเดินทาง
“ภาระงานงานบริการวิชาการ”</span></u></p>

<p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='background:yellow'>กรณีเลือกการเดินทางเป็น</span></span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>ภายในโรงพยาบาลศิริราช&nbsp; </span><span style='font-size:
14.0pt;font-family:"Browallia New","sans-serif";background:yellow'>: <span
lang=TH>ไม่คิดเวลาเดินทาง ปฏิบัติเท่าไรให้เท่านั้น</span></span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>กรุงเทพมหานครและปริมณฑล</span></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>ปฏิบัติงานตามจริง แต่ไม่เกิน 3 ชม.&nbsp; คิดเดินทางสูงสุดแค่
3 ชม. เช่น ปฏิบัติ 30 นาที คิดเป็น 3 ชม.</span></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>ปฏิบัติมากกว่า 3 ชม.&nbsp; คิดเดินทางไม่เกิน 6 ชม.</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>ต่างจังหวัด</span></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>ไม่ว่าจะปฏิบัติเท่าไหร่ในวันนั้นๆ คิดเดินทางไม่เกิน 6
ชม.&nbsp; เช่น บรรยายที่เชียงใหม่ 2 ชม. คิดเป็น 6 ชม.</span></p>--></p>
<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>4.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานกิจกรรมนักศึกษา</span></b></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>ระดับสาขาวิชาฯ</span></b></p>




<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 
  <?
  $t41 = 0;
  $t42 = 0;
  $t43 = 0;
  
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0602') ". $con_date."
ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
  <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  
(SELECT     task_name  FROM   task_main   WHERE (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = 0)) AS tm_name1,
(SELECT     task_name   FROM   task_main  WHERE (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = 0)) AS tm_name2,
m.task_sub,m.task_topic, a.task_detail, a.place,convert(char(10),a.datetime_start,120) as date_start,m.task_topic,a.task_hr1 AS hr 
	FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref  
WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]')  ". $con_date." ORDER BY a.datetime_start" ;
//GROUP BY m.task_main, m.task_sub,m.task_topic 

//echo "<br>".$sql;
 $arr = $objdb->getArray($sql);
if(count($arr)>0){
$c=0;
foreach($arr as $rec){
$c++;
?>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?=$rec["tm_name1"]."<br>"?>
   <?=$rec["task_detail"] . "  ณ " . $rec["place"]  . " (" . $rec["date_start"].")"?>
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">
    <?
	echo number_format($rec["hr"]);
	$t41 += $rec["hr"];
	?>
  </span></p>  </td>
 </tr>
 <?
 }
 }}}
 ?>
 
 <!--
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <!--<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>หลังปริญญา</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”.................&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมงงานกิจกรรมนักศึกษา
  ระดับสาขาวิชาฯ ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t41,1);
  ?>
  </span></b></p>  </td>
 </tr>
</table>



<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
color:red'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>ระดับภาควิชาฯ
(ส่วนกลาง)</span></b></p>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 
  <?
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0601') ". $con_date."
ORDER BY m.task_main ";
//echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
  <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     m.task_main,  (SELECT     task_name
         FROM          task_main
         WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name1,(SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2,  m.task_sub,m.task_topic, 
							 SUM(a.task_hr1) AS hr 
					FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                     task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic " ;
//echo "<br>".$sql;
$arr = $objdb->getArray($sql);
if (count($arr)>0){
$c=0;
foreach($arr as $rec){
$c++;
?>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$rec["tm_name1"]."<br>".$rec["task_detail"]?></span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">
    <?
	echo  number_format($rec["hr"],1);
	$t42 += $rec["hr"];
	?>
  </span></p>  </td>
 </tr>
 <?
 }
 }}}
 ?>
 
 <!--
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <!--<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>หลังปริญญา</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”.................&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">รวมจำนวนชั่วโมงงานกิจกรรมนักศึกษา
        ระดับคณะฯ/มหาวิทยาลัย ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t42,1);
  ?>
  </span></b></p>  </td>
 </tr>
</table>
<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>
  </td>
 </tr>
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ก่อนปริญญา</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>............ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)&nbsp; <span style='background:yellow'>(หัวข้อนี้จะมีภาระงายย่อยลงไปอีก
  แต่อ้อมไม่แยกค่ะ ให้รวมกันไปเลย)</span></span></span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>หลังปริญญา</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)<span style='background:yellow'>(หัวข้อนี้จะมีภาระงายย่อยลงไปอีก
  แต่อ้อมไม่แยกค่ะ ให้รวมกันไปเลย)</span></span></span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมงงานกิจกรรมนักศึกษา
  ระดับส่วนกลาง ทั้งหมด</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></b></p>
  </td>
 </tr>
</table>-->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>ระดับคณะฯ/มหาวิทยาลัย</span></b></p>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
  <?
 $sql = "SELECT DISTINCT m.task_main,
           (SELECT     task_name    FROM   task_main     WHERE   (task_main = m.task_main) AND (task_sub = '0')) AS tm 
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0603') ". $con_date."
ORDER BY m.task_main ";
 //echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){
?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?=$rec_m["tm"]?></span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
  <?
//$emp_id = $_GET["emp_id"];

$sql = "SELECT     m.task_main,  (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name1,(SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2,  m.task_sub,m.task_topic, a.task_detail SUM(a.task_hr1) AS hr 
					FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                     task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY a.datetime_start" ;
//echo "<br>".$sql;

$sql = "SELECT     m.task_main, 
 (SELECT     task_name
         FROM          task_main
         WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name1,

 (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name2,  m.task_name,
							m.task_sub,a.task_detail,a.place,convert(char(10),a.datetime_start,120) as date_start,m.task_topic,a.task_hr1 AS hr 
					FROM   task_action AS a INNER JOIN  task_main AS m ON  a.id = m.id INNER JOIN
                     task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_main LIKE '$rec_m[task_main]') ". $con_date."
 ORDER BY a.datetime_start ";

//echo "<br>".$sql;

 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
foreach($arr as $rec){
$c++;
?>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing>
  <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <? //$rec["tm_name1"]."<br>".$rec["task_detail"] .    . " (" . $rec["date_start"].")"?>
  <?=$rec["task_detail"] . "  ณ " . $rec["place"]  . " (" . $rec["date_start"].")"?>
  </span>
  </p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">
    <?
	echo number_format($rec["hr"],1);
	$t43 += $rec["hr"];
	?>
  </span></p>  </td>
 </tr>
 <?
 }
 }}}
 ?>
 
 <!--
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <!--<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>หลังปริญญา</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”.................&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">รวมจำนวนชั่วโมงงานกิจกรรมนักศึกษา
        ระดับคณะฯ/มหาวิทยาลัย ทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t43,1);
  ?>
  </span></b></p>  </td>
 </tr>
  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานกิจกรรมนักศึกษาทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format(($t41+$t42+$t43),1);
  $t4 = ($t41+$t42+$t43);
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ก่อนปริญญา</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>............ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)&nbsp; <span style='background:yellow'>(หัวข้อนี้จะมีภาระงายย่อยลงไปอีก
  แต่อ้อมไม่แยกค่ะ ให้รวมกันไปเลย)</span></span></span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>หลังปริญญา</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ) <span style='background:yellow'>(หัวข้อนี้จะมีภาระงายย่อยลงไปอีก
  แต่อ้อมไม่แยกค่ะ ให้รวมกันไปเลย)</span></span></span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมจำนวนชั่วโมงงานกิจกรรมนักศึกษา
  ระดับคณะฯ/มหาวิทยาลัย ทั้งหมด</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานกิจกรรมนักศึกษาทั้งหมด</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></b></p>
  </td>
 </tr>
</table>-->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>5.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานทำนุบำรุงศิลปวัฒนธรรมและสิ่งแวดล้อม</span></b></p>



<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 
  <?
 /* $t5 = 0;
 $sql = "SELECT DISTINCT m.task_main,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0')) AS tm
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
WHERE     (e.task_emp = '$emp_id') AND (m.task_id LIKE '0700') ". $con_date."
ORDER BY m.task_main ";
echo $sql;
 $arr_m = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr_m)>0){
foreach($arr_m as $rec_m){*/
?>
 <tr>
 <!-- <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'><?//=$rec_m["tm"]?></span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>-->
 </tr>
  <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT     distinct a.topic_detail ,a.task_hr1, a.place, convert(char(10),a.datetime_start,120) as date_start 
					FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                     task_action_emp AS e ON a.task_ref = e.task_ref  
					 WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '07%') AND (e.task_confirm = 'Y')  ". $con_date . "  order by date_start";
//echo "<br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
foreach($arr as $rec){
$c++;
?>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo $rec["topic_detail"]." ณ ". $rec["place"]." &nbsp;(".$rec["date_start"].")";
  ?>
  </span></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">
    <?
	echo number_format($rec["task_hr1"],1);
	$t5+=$rec["task_hr1"];
	?>
  </span></p>  </td>
 </tr>
 <?
 }
 }
 //}
 //}
 ?>
 
 <!--
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <!--<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>หลังปริญญา</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”.................&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>รูปแบบการแสดงข้อมูล</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร่วมเป็นอาจารย์ที่ปรึกษานักศึกษาแพทย์
  ในการจัดนิทรรศการศิลปะ ณ สโมสรนักศึกษาแพทย์&nbsp; ชั้น 2&nbsp; (18/05/57)</span></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">รวมงานทำนุบำรุงศิลปวัฒนธรรมและสิ่งแวดล้อมทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t5,1);
  ?>
  </span></b></p>  </td>
 </tr>
  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานทำนุบำรุงศิลปวัฒนธรรมและสิ่งแวดล้อมทั้งหมด</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t5,1);
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=669
 style='width:501.55pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>
  </td>
  <td width=113 valign=top style='width:3.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.</span></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>ภาระงานทุกอย่างที่อยู่ภายใต้รหัส </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0700- -1- -1&nbsp; <span lang=TH>ซึ่งมันแยกเป็นภาระงานย่อยลงไปอีกที
  แต่อ้อมไม่เอาแยกค่ะ เพราะไม่ใช้ เอารวมมาได้เลย</span></span></p>
  </td>
  <td width=113 valign=top style='width:3.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ) <span style='background:yellow'>(หัวข้อนี้จะมีภาระงายย่อยลงไปอีก
  แต่อ้อมไม่แยกค่ะ ให้รวมกันไปเลย)</span></span></span></p>
  </td>
  <td width=113 valign=top style='width:3.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานทำนุบำรุงศิลปวัฒนธรรมและสิ่งแวดล้อมทั้งหมด</span></b></p>
  </td>
  <td width=113 valign=top style='width:3.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></b></p>
  </td>
 </tr>
</table>-->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>6.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานบริหาร</span></b></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานประชุม</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับสาขาวิชาฯ</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
  <?
 $t6 = 0;
 $t61 = 0;
 $t611 = 0;
 $t612 = 0;
 $t613 = 0;
  
//$emp_id = $_GET["emp_id"];
$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = 0)) AS tm_name2, 
 (SELECT     task_name   FROM    task_main AS task_main_1   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name3, m.task_sub, m.task_topic, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0801')  AND (m.task_main LIKE '81102')  ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic " ;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
$task_name =  $rec["tm_name3"];
$c++;
?>

 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
 <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'><?=$task_name?><!--ภาระงานทุกอย่างที่อยู่ภายใต้รหัส --></span>
  <!-- <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0801-81102-01</span></b><span lang=TH style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>กรณีที่มีภาระงานย่อยลงไป
  จะเป็นชื่อการประชุมเดียวกัน ให้บวกจำนวน ชม. งานย่อยนั้นไว้อันเดียวกัน</span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  จะได้</span></p>-->
  <!--<p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ตัวอย่างที่เลือกจนสุด</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ประชุมสาขาวิชาฯ</span></p>-->
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp; <?
  echo  number_format($rec["hr"],1); 
  $t611 += $rec["hr"];
  ?></p>  </td>
 </tr>
 <?
 }
 }
 ?>
 
<!-- <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานประชุมระดับสาขาวิชาฯ”ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t611,1);
  $t61 += $t611;
  ?>
  </span></b></p>  </td>
 </tr>
 </table>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 <tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับภาควิชาฯ (ส่วนกลาง)</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
  <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
 (SELECT     task_name
                            FROM          task_main AS task_main_1
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name3, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0801')  AND (m.task_main LIKE '81101')   ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic" ;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
$task_name =  $rec["tm_name3"];
$c++;
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <?=$task_name; ?></span>
  <!--
  ภาระงานทุกอย่างที่อยู่ภายใต้รหัส 
  
   <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0801-81101-01</span></b><span lang=TH style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>ซึ่งมันแยกเป็นภาระงานย่อยลงไปอีกที
  แต่อ้อมไม่เอาแยกค่ะ เพราะไม่ใช้ เอามาบวกรวมได้</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>-->
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center">
    <?
	echo number_format($rec["hr"],1); 
	$t612 += $rec["hr"];
	?>
  </span></p>  </td>
 </tr>
 <?
 }
 }
 ?>
 <tr>
  <!--<td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานประชุมธุรการภาควิชาอายุรศาสตร์</span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>3.</span></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานประชุมคณะกรรมการบริหารภาควิชาอายุรศาสตร์</span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>4.</span></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานประชุมคณะกรรมการบริหารผู้ป่วยใน
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(IPD.)</span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>5.</span></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานประชุมอื่นๆ</span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>-->
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานประชุมระดับภาควิชาฯ” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t612,1);
  $t61 += $t612;
  ?>
  </span></b></p>  </td>
 </tr>
 </table>
 
 
 

 <table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานประชุม”&nbsp; ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <?
  echo number_format($t611+$t612+$t613,1);
  $t61 = $t611+$t612+$t613;
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานดำรงตำแหน่ง</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับสาขาวิชาฯ</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>

 				  
 <?
 $t621 = 0;
 $t622 = 0;
 $t623 = 0;
//$emp_id = $_GET["emp_id"];
/*$sql = " SELECT   p.id, p.groupname, p.[level], p.unit, p.type, p.expire, p.userin, p.datein, p.status, d.id AS Expr1, d.empid, d.position, d.datestart, d.datestop, d.sumhour, d.status AS Expr2
FROM         View_tbmanageposition AS p INNER JOIN
                      View_tbmanagedetail AS d ON p.id = d.id
WHERE     (p.expire <> 'Y') AND (d.datestop >= '$date_start_db' OR  d.datestop IS NULL) AND (d.empid = '$emp_id')  AND (p.[level] = '1') order by d.datestart ";*/
$sql = " SELECT   p.id, p.groupname, p.managelevel, p.manageunit, p.managetype, d.id AS Expr1, d.id, d.managepositiontype, d.datestart, d.dateend, d.sumhour, d.status AS Expr2
FROM         hrmedicine_db.dbo.mtmanageposition AS p 
INNER JOIN hrmedicine_db.dbo.tbmanagedetail AS d ON p.id = d.manageid
WHERE     (d.expire <> '1') AND (d.dateend >= '$date_start_db' OR  d.dateend = '1900-01-01') AND (d.id = '$emp_id')  AND (p.managelevel = '1')  order by d.datestart asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =  $rec["tm_name2"];
$c++;
?>

 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?=$c;?>
  </span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo $rec["groupname"] . "   ตำแหน่ง  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
   if($rec["dateend"]=="1900-01-01") 
  {
   echo " ปัจจุบัน )";
   $mm = $month;
  }else{
  echo $rec["dateend"]. " ) ";
  $date_diff=strtotime($rec["dateend"])-strtotime($date_start_db);
  $mm = floor(($date_diff)/2628000);
  $mm = $mm+1;
 }
   ?>
  </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><span
  lang=TH></span></span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>  
  <?
  //echo "month" . $month;
  if($rec["sumhour"]!=0){
  //*$month;
  echo   number_format($rec["sumhour"]*$mm,1);
  $t621 += $rec["sumhour"]*$mm;
  }else echo "-";
  ?>
  
  </span></p>  </td>
 </tr>
 <?
 }}
 ?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานดำรงตำแหน่งระดับสาขาวิชาฯ” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
  <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t621,1);
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับภาควิชาฯ (ส่วนกลาง)</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>

 				  
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = " SELECT   p.id, p.groupname, p.[level], p.unit, p.type, p.expire, p.userin, p.datein, p.status, d.id AS Expr1, d.empid, d.position, d.datestart, d.datestop, d.sumhour, d.status AS Expr2
FROM         View_tbmanageposition AS p INNER JOIN
                      View_tbmanagedetail AS d ON p.id = d.id
WHERE     (p.expire <> 'Y') AND (d.datestop >= '$date_start_db' OR  d.datestop IS NULL) AND (d.empid = '$emp_id')  AND (p.[level] = '2') order by d.datestart ";*/
/*$sql = " SELECT   p.id, p.groupname, p.managelevel, p.manageunit, p.managetype, d.id AS Expr1, d.id, d.managepositiontype, d.datestart, d.dateend, d.sumhour, d.status AS Expr2
FROM         hrmedicine_db.dbo.mtmanageposition AS p 
INNER JOIN hrmedicine_db.dbo.tbmanagedetail AS d ON p.id = d.manageid
WHERE     (d.expire <> '1') AND (d.dateend >= '$date_start_db' OR  d.dateend = '1900-01-01') AND (d.id = '$emp_id')  AND (p.managelevel = '2')  order by d.datestart asc ";*/

/////////////////////// Edit 18-01-2018 ////////////////////
$sql = " SELECT   p.id, p.groupname, p.managelevel, p.manageunit, p.managetype, d.id AS Expr1, d.id, d.managepositiontype, d.datestart, d.dateend, d.sumhour, d.status AS Expr2
FROM         hrmedicine_db.dbo.mtmanageposition AS p 
INNER JOIN hrmedicine_db.dbo.tbmanagedetail AS d ON p.id = d.manageid
WHERE (d.dateend >= '$date_start_db' OR  d.dateend = '1900-01-01') AND (d.id = '$emp_id')  AND (p.managelevel = '2')  order by d.datestart asc ";

//echo  "<br><br>".$sql;
$arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =  $rec["tm_name2"];
$c++;
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <?
  echo $rec["groupname"] . "   ตำแหน่ง  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
   if($rec["dateend"]=="1900-01-01") 
  {
   echo " ปัจจุบัน )";
   $mm = $month;
  }else{
  echo $rec["dateend"]. " ) ";
  $date_diff=strtotime($rec["dateend"])-strtotime($date_start_db);
  $mm = floor(($date_diff)/2628000);
  $mm = $mm+1;
 }
   ?>
  </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><span
  lang=TH></span></span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  if($rec["sumhour"]!=0){
  echo   number_format($rec["sumhour"]*$mm,1);
  $t622 += $rec["sumhour"]*$mm;
  }else echo "-";
  ?>
  </span></p>  </td>
 </tr>
 <?
 }}
 ?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานดำรงตำแหน่ง
  ระดับภาควิชาฯ ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center"><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t622,1);
  ?>
  </span></span></b></p>  </td>
 </tr>
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานดำรงตำแหน่ง”&nbsp; ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <? 
   $t62=$t621+$t622;
   echo number_format($t62,1);
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานบริหารระดับภาควิชา” <a name="_GoBack"></a>ทั้งหมด</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(งานประชุม
  + งานดำรงตำแหน่ง)</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format(($t61+$t62),1);
  $t6=($t61+$t62);
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>7.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานอื่นๆ
ที่ได้รับมอบหมาย</span></b></p>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>7.1<span lang=TH>&nbsp; งานพัฒนาตนเอง</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับภาควิชาฯ</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
  <?
  //$t71 = 0;$t711 = 0;$t712 = 0;$t713 = 0;
  //$t72 = 0;$t721 = 0;$t722 = 0;$t723 = 0;
//$emp_id = $_GET["emp_id"];
/*<!--$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91101') AND (m.task_sub <> '0')  ".$con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ; -->*/
$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE   (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE   (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, task_detail,
m.task_sub, a.task_hr1,a.topic_detail,a.place,convert(char(10),a.datetime_start,120) as date_start,convert(char(10),a.datetime_end,120) as date_end   FROM  task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN 
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE a.task_flag is null and e.emp_status !='0' and  (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91101') AND (m.task_sub <> '01') ".$con_date."
ORDER BY a.datetime_start" ; 
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
$t711=0;
foreach($arr as $rec){
$c++;
//$hr = $rec["hr"];
$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =  $rec["tm_name2"];
?>
 
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo  $task_name;
  if ($rec["topic_detail"] == "" OR $rec["topic_detail"] == " ")
  {
	  $detail = $rec["task_detail"];
  }
  else
	{
	  $detail = $rec["topic_detail"];
	}
  //echo $rec["topic_detail"];
  //echo $rec["task_detail"];
  echo $detail;
  echo "&nbsp;ณ&nbsp;".$rec["place"] .'&nbsp;&nbsp;(' . $rec["date_start"]. ' - ' . $rec["date_end"] . " )";
  
  ?>
 <!-- ทุกอย่างที่อยู่ภายใต้รหัส&nbsp; </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0901-91101-0<span lang=TH>&nbsp;
  ซึ่งจะแบ่งภาระงานย่อยลงไปอีกเป็นด้านๆ แต่อ้อมไม่เอาค่ะ อ้อมเอารวมไปเลย</span>--></span></p>
  <!--<p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........ดึงจาก </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>-->  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format( $rec["task_hr1"],1);
  $t711 += $rec["task_hr1"];
  ?>
  </span></p>  </td>
 </tr>
 <?
 }  }
 ?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานพัฒนาตนเอง ระดับภาควิชาฯ” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format($t711,1);
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับคณะฯ/มหาวิทยาลัย</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE   (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE   (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, task_detail,
m.task_sub, a.task_hr1,a.topic_detail,a.place,convert(char(10),a.datetime_start,120) as date_start ,convert(char(10),a.datetime_end,120) as date_end   FROM  task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN 
                      task_action_emp AS e ON a.task_ref = e.task_ref  
					  WHERE a.task_flag is null and e.emp_status !='0' AND task_confirm <> 'N'
					  AND  (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91102') AND (m.task_sub <> '01')  ".$con_date."
 ORDER BY a.datetime_start" ;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
$t712=0;
foreach($arr as $rec){
$c++;
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
$task_name = $rec["tm_name2"];
?>

 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>

  <?
  //echo  $task_name;
  //echo $rec["topic_detail"];
  if ($rec["topic_detail"] == "" OR $rec["topic_detail"] == " ")
  {
	  $detail = $rec["task_detail"];
  }
  else
	{
	  $detail = $rec["topic_detail"];
	}
  echo $detail;
  echo "&nbsp;ณ&nbsp;".$rec["place"] .'&nbsp;&nbsp;(' . $rec["date_start"] .' - ' .$rec["date_end"]. ")";
  ?>
<!--  ทุกอย่างที่อยู่ภายใต้รหัส&nbsp; </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0901-91102-0<span lang=TH>&nbsp;
  ซึ่งจะแบ่งภาระงานย่อยลงไปอีกเป็นด้านๆ แต่อ้อมไม่เอาค่ะ อ้อมเอารวมไปเลย</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........ดึงจาก </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span>--></span></p></td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">
   
   <?
  echo number_format( $rec["task_hr1"],1);
  $t712 += $rec["task_hr1"];
  ?>
  </span></p>  </td>
 </tr>
 <? }
 } ?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานพัฒนาตนเอง ระดับคณะฯ/มหาวิทยาลัย” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  
   <?
  echo number_format($t712,1);
    //$t712 += $rec["task_hr1"];
	//$t71 +=
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับนอกมหาวิทยาลัย</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
   <?
//$emp_id = $_GET["emp_id"];
$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE   (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE   (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, task_detail,
m.task_sub, a.task_hr1,a.topic_detail,a.task_travel_detail,a.place,convert(char(10),a.datetime_start,120) as date_start,convert(char(10),a.datetime_end,120) as date_end    FROM  task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN 
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE a.task_flag is null and e.emp_status !='0' and   (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91103') AND (m.task_sub <> '01') ".$con_date."
 ORDER BY a.datetime_start" ;
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
$t713=0;
foreach($arr as $rec){
$c++;
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
$task_name =  $rec["tm_name2"];

?>
 
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
 
	
	<?
			  //echo  $task_name;
			 // echo $rec["topic_detail"];
			echo $rec["task_detail"];
			echo "&nbsp;ณ&nbsp;".$rec["place"] .'&nbsp;&nbsp;'.$rec["task_travel_detail"] .'&nbsp;&nbsp;(' . $rec["date_start"] .' - ' .  $rec["date_end"] . ")";
  
  ?>
  </span>
    <!-- ทุกอย่างที่อยู่ภายใต้รหัส&nbsp; </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0901-91103-0<span lang=TH>&nbsp;
  ซึ่งจะแบ่งภาระงานย่อยลงไปอีกเป็นด้านๆ แต่อ้อมไม่เอาค่ะ อ้อมเอารวมไปเลย</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........ดึงจาก </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span>--></span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  
   <?
  echo number_format( $rec["task_hr1"],1);
  $t713 += $rec["task_hr1"];
  ?>
  </span></p>  </td>
 </tr>
 <?
 }}
 ?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานพัฒนาตนเอง ระดับนอกมหาวิทยาลัย” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <?
  echo number_format($t713,1);
    //$t713 += $rec["task_hr1"];
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานพัฒนาตนเองทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <?
   $t71 =0;
   $t71 = $t711 + $t712 + $t713;
   //echo  $t711 .  '  '. $t712  .  '  '. $t713;
  echo number_format($t71 ,1);
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>7.2<span lang=TH>&nbsp;
งานที่ได้รับมอบหมายพิเศษเฉพาะกิจ</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับภาควิชาฯ</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
   <?
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0902')  AND (m.task_main LIKE '92101')  ". $con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ;*/
$sql = "SELECT  m.task_main,  m.task_sub,a.topic_detail,a.place,convert(char(10),a.datetime_start,120) as date_start,
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
							a.task_hr1 AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0902')  AND (m.task_main LIKE '92101')  ". $con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
foreach($arr as $rec){
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =  $rec["tm_name2"];
$task_name =  $rec["tm_name2"] . "  " . $rec["topic_detail"]. ' &nbsp;&nbsp;' . $rec["place"] . ' &nbsp;&nbsp;(' . $rec["date_start"] . ')'  ;
$c++;
?>
 
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing>
  <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$task_name?><!--ทุกอย่างที่อยู่ภายใต้รหัส&nbsp;--> </span>
 <!-- <span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:   yellow'>0902-92101-0<span lang=TH>&nbsp; 
    ซึ่งจะแบ่งภาระงานย่อยลงไปอีกเป็นด้านๆ แต่อ้อมไม่เอาค่ะ อ้อมเอารวมไปเลย</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........ดึงจาก </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span>--></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span><?
  
  echo number_format( $rec["hr"],1);
  $t721 += $rec["hr"];
  ?></p></td>
 </tr>
 <?  } } ?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานที่ได้รับมอบหมายพิเศษเฉพาะกิจ ระดับภาควิชาฯ” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>  
  <?
  echo number_format($t721,1);
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ระดับคณะฯ/มหาวิทยาลัย</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT  m.task_main, m.task_sub, a.topic_detail, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
					SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0902')  AND (m.task_main LIKE '92102')  ". $con_date."
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main" ;*/
$sql = "SELECT  m.task_main, m.task_sub,m.task_topic, a.topic_detail, a.place,convert(char(10),a.datetime_start,120) as date_start,
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic =m.task_topic)) AS tm_name2, 
					a.task_hr1 AS hr  FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0902')  AND (m.task_main LIKE '92102' OR m.task_main LIKE '92103')  ". $con_date." order by a.datetime_start asc ";
//echo  "<br><br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
foreach($arr as $rec){

//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
$task_name =  $rec["tm_name2"] . "  " . $rec["topic_detail"] . ' &nbsp;&nbsp;' . $rec["place"] . ' &nbsp;&nbsp;(' . $rec["date_start"] . ')'  ;
$c++;
?>

 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>  <p class=MsoNoSpacing align=center style='text-align:center'><span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <?=$c;?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$task_name?><!--ทุกอย่างที่อยู่ภายใต้รหัส&nbsp; <--></span>
  <!--<span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0902-92102-0<span lang=TH>&nbsp;
  ซึ่งจะแบ่งภาระงานย่อยลงไปอีกเป็นด้านๆ แต่อ้อมไม่เอาค่ะ อ้อมเอารวมไปเลย</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........ดึงจาก </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span>--></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?
  echo number_format( $rec["hr"],1);
   $t722 += $rec["hr"];
  ?></span></p>  </td>
 </tr>
 <? } } ?>
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานที่ได้รับมอบหมายพิเศษเฉพาะกิจ ระดับคณะฯ/มหาวิทยาลัย” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <?
  echo number_format($t722,1);
  
  $t72 = $t721 + $t722;
  ?>
  </span></b></p>  </td>
 </tr>

</table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>7.3<span lang=TH>&nbsp;
งานบริหารระดับคณะแพทยศาสตร์ศิริราชพยาบาล</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
  <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานประชุม</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
  <?
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
 (SELECT     task_name     FROM          task_main AS task_main_1        WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name3, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0802')  AND (m.task_main LIKE '82102') ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY m.task_main" ;*/
$sql = "SELECT  m.task_main, a.task_detail,a.place,convert(char(10),a.datetime_start,120) as date_start, convert(char(10),a.datetime_end,120) as date_end,
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
 (SELECT     task_name     FROM          task_main AS task_main_1        WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name3, m.task_sub, a.task_hr1  FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0802')  AND (m.task_main LIKE '82101') AND (m.task_topic LIKE '1') ". $con_date."
 ORDER BY m.task_main" ;
//0802-82102-0
//echo  "<br><br>มหาวิทยาลัย ".$sql; ///////มหาวิทยาลัย//////////////////
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
$task_name =  $rec["tm_name3"];
$c++;
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing>
  <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo $task_name . '  ' .  $rec["task_detail"]  . '  ' .  $rec["place"] . '   (' .  $rec["date_start"].')' ; 
  ?><!--ภาระงานทุกอย่างที่อยู่ภายใต้รหัส -->
  </span>
  <!-- <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  0802-82102-0</span></b><span lang=TH style='font-size:14.0pt;  font-family:"Browallia New","sans-serif";background:yellow'>ซึ่งมันแยกเป็นภาระงานย่อยลงไปอีกที
  แต่อ้อมไม่เอาแยกค่ะ เพราะไม่ใช้ เอามาบวกรวมได้</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>-->
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center">
    <?
	echo number_format($rec["task_hr1"],1); 
	$t733 += $rec["task_hr1"];
	?>
  </span></p>  </td>
 </tr>
 
 <?
 }}
 ?>
 
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานประชุมระดับคณะแพทยศาสตร์ศิริราชพยาบาล” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t733,1);
  $t73 += $t733;
  ?>
  </span></b></p>  </td>
 </tr>

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานดำรงตำแหน่ง</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
   		  
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = " SELECT   p.id, p.groupname, p.[level], p.unit, p.type, p.expire, p.userin, p.datein, p.status, d.id AS Expr1, d.empid, d.position, d.datestart, d.datestop, d.sumhour, d.status AS Expr2
FROM         View_tbmanageposition AS p INNER JOIN
                      View_tbmanagedetail AS d ON p.id = d.id
WHERE     (p.expire <> 'Y') AND (d.datestop >= '$date_start_db' OR  d.datestop IS NULL) AND (d.empid = '$emp_id')  AND (p.[level] = '3') ";*/
$sql = " SELECT   p.id, p.groupname, p.managelevel, p.manageunit, p.managetype, d.id AS Expr1, d.id, d.managepositiontype, d.datestart, d.dateend, d.sumhour, d.status AS Expr2
FROM         hrmedicine_db.dbo.mtmanageposition AS p 
INNER JOIN hrmedicine_db.dbo.tbmanagedetail AS d ON p.id = d.manageid
WHERE     (d.expire <> '1') AND (d.dateend >= '$date_start_db' OR  d.dateend = '1900-01-01') AND (d.id = '$emp_id')  AND (p.managelevel = '3') AND levelemp = '1' order by datestart asc ";
//echo  "<br><br>มหาวิทยาลัย".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =  $rec["tm_name2"];
$c++;
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  
  <?
  echo $rec["groupname"] . "   ตำแหน่ง  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
  if($rec["dateend"]=="1900-01-01") 
  {
   echo " ปัจจุบัน )";
   $mm = $month;
  }else{
  echo $rec["dateend"]. " ) ";
  $date_diff=strtotime($rec["dateend"])-strtotime($date_start_db);
  $mm = floor(($date_diff)/2628000);
  $mm = $mm+1;
 }
 ?>
  
  </span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'><span class="MsoNoSpacing" style="text-align:center">
    <?

  if($rec["sumhour"]!=0){

  echo   number_format($rec["sumhour"]*$mm,1);
  $t734 += $rec["sumhour"]*$mm;
  }else echo "-";
  ?>
  </span></span></p>  </td>
 </tr>
 <?
 }}
 ?>

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานดำรงตำแหน่งระดับคณะแพทยศาสตร์ศิริราชพยาบาล” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <?
  echo number_format($t734,1);

  $t73+=$t734;
  ?>
  </span></b></p>  </td>
 </tr>

 </table>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>7.4<span lang=TH>&nbsp;
งานบริหารระดับมหาวิทยาลัยมหิดล</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
  <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานประชุม</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
  <?
//$emp_id = $_GET["emp_id"];
/*$sql = "SELECT  m.task_main,  
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
 (SELECT     task_name     FROM          task_main AS task_main_1        WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name3, 
							m.task_sub, SUM(a.task_hr1) AS hr FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0802')  AND (m.task_main LIKE '82102') ". $con_date."
GROUP BY m.task_main, m.task_sub,m.task_topic ORDER BY m.task_main" ;*/
$sql = "SELECT  m.task_main, a.task_detail,a.place,convert(char(10),a.datetime_start,120) as date_start, convert(char(10),a.datetime_end,120) as date_end,
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1, 
(SELECT     task_name   FROM    task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
 (SELECT     task_name     FROM          task_main AS task_main_1        WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = m.task_topic)) AS tm_name3, m.task_sub, a.task_hr1  FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref  WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0802')  AND (m.task_main LIKE '82102') ". $con_date."
 ORDER BY m.task_main" ;
//0802-82102-0
//echo  "<br><br>มหาวิทยาลัย ".$sql; ///////มหาวิทยาลัย//////////////////
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
$task_name =  $rec["tm_name3"];
$c++;
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c;?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing>
  <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo $task_name . '  ' .  $rec["task_detail"]  . '  ' .  $rec["place"] . '   (' .  $rec["date_start"].')' ; 
  ?><!--ภาระงานทุกอย่างที่อยู่ภายใต้รหัส -->
  </span>
  <!-- <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  0802-82102-0</span></b><span lang=TH style='font-size:14.0pt;  font-family:"Browallia New","sans-serif";background:yellow'>ซึ่งมันแยกเป็นภาระงานย่อยลงไปอีกที
  แต่อ้อมไม่เอาแยกค่ะ เพราะไม่ใช้ เอามาบวกรวมได้</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>-->
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center">
    <?
	echo number_format($rec["task_hr1"],1); 
	$t745 += $rec["task_hr1"];
	?>
  </span></p>  </td>
 </tr>
 
 <?
 }}
 ?>
 
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานประชุมระดับมหาวิทยาลัยมหิดล” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t745,1);
  $t74 += $t745;
  ?>
  </span></b></p>  </td>
 </tr>

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานดำรงตำแหน่ง</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
   		  
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = " SELECT   p.id, p.groupname, p.[level], p.unit, p.type, p.expire, p.userin, p.datein, p.status, d.id AS Expr1, d.empid, d.position, d.datestart, d.datestop, d.sumhour, d.status AS Expr2
FROM         View_tbmanageposition AS p INNER JOIN
                      View_tbmanagedetail AS d ON p.id = d.id
WHERE     (p.expire <> 'Y') AND (d.datestop >= '$date_start_db' OR  d.datestop IS NULL) AND (d.empid = '$emp_id')  AND (p.[level] = '4') ";*/
$sql = " SELECT   p.id, p.groupname, p.managelevel, p.manageunit, p.managetype, d.id AS Expr1, d.id, d.managepositiontype, d.datestart, d.dateend, d.sumhour, d.status AS Expr2
FROM         hrmedicine_db.dbo.mtmanageposition AS p 
INNER JOIN hrmedicine_db.dbo.tbmanagedetail AS d ON p.id = d.manageid
WHERE     (d.expire <> '1') AND (d.dateend >= '$date_start_db' OR  d.dateend = '1900-01-01') AND (d.id = '$emp_id')  AND (p.managelevel = '4') AND levelemp = '1' order by datestart asc ";
//echo  "<br><br>มหาวิทยาลัย".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =  $rec["tm_name2"];
$c++;
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  
  <?
  echo $rec["groupname"] . "   ตำแหน่ง  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
  if($rec["dateend"]=="1900-01-01") 
  {
   echo " ปัจจุบัน )";
   $mm = $month;
  }else{
  echo $rec["dateend"]. " ) ";
  $date_diff=strtotime($rec["dateend"])-strtotime($date_start_db);
  $mm = floor(($date_diff)/2628000);
  $mm = $mm+1;
 }
 ?>
  
  </span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'><span class="MsoNoSpacing" style="text-align:center">
    <?

  if($rec["sumhour"]!=0){

  echo   number_format($rec["sumhour"]*$mm,1);
  $t746 += $rec["sumhour"]*$mm;
  }else echo "-";
  ?>
  </span></span></p>  </td>
 </tr>
 <?
 }
 }
 ?>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานดำรงตำแหน่งระดับมหาวิทยาลัยมหิดล” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <?
  echo number_format($t746,1);

  $t74+=$t746;
  ?>
  </span></b></p>  </td>
 </tr>

 </table>

 <p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>7.5<span lang=TH>&nbsp;
พัฒนาตนเองด้านการศึกษา</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
  <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานเตรียมและพัฒนาการศึกษา (ก่อนปริญญา)</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
<?
$sql = "SELECT     m.task_main,  
(SELECT   DISTINCT  task_name  FROM   task_main    WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT   DISTINCT  task_name    FROM   task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
m.task_sub, SUM(a.task_hr1) AS hr 
	FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id 
	INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
	WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0104') AND (m.task_main = '14103') ". $con_date."  
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main  " ;
//echo $sql;
 $arr = $objdb->getArray($sql);

$c=0;
if(count($arr)>0){
$sum_hr = 0;
foreach($arr as $rec){

$hr = $rec["hr"];
?>
 <tr>
  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  if($rec["tm_name"] == $rec["tm_name2"]){
  	echo $rec["tm_name2"];
  }else{
  	echo $rec["tm_name"] ." /".  $rec["tm_name2"];
  }
  
  ?>
  </span></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $t757  += $hr;
  echo number_format($hr,1);   
  ?></span></p>  </td>
 
 <?
 }
 }
 ?>
 </tr>
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานเตรียมและพัฒนาการศึกษา (ก่อนปริญญา)” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t757,1);
  $t75 += $t757;
  ?>
  </span></b></p>  </td>
 </tr>

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานเตรียมและพัฒนาการศึกษา (หลังปริญญา)</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
   		  
 <?
$sql = "SELECT     m.task_main,  
(SELECT   DISTINCT  task_name  FROM   task_main    WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name, 
(SELECT   DISTINCT  task_name    FROM   task_main   WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2, 
m.task_sub, SUM(a.task_hr1) AS hr 
	FROM   task_action AS a INNER JOIN   task_main AS m ON a.id = m.id 
	INNER JOIN task_action_emp AS e ON a.task_ref = e.task_ref  
	WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0206') AND (m.task_main = '26103') ". $con_date."  
GROUP BY m.task_main, m.task_sub ORDER BY m.task_main  " ;

$arr = $objdb->getArray($sql);

$c=0;
if(count($arr)>0){
$t7581 = 0;
foreach($arr as $rec){

$hr = $rec["hr"];
?>
 <tr>
  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  if($rec["tm_name"] ==$rec["tm_name2"]){
  	echo $rec["tm_name2"];
  }else{
  	echo $rec["tm_name"] ." /".  $rec["tm_name2"];
  }
  
  ?>
  </span></p>  </td>
    <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  $t7581  =$t7581  + $hr;
  //echo $t7581;
  //$t758 =$t758 + $t7581;
  echo number_format($hr,1);   
  ?></span></p>  </td>
 
 <?
 }
 }
 ?>
 </tr>

<!-- ออกข้อสอบ -->
 <?
 $t7582 = 0;
/*$sql = "SELECT     m.task_main,    (SELECT  DISTINCT    task_name     FROM     task_main     WHERE      (task_main = m.task_main) AND (task_sub = 0) AND (task_topic = 0)) AS tm_name, SUM(a.task_hr1) AS hr FROM    task_action AS a INNER JOIN   task_main AS m ON a.id = m.id INNER JOIN  task_action_emp AS e ON a.task_ref = e.task_ref
WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0205')  ". $con_date."  GROUP BY m.task_main ORDER BY m.task_main";

$arr = $objdb->getArray($sql);

$c=0;
if(count($arr)>0){
foreach($arr as $rec){

$hr = $rec["hr"];
//echo $hr."<br>";*/
?>
 <!-- <tr>
  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> -->
  <?
 // echo  $rec["tm_name"];
  ?>
  <!-- </span></p>  </td>
    <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> -->
  <?
  //$t7582  = $t7582+$hr;

  $t758 =$t7581 + $t7582;
  //echo number_format($hr,1);   
  ?>
  <!-- </span></p>  </td> -->
 
 <?
/* }
 }*/
 ?>
 <!-- </tr> -->

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานเตรียมและพัฒนาการศึกษา (หลังปริญญา)” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
   <?
  echo number_format($t758,1);

  $t75+=$t758;
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<br>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<span lang=TH>&nbsp;
ระดับคณะฯ/มหาวิทยาลัย</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

<!-- ///อบรมอาจารย์ใหม่/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>อบรมอาจารย์ใหม่</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>

<?
	$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub,e.emp_hr, a.topic_detail,a.task_detail,a.meet_name,a.place,a.task_hr1 AS hr,a.task_travel,convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
	FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
	WHERE a.task_flag is null and e.emp_status !='0' and  (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91102') AND (m.task_sub = '01') AND (m.task_topic = '1') ".$con_date."
	ORDER BY a.datetime_start" ;

	$arr = $objdb->getArray($sql);

	$c=0;
	if(count($arr)>0){
	$t7591 = 0;
	foreach($arr as $rec){

	$hr = $rec["hr"];
	?>
	 <tr>
	  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
	  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
	  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
	  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
	  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  if($rec["topic_detail"] == ""){
		echo $rec["task_detail"];
	  }else{
		echo $rec["topic_detail"];
	  }
	  
	  ?>
	  </span></p>  </td>
		<td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
	  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
	  padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing align=center style='text-align:center'><span
	  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  $t7591  =$t7591  + $hr;
	  //echo $t7581;
	  //$t758 =$t758 + $t7581;
	  echo number_format($hr,1);   
	  ?></span></p>  </td>
	 </tr>
	 <?
	 }
	 }
?>
<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “อบรมอาจารย์ใหม่” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t7591,1);
  $t75 += $t7591;
  ?>
  </span></b></p>  </td>
 </tr>

<!-- ///งานประชุม/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานประชุม</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>

<?
	$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub,e.emp_hr, a.topic_detail,a.task_detail,a.meet_name,a.place,a.task_hr1 AS hr,a.task_travel,convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
	FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
	WHERE a.task_flag is null and e.emp_status !='0' and  (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91102') AND (m.task_sub = '01') AND (m.task_topic = '2') ".$con_date."
	ORDER BY a.datetime_start" ;

	$arr = $objdb->getArray($sql);

	$c=0;
	if(count($arr)>0){
	$t7594 = 0;
	foreach($arr as $rec){

	$hr = $rec["hr"];
	?>
	 <tr>
	  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
	  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
	  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
	  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
	  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  if($rec["topic_detail"] == ""){
		echo $rec["task_detail"];
	  }else{
		echo $rec["topic_detail"];
	  }
	  
	  ?>
	  </span></p>  </td>
		<td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
	  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
	  padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing align=center style='text-align:center'><span
	  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  $t7594  =$t7594  + $hr;
	  echo number_format($hr,1);   
	  ?></span></p>  </td>
	 </tr>
	 <?
	 }
	 }
?>
<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานประชุม” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t7594,1);
  $t75 += $t7594;
  ?>
  </span></b></p>  </td>
 </tr>

<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “ระดับคณะฯ/มหาวิทยาลัย” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
	$t759 = $t7591+$t7592+$t7593+$t7594;
  echo number_format($t759,1);
  ?>
  </span></b></p>  </td>
 </tr>
 </table>

 <br>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<span lang=TH>&nbsp;
นอกมหาวิทยาลัย</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

<!-- ///AMEE/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>AMEE</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>

<?
	$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub,e.emp_hr, a.topic_detail,a.task_detail,a.meet_name,a.place,a.task_hr1 AS hr,a.task_travel,convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
	FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
	WHERE a.task_flag is null and e.emp_status !='0' and  (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91103') AND (m.task_sub = '01') AND (m.task_topic = '1') ".$con_date."
	ORDER BY a.datetime_start" ;

	$arr = $objdb->getArray($sql);

	$c=0;
	if(count($arr)>0){
	$t75101 = 0;
	foreach($arr as $rec){

	$hr = $rec["hr"];
	?>
	 <tr>
	  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
	  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
	  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
	  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
	  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  if($rec["topic_detail"] == ""){
		echo $rec["task_detail"];
	  }else{
		echo $rec["topic_detail"];
	  }
	  
	  ?>
	  </span></p>  </td>
		<td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
	  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
	  padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing align=center style='text-align:center'><span
	  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  $t75101  =$t75101  + $hr;
	  //echo $t7581;
	  //$t758 =$t758 + $t7581;
	  echo number_format($hr,1);   
	  ?></span></p>  </td>
	 </tr>
	 <?
	 }
	 }
?>
<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “AMEE” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t75101,1);
  $t75 += $t75101;
  ?>
  </span></b></p>  </td>
 </tr>

<!-- ///งานประชุม/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานประชุม</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>

<?
	$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub,e.emp_hr, a.topic_detail,a.task_detail,a.meet_name,a.place,a.task_hr1 AS hr,a.task_travel,convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
	FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
	WHERE a.task_flag is null and e.emp_status !='0' and  (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91103') AND (m.task_sub = '01') AND (m.task_topic = '4') ".$con_date."
	ORDER BY a.datetime_start" ;

	$arr = $objdb->getArray($sql);

	$c=0;
	if(count($arr)>0){
	$t75104 = 0;
	foreach($arr as $rec){

	$hr = $rec["hr"];
	?>
	 <tr>
	  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
	  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
	  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
	  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
	  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  if($rec["topic_detail"] == ""){
		echo $rec["task_detail"];
	  }else{
		echo $rec["topic_detail"];
	  }
	  
	  ?>
	  </span></p>  </td>
		<td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
	  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
	  padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing align=center style='text-align:center'><span
	  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  $t75104  =$t75104  + $hr;
	  echo number_format($hr,1);   
	  ?></span></p>  </td>
	 </tr>
	 <?
	 }
	 }
?>
<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานประชุม” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t75104,1);
  $t75 += $t75104;
  ?>
  </span></b></p>  </td>
 </tr>

<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “ระดับนอกมหาวิทยาลัย” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
	$t7510 = $t75101+$t75102+$t75103+$t75104;
  echo number_format($t7510,1);
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<br>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<span lang=TH>&nbsp;
ภาควิชา</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

<!-- ///AMEE/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ด้านการศึกษา</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>

<?
	$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub,e.emp_hr, a.topic_detail,a.task_detail,a.meet_name,a.place,a.task_hr1 AS hr,a.task_travel,convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
	FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
	WHERE a.task_flag is null and e.emp_status !='0' and  (e.task_emp = '$emp_id') AND (m.task_id LIKE '0901')  AND (m.task_main LIKE '91101') AND (m.task_sub = '01') ".$con_date."
	ORDER BY a.datetime_start" ;

	$arr = $objdb->getArray($sql);

	$c=0;
	if(count($arr)>0){
	$t75111 = 0;
	foreach($arr as $rec){

	$hr = $rec["hr"];
	?>
	 <tr>
	  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
	  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
	  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
	  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
	  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  if($rec["topic_detail"] == ""){
		echo $rec["task_detail"];
	  }else{
		echo $rec["topic_detail"];
	  }
	  
	  ?>
	  </span></p>  </td>
		<td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
	  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
	  padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing align=center style='text-align:center'><span
	  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  $t75111  =$t75111  + $hr;
	  //echo $t7581;
	  //$t758 =$t758 + $t7581;
	  echo number_format($hr,1);   
	  ?></span></p>  </td>
	 </tr>
	 <?
	 }
	 }
?>
<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “ด้านการศึกษา” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t75111,1);
  $t75 += $t75111;
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<br>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-<span lang=TH>&nbsp;
วิทยากรให้ความรู้พัฒนาตนเองด้านการศึกษา</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

<?
	$sql = "SELECT     e.task_emp, m.id, m.task_id, m.task_main,m.task_sub,e.emp_hr, a.topic_detail,a.task_detail,a.meet_name,a.place,a.task_hr1 AS hr,a.task_travel,convert(char(10),a.datetime_start,120) as datetime_start , a.datetime_end
	FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
	WHERE a.task_flag is null and e.emp_status !='0' and  (e.task_emp = '$emp_id') AND (m.task_id LIKE '0404')  AND (m.task_main LIKE '41108')  AND (a.task_travel <> '4') ".$con_date."
	ORDER BY a.datetime_start" ;

	$arr = $objdb->getArray($sql);

	$c=0;
	if(count($arr)>0){
	$t75121 = 0;
	foreach($arr as $rec){

	$hr = $rec["hr"];
	?>
	 <tr>
	  <td colspan="2" width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
	  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing style='margin-left:1.0cm;text-indent:-7.05pt'>
	  <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
	  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp; </span></span><span
	  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
		echo $rec["task_detail"];	  
	  ?>
	  </span></p>  </td>
		<td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
	  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
	  padding:0cm 5.4pt 0cm 5.4pt'>
	  <p class=MsoNoSpacing align=center style='text-align:center'><span
	  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
	  <?
	  $t75121  =$t75121  + $hr;
	  //echo $t7581;
	  //$t758 =$t758 + $t7581;
	  echo number_format($hr,1);   
	  ?></span></p>  </td>
	 </tr>
	 <?
	 }
	 }
?>
<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “วิทยากรให้ความรู้พัฒนาตนเองด้านการศึกษา” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
    <?
  echo number_format($t75121,1);
  $t75 += $t75121;
  ?>
  </span></b></p>  </td>
 </tr>

<tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมงานอื่นๆ
  ที่ได้รับมอบหมายทั้งหมด</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(งานพัฒนาตนเอง
  + งานที่ได้รับมอบหมายพิเศษเฉพาะกิจ+งานบริหารระดับมหาวิทยาลัยมหิดล+งานพัฒนาตนเองการศึกษา)</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format(($t71+$t72+$t73+$t74+$t75),1);
  $t7 = ($t71+$t72+$t73+$t74+$t75);
  ?>
  </span></b></p>  </td>
 </tr>
 </table>



<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'> <span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>8.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b>
 <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>งานบริหารระดับคณะแพทยศาสตร์ศิริราชพยาบาล</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678  style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานประชุม</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
 <?
 $t81 = 0;
 $t82 = 0;
 $t83 = 0;
//$emp_id = $_GET["emp_id"];0802-82101
$sql = "SELECT     m.task_main,m.task_sub, a.task_detail, a.place, a.task_hr1,convert(char(10),a.datetime_start,120) as date_start,
convert(char(10),a.datetime_end,120) as date_end,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1,
                          (SELECT     task_name
                            FROM          task_main AS task_main_1
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2  
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
					    WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0802')  AND (m.task_main LIKE '82101') AND (m.task_sub LIKE '01') AND (m.task_topic LIKE '2')  ". $con_date."
ORDER BY m.task_main" ;
//echo  "<br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
foreach($arr as $rec){
$c++;
//$hr = $rec["hr"];
$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =   $rec["tm_name2"];
if ($rec["date_start"]==$rec["date_end"])
	{
		$day = $rec["date_start"];
	}
	else
	{
		$day = $rec["date_start"]." - ".$rec["date_end"];
	}
?>

 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?> </span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <?=$rec["task_detail"] . " ณ &nbsp;". $rec["place"] . " &nbsp;(" .  $day . ")"?>
  <!--ภาระงานทุกอย่างที่อยู่ภายใต้รหัส </span> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0801-81102-01</span></b><span lang=TH style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>กรณีที่มีภาระงานย่อยลงไป
  จะเป็นชื่อการประชุมเดียวกัน ให้บวกจำนวน ชม. งานย่อยนั้นไว้อันเดียวกัน</span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  จะได้</span></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ตัวอย่างที่เลือกจนสุด</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ประชุมสาขาวิชาฯ--></span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <?
  echo number_format($rec["task_hr1"],1); 
  $t81 += $rec["task_hr1"];
  ?>
  <!--xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>(จะมีการเลือกประชุมสาขาวิชาฯ ซ้ำๆ กัน เพราะเป็นหมวดหมู่เดียวกัน
  ให้บวกรวมกันไปเลย--></span></p>  </td>
 </tr>
 <?
 }}
 ?>
 <tr>
 <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> </span>&nbsp;</p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <? //=$task_name?>
 </span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <? //=$rec["hr"]?>
 </span></p>  </td>
 </tr>
<!-- <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.</span></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........ดึงจาก
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>“รายละเอียดเพิ่ม”...............&nbsp;  ณ</b>
  ..............(สถานที่)...................... (วัน/เดือน/ปี พ.ศ.
  ที่ไปปฏิบัติ)</span></span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>xx.x</span></p>
  </td>
 </tr>-->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานประชุมระดับคณะฯ” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> 
  <?
  echo number_format($t81,1);
  ?>
   </span></b></p>  </td>
 </tr>
</table>
<br />

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678  style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

 <tr>
 <!-- <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานดำรงตำแหน่ง</span></b></p>  </td>-->
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานดำรงตำแหน่ง</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
 
 
   		  
 <?
//$emp_id = $_GET["emp_id"];
/*$sql = " SELECT   p.id, p.groupname, p.[level], p.unit, p.type, p.expire, p.userin, p.datein, p.status, d.id AS Expr1, d.empid, d.position, d.datestart, d.datestop, d.sumhour, d.status AS Expr2
FROM         View_tbmanageposition AS p INNER JOIN
                      View_tbmanagedetail AS d ON p.id = d.id
WHERE     (p.expire <> 'Y') AND (d.datestop >= '$date_start_db' OR  d.datestop IS NULL) AND (d.empid = '$emp_id')  AND (p.[level] = '3') ";*/
$sql = " SELECT   p.id, p.groupname, p.managelevel, p.manageunit, p.managetype, d.id AS Expr1, d.id, d.managepositiontype, d.datestart, d.dateend, d.sumhour, d.status AS Expr2
FROM         hrmedicine_db.dbo.mtmanageposition AS p 
INNER JOIN hrmedicine_db.dbo.tbmanagedetail AS d ON p.id = d.manageid
WHERE     (d.expire <> '1') AND (d.dateend >= '$date_start_db' OR  d.dateend = '1900-01-01') AND (d.id = '$emp_id')  AND (p.managelevel = '3') AND levelemp = '2' order by datestart asc ";
//echo  "<br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
$c=0;
if(count($arr)>0){
foreach($arr as $rec){
//$hr = $rec["hr"];
//$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =  $rec["tm_name2"];
$c++;
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?></span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  
  <?
  echo $rec["groupname"] . "   ตำแหน่ง  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
  if($rec["dateend"]=="1900-01-01") 
  {
   echo " ปัจจุบัน )";
   $mm = $month;
  }else{
  echo $rec["dateend"]. " ) ";
  $date_diff=strtotime($rec["dateend"])-strtotime($date_start_db);
  $mm = floor(($date_diff)/2628000);
  $mm = $mm+1;
 }
 ?>
  
  </span></p>
  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>&nbsp;
  
  <?
  //echo "month ".$month;
  if($rec["sumhour"]!=0){
  echo   number_format($rec["sumhour"]*$mm,1);
  $t82 += $rec["sumhour"]*$mm;
  }else echo "-";
  ?>
  
  </span></p>  </td>
 </tr>
 <?
 }}
 ?>
 
 <tr>
  <td width=555 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing>&nbsp;</p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานดำรงตำแหน่งระดับคณะฯ” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
   <?
  echo number_format($t82,1);
  //$t8 = $t81+$t82;
  ?>
  </p>  </td>
 </tr>
 
</table>
<br>
<!-- ADD 06032018 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678  style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ลำดับ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รายละเอียด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวน
  ชม.</span></b></p>  </td>
 </tr>

 <tr>
 <!-- <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานดำรงตำแหน่ง</span></b></p>  </td>-->
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>งานอื่นๆ</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>  </td>
 </tr>
   		  
 <?
$sql = "SELECT     m.task_main,m.task_sub, a.task_detail, a.place, a.task_hr1,convert(char(10),a.datetime_start,120) as date_start,
convert(char(10),a.datetime_end,120) as date_end,
                          (SELECT     task_name
                            FROM          task_main
                            WHERE      (task_main = m.task_main) AND (task_sub = '0') AND (task_topic = '0')) AS tm_name1,
                          (SELECT     task_name
                            FROM          task_main AS task_main_1
                            WHERE      (task_main = m.task_main) AND (task_sub = m.task_sub) AND (task_topic = '0')) AS tm_name2  
FROM         task_action AS a INNER JOIN
                      task_main AS m ON a.id = m.id INNER JOIN
                      task_action_emp AS e ON a.task_ref = e.task_ref
					    WHERE (e.task_emp = '$emp_id') AND (m.task_id LIKE '0802')  AND (m.task_main LIKE '82101') AND (m.task_sub LIKE '02') AND (m.task_topic LIKE '2')  ". $con_date."
ORDER BY m.task_main" ;
//echo  "<br>".$sql;
 $arr = $objdb->getArray($sql);
//echo "count===".count($arr);
if(count($arr)>0){
$c=0;
foreach($arr as $rec){
$c++;
//$hr = $rec["hr"];
$task_name =  $rec["tm_name1"]."/".$rec["tm_name2"];
//$task_name =   $rec["tm_name2"];
if ($rec["date_start"]==$rec["date_end"])
	{
		$day = $rec["date_start"];
	}
	else
	{
		$day = $rec["date_start"]." - ".$rec["date_end"];
	}
?>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$c?> </span></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <?=$rec["task_detail"] . " ณ &nbsp;". $rec["place"] . " &nbsp;(" .  $day . ")"?>
  <!--ภาระงานทุกอย่างที่อยู่ภายใต้รหัส </span> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0801-81102-01</span></b><span lang=TH style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>กรณีที่มีภาระงานย่อยลงไป
  จะเป็นชื่อการประชุมเดียวกัน ให้บวกจำนวน ชม. งานย่อยนั้นไว้อันเดียวกัน</span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  จะได้</span></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ตัวอย่างที่เลือกจนสุด</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ประชุมสาขาวิชาฯ--></span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <?
  echo number_format($rec["task_hr1"],1); 
  $t83 += $rec["task_hr1"];
  ?>
  <!--xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>(จะมีการเลือกประชุมสาขาวิชาฯ ซ้ำๆ กัน เพราะเป็นหมวดหมู่เดียวกัน
  ให้บวกรวมกันไปเลย--></span></p>  </td>
 </tr>
 <?
	}//End foreach
  }//End if
 ?>
 <tr>
 <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> </span>&nbsp;</p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <? //=$task_name?>
 </span></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  <? //=$rec["hr"]?>
 </span></p>  </td>
 </tr>
 
 <tr>
  <td width=555 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
  <td width=508 valign=top style='width:381.0pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing>&nbsp;</p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม
  “งานอื่นๆ” ทั้งหมด</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>
   <?
  echo number_format($t83,1);
  $t8 = $t81+$t82+$t83;
  ?>
  </p>  </td>
 </tr>
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวม&nbsp;"งานบริหารระดับคณะฯ" ทั้งหมด</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#F79646;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  <?
  echo number_format(($t81+$t82+$t83),1);
  $t8 = ($t81+$t82+$t83);
  ?>
  </span></b></p>  </td>
 </tr>
 
 
</table>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>
<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p><p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p><p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p><p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>



<p class=MsoNoSpacing align=center style='text-align:center'> <span lang=TH
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><!--พรพจน์&nbsp;
เปรมโยธิน&nbsp; (สาขาวิชาโภชนาการคลินิก)-->
    <strong>
    <?= $_GET["emp_id"] . "  &nbsp;&nbsp;    ".$_GET["emp_name"] ."&nbsp;&nbsp;(".$_GET["unit_name"] .")" ?>
    </strong></span><strong></b>
            </strong></p>
<?php 
    echo $y;
     
?>
<p align=center class=MsoNoSpacing style='text-align:center'><strong><span
style='font-size:7.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></strong></p>

<p align=center class=MsoNoSpacing style='text-align:center'><strong><span lang=TH
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>สรุปภาระงานที่ได้รับมอบหมาย
(ในเวลาราชการ) สำหรับ กองทุน “เฉลิมพระเกียรติ” ทุนส่วนที่ </span><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1</span></strong></p>

<p align=center class=MsoNoSpacing style='text-align:center'>
<strong> 
<span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ระยะเวลาตั้งแต่&nbsp;
<?=$ds?>
</span>&nbsp; -&nbsp; 
<span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$de?>
</span>
<!--<span lang=TH><?=$de?>
</span>-->
</strong></p>
<? 
                $empno = $_GET["emp_id"];
                $sql_selshow  = "SELECT DISTINCT  *  FROM  tb_score_pa  WHERE   (pa_empid = '$empno') AND (pa_year in (SELECT TOP 1 MAX(pa_year) FROM tb_score_pa))";
				$result_show =  mssql_query($sql_selshow);
                //$result_show =  mysql_query($sql_selshow);
                //$rec_show = mssql_fetch_array($result_show);
                //while ($rec_show = mysql_fetch_array($result_show))
				while ($rec_show = mssql_fetch_array($result_show))
{
    //echo  $rec_show[2];        
         if($rec_show[2] == "1")
            {
                     $wp1 = $rec_show[3] ;
                     $hp1 = $rec_show[4] ;
                     // echo $hp1;
            }
          else if($rec_show[2] == "2")
           {
                    $wp2 = $rec_show[3] ;
                     $hp2 = $rec_show[4] ;
           }
            else if($rec_show[2] == "3")
           {
                    $wp3 = $rec_show[3] ;
                     $hp3 = $rec_show[4] ;
           }
            else if($rec_show[2] == "4")
           {
                    $wp4 = $rec_show[3] ;
                     $hp4 = $rec_show[4] ;
           }
          else if($rec_show[2] == "5")
           {
                    $wp5 = $rec_show[3] ;
                     $hp5 = $rec_show[4] ;
           }
          else if($rec_show[2] == "6")
           {
                    $wp6 = $rec_show[3] ;
                     $hp6 = $rec_show[4] ;
           }
           else if($rec_show[2] == "7")
           {
                    $wp7 = $rec_show[3] ;
                     $hp7 = $rec_show[4] ;
           }
           else if($rec_show[2] == "8")
           {
                    $wp8 = $rec_show[3] ;
                     $hp8 = $rec_show[4] ;
           }
          else if($rec_show[2] == "9")
           {
                    $wp9 = $rec_show[3] ;
                     $hp9 = $rec_show[4] ;
           }
}

	$w = $wp1+$wp2+$wp3+$wp4+$wp5+$wp6+$wp7+$wp8+$wp9;
	//$scorepa = number_format(($w*$month)/12,1);
	$scorepa = ($w*$month)/12;
	//echo "scorepa :".$scorepa;
 ?>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=296 rowspan=2 style='width:221.65pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>หัวข้อภาระงาน</span></b></p>  </td>
  <td width=203 height="52" colspan=2 style='width:152.3pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงานใน 
  </span></b> <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>PA<br />
  (12 เดือน )</span></b>  </p>  </td>
  <td width=179 colspan=2 valign=top style='width:134.45pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ภาระงานที่ปฏิบัติได้จริง<br />
  (<?=$month;?> เดือน )</span></b></p>  </td>
 </tr>
 <tr>
  <td width=203 style='width:65.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวนชั่วโมง</span></b></p>  </td>
  <td width=115 style='width:86.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร้อยละการปฏิบัติงาน</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ตามเกณฑ์มาตรฐาน</span></b></p>  </td>
  <td width=179 style='width:57.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>จำนวนชั่วโมง</span></b></p>  </td>
  <td width=102 style='width:76.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ร้อยละการปฏิบัติงาน</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ตามเกณฑ์มาตรฐาน</span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:19.1pt;text-indent:-19.1pt'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานสอน</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo  number_format($wp1,1) ?> </span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo  number_format($hp1,1) ?></span></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  $t1 = ($t11+$t12);
  echo (number_format($t1,1));
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo (number_format(($t1*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='text-indent:26.2pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>1.1<span lang=TH>&nbsp; งานการศึกษา
  (ก่อนปริญญา)</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo number_format($t11,1);
  ?>
  </span></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
   <?
  echo (number_format(($t11*100/$scorepa),1));
  ?>
  </span></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='text-indent:26.2pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>1.2<span lang=TH>&nbsp;
  งานการศึกษา (หลังปริญญา)</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo number_format($t12,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
   <?
  echo (number_format(($t12*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:18.85pt;text-indent:-18.85pt'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>2.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานวิจัย</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo  number_format($wp2,1) ?></span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo  number_format($hp2,1) ?></span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  //$t2 = $t21+$t23;
  echo number_format($t2,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo (number_format(($t2*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:18.85pt;text-indent:-18.85pt'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>3.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานบริการทางวิชาการ</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
   <?
      $w_all34 = $wp3+$wp4;
       echo  number_format($w_all34,1);
?>
</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
 <?
	   $h_all34 = $hp3+$hp4;
       echo  number_format($h_all34,1);
?>
</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  $t3 = $t31+$t32;
  echo number_format($t3,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo (number_format(($t3*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
	<?php
	$sql_sub31 = "SELECT DISTINCT  *  FROM  tb_score_pa_sub  WHERE pa_mainno = '3.1' AND  (pa_empid = '$empno') AND (pa_year in (SELECT TOP 1 MAX(pa_year) FROM tb_score_pa)) ORDER BY num DESC";
	$query31 = mssql_query($sql_sub31);
	$rec31 = mssql_fetch_array($query31);
	?>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>3.1<span lang=TH>&nbsp;
  งานบริการทางการแพทย์</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($rec31["pa_weight"],1) //echo number_format($wp3,1) ?></span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($rec31["pa_hour"],1) //echo  number_format($hp3,1) ?></span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo number_format($t31,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp; <?
  echo (number_format(($t31*100/$scorepa),1));
  ?></span></b></p>  </td>
 </tr>
 <tr>
	<?php
	$sql_sub32 = "SELECT DISTINCT  *  FROM  tb_score_pa_sub  WHERE pa_mainno = '3.2' AND  (pa_empid = '$empno') AND (pa_year in (SELECT TOP 1 MAX(pa_year) FROM tb_score_pa))  ORDER BY num DESC";
	$query32 = mssql_query($sql_sub32);
	$rec32 = mssql_fetch_array($query32);
	?>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>3.2<span lang=TH>&nbsp;
  งานบริการวิชาการ</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($rec32["pa_weight"],1) //echo  number_format($wp4,1) ?></span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($rec32["pa_hour"],1) //echo  number_format($hp4,1) ?></span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<span class="MsoNoSpacing" style="text-align:center">
    <?
  echo number_format($t32,1);
  ?>
  </span></span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp; <?
  echo (number_format(($t32*100/$scorepa),1));
  ?></span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:18.85pt;text-indent:-18.85pt'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>4.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานกิจกรรมนักศึกษา</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo  number_format($wp4,1) ?></span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo  number_format($hp4,1) ?></span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t4,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo (number_format(($t4*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:18.85pt;text-indent:-18.85pt'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>5.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานทำนุบำรุงศิลปวัฒนธรรมและสิ่งแวดล้อม</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;<span class="MsoNoSpacing" style="text-align:center"><span class="MsoNoSpacing" style="text-align:center">&nbsp;&nbsp;<?php echo  number_format($wp5,1) ?></span></span>&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($hp5,1)?></span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t5,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo (number_format(($t5*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:18.85pt;text-indent:-18.85pt'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>6.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานบริหารภายในภาควิชาฯ</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($wp6,1)?></span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($hp6,1)?></span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t6,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo (number_format(($t6*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'><p class=MsoNoSpacing style='margin-left:18.85pt;text-indent:-14.2pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>7.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp; </span></span></b> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานอื่นๆ
  ที่ได้รับมอบหมาย</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($wp7,1)?></span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($hp7,1)?></span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t7,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo (number_format(($t7*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>7.1<span lang=TH>&nbsp;
  งานพัฒนาตนเอง</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b><span class="MsoNoSpacing" style="text-align:center"><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><span class="MsoNoSpacing" style="text-align:center"><span class="MsoNoSpacing" style="text-align:center">
    <?
  echo number_format($t71,1);
  ?>
  </span></span></span></span></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo (number_format(($t71*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>7.2<span lang=TH>&nbsp; งานที่ได้รับมอบหมายพิเศษเฉพาะกิจ</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t72,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;  
  <?
  echo (number_format(($t72*100/$scorepa),1));
  ?></span></b></p>  </td>
 </tr>
  <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>7.3<span lang=TH>&nbsp; งานบริหารระดับคณะแพทยศาสตร์ศิริราชพยาบาล</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t73,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;  
  <?
  echo (number_format(($t73*100/$scorepa),1));
  ?></span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>7.4<span lang=TH>&nbsp; งานบริหารระดับมหาวิทยาลัยมหิดล</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t74,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;  
  <?
  echo (number_format(($t74*100/$scorepa),1));
  ?></span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>7.5<span lang=TH>&nbsp; งานพัฒนาตนเองด้านการศึกษา</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t75,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;  
  <?
  echo (number_format(($t75*100/$scorepa),1));
  ?></span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:18.85pt;text-indent:-14.2pt'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>8.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>งานบริหารระดับคณะแพทยศาสตร์ศิริราชพยาบาล</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($wp8,1)?></span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;<?php echo number_format($hp8,1)?></span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t8,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
   background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"' >&nbsp;&nbsp;
   <?
  echo (number_format(($t8*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>8.1<span lang=TH>&nbsp;
  งานประชุม/อื่นๆ</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
    <?
  echo number_format($t81,1);
  ?>
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
   <?
  echo (number_format(($t81*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt'> <span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif"'>8.2<span lang=TH>&nbsp;
  งานดำรงตำแหน่ง</span></span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;</span></b><span class="MsoNoSpacing" style="text-align:center"><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><span class="MsoNoSpacing" style="text-align:center"><span class="MsoNoSpacing" style="text-align:center">
  <?
  echo number_format($t82,1);
  ?>
  </span></span></span></span></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
   <?
  echo (number_format(($t82*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>รวมทั้งสิ้น</span></b></p>  </td>
  <td width=203 valign=top style='width:65.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
<?
		$w_all = $wp1+$wp2+$wp3+$wp4+$wp5+$wp6+$wp7+$wp8+$wp9;
       echo  number_format($w_all,1);
      /*$h_all = $hp1+$hp2+$hp3+$hp4+$hp5+$hp6+$hp7+$hp8+$hp9;
       echo  number_format($h_all,1);*/
?>

</span></b></p>  </td>
  <td width=115 valign=top style='width:86.5pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
 <?
		$h_all = $hp1+$hp2+$hp3+$hp4+$hp5+$hp6+$hp7+$hp8+$hp9;
       echo  number_format($h_all,1);
      /*$w_all = $wp1+$wp2+$wp3+$wp4+$wp5+$wp6+$wp7+$wp8+$wp9;
       echo  number_format($w_all,1);*/
?>
</span></b></p>  </td>
  <td width=179 valign=top style='width:57.8pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  $tt = ($t1+$t2+$t3+$t4+$t5+$t6+$t7+$t8);
  echo  number_format($tt,1);
  ?>
  
  </span></b></p>  </td>
  <td width=102 valign=top style='width:76.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;
  <?
  echo (number_format(($tt*100/$scorepa),1));
  ?>
  </span></b></p>  </td>
 </tr>
</table>

<br><br><br><br>

<p class=MsoNoSpacing>
	<table width="651">
		<tr>
			<td width="551"></td>
			<td width="100">
				<p class=MsoNoSpacing align=center style='text-align:center'>
					<span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
						ลงชื่อ.................................................
						<br>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?=$_GET["emp_name"]?>
					</span>
				</p>
			</td>
		</tr>
	</table>
</p>



</div>



</body>

</html>
