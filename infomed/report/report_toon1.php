<?
if($_GET["doc"]=="doc"){
header("Content-Type: application/msword");
header('Content-Disposition: attachment; filename="report_t1.doc"');
}
require("../database.mssql.class/msdatabase.class.php");
require("../database.mssql.class/config.inc.php");
require("../function/function.php");
//require("../database.mssql.class/accms_config.php");

$editor_arr = array("","˹ѧ���","����","�������ҧ�Ԫҡ��","�ԴԷ�ȹ�","����","�Ѵ��������觾���������������");

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
		//$strMonthCut = Array("","���Ҥ�","����Ҿѹ��","�չҤ�","����¹","����Ҥ�","�Զع�¹","�á�Ҥ�","�ԧ�Ҥ�","�ѹ��¹","���Ҥ�","��Ȩԡ�¹","�ѹ�Ҥ�");
		$thai_month_arr=array(  
						"0"=>"",  
						"01"=>"���Ҥ�",  
						"02"=>"����Ҿѹ��",  
						"03"=>"�չҤ�",  
						"04"=>"����¹",  
						"05"=>"����Ҥ�",  
						"06"=>"�Զع�¹",   
						"07"=>"�á�Ҥ�",  
						"08"=>"�ԧ�Ҥ�",  
						"09"=>"�ѹ��¹",  
						"10"=>"���Ҥ�",  
						"11"=>"��Ȩԡ�¹",  
						"12"=>"�ѹ�Ҥ�"                    
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

$date1 = new DateTime($d1); //�ѹ��������
$date2 = new DateTime($d2); //�ѹ�������ش

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



<!--########## 1.�ҹ�͹ ##################################################################################-->

<p class=MsoNoSpacing><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>
  <![if !supportLists]>
  <b><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif";mso-fareast-font-family:"Browallia New"'><span
style='mso-list:Ignore'>1.<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></span></b>
  <![endif]>
  <b><span lang=TH style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>�ҹ�͹</span></b><b><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>
  <o:p></o:p>
  </span></b></p>

<p class=MsoNoSpacing style='margin-left:54.0pt;text-indent:-18.0pt;mso-list:
l2 level2 lfo8'><![if !supportLists]><b><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif";mso-fareast-font-family:"Browallia New"'><span
style='mso-list:Ignore'>1.1<span style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></span></b><![endif]><b><span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ����֡��(��͹��ԭ��)</span></b><b><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>



<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNoSpacing><b><span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif"'>��ѡ�ٵ�ᾷ���ʵúѳ�Ե<span
style='mso-spacerun:yes'>&nbsp; </span>(<u>����</u>�Ҥ�Ԫ��������ʵ��)</span></b><b><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:-7.65pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=329 rowspan=2 style='width:246.95pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����Ԫ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 rowspan=2 style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�����Թ/�Ҥʹ��<o:p></o:p></span></b></p>  </td>
  <td width=132 colspan=2 style='width:99.25pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹��ɮ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=139 colspan=2 style='width:104.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹��Ժѵ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:67.05pt'>
  <td width=132 style='width:49.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=66 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=139 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=73 style='width:54.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b><b><span
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�͹
  ��ѡ�ٵ�ᾷ���ʵúѳ�Ե</span></b><b><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(�����Ҥ�Ԫ��������ʵ��)
  ������</span></b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
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
"Browallia New","sans-serif"'>��ѡ�ٵ�ᾷ���ʵúѳ�Ե<span
style='mso-spacerun:yes'>&nbsp; </span>(<u>��¹͡</u>�Ҥ�Ԫ��������ʵ��)</span></b><b><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=329 rowspan=2 style='width:246.95pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����Ԫ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 rowspan=2 style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�����Թ<o:p></o:p></span></b></p>  </td>
  <td width=132 colspan=2 style='width:99.25pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹��ɮ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=139 colspan=2 style='width:104.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹��Ժѵ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:67.05pt'>
  <td width=132 style='width:49.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=66 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=139 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=73 style='width:54.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b><b><span
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�͹��ѡ�ٵ�ᾷ���ʵúѳ�Ե</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(��¹͡�Ҥ�Ԫ��)
  ������</span></b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
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
"Browallia New","sans-serif"'>��ѡ�ٵ����� �дѺ��ԭ�ҵ�� (��������Է�������Դ�)</span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none;mso-border-alt:
 solid windowtext .5pt;mso-yfti-tbllook:1184;mso-padding-alt:0cm 5.4pt 0cm 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=329 rowspan=2 style='width:246.95pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����Ԫ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=66 rowspan=2 style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�����Թ<o:p></o:p></span></b></p>  </td>
  <td width=132 colspan=2 style='width:99.25pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹��ɮ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
  <td width=139 colspan=2 style='width:104.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹��Ժѵ�</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1;page-break-inside:avoid;height:67.05pt'>
  <td width=132 style='width:49.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=66 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=139 style='width:49.6pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>  </td>
  <td width=73 style='width:54.75pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt;height:67.05pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b><b><span
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�͹��ѡ�ٵ�����</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������Է�������Դŷ�����</span></b><span
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�Է�ҹԾ���/��ùԾ���/�ç�ҹ</span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=574 valign=top style='width:430.65pt;border-top:none;border-left:
  solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;border-right:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�дѺ��ԭ�ҵ��</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��ѡ�ٵ�...........&nbsp;
  ���..................... ����Է�����&nbsp;
  �Ԫ�......................................</span></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>
 </tr>
 <tr style='height:27.8pt'>
  <td width=574 style='width:430.65pt;border:solid windowtext 1.0pt;border-top:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt;height:27.8pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�Է�ҹԾ���/��ùԾ���/�ç�ҹ������</span></b></p>  </td>
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
"Browallia New","sans-serif"'>�ҹ�Է�ҹԾ���/��ùԾ���/�ç�ҹ </span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�Է�ҹԾ���/��ùԾ���/�ç�ҹ</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">�ӹǹ
      ��</span></p>  </td>
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
  lang="th" xml:lang="th">����ҹ�Է�ҹԾ���/��ùԾ���/�ç�ҹ������</span></b></span></p>  </td>
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
"Browallia New","sans-serif"'>�Ѻ�٧ҹ���ͺ�� Elective</span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�Ѻ�٧ҹ���ͺ�� Elective</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">�ӹǹ
      ��</span></p>  </td>
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
  lang="th" xml:lang="th">����Ѻ�٧ҹ���ͺ�� Elective������</span></b></span></p>  </td>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�������оѲ�ҡ���֡��
(��͹��ԭ��)</span></b></p>-->

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=574 valign=top style='width:430.65pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�������оѲ�ҡ���֡��</span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�������оѲ�ҡ���֡�ҷ�����</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>������Чҹ����֡��
  (��͹��ԭ��) ������</span></b></p> </td>
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
"Browallia New","sans-serif"'>��͸Ժ�� ��ҹ�������оѲ�ҡ���֡�Ҕ</span></b></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span><span
lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���ʧҹ
</span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0104-1410 <u>x</u></b>-0&nbsp;
<span lang=TH>�Ҩ�ա����������� �� ��Ǣ�ͻ������,
�����á���֡��/�����ҡ���֡��/�����������¹����͹, �Ѳ�Ң���ͺ ���&nbsp;
�ѧ����ҡ����������� �������§ҹ������ѵ��ѵ�</span></span></p>





<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>

<p class=MsoNoSpacing><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span>--></p>

<p class=MsoNoSpacing style='margin-left:54.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>1.2<span
style='font:7.0pt "Times New Roman"'>&nbsp; </span></span></b> <span lang=TH
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ����֡�� (��ѧ��ԭ��)</span></b></p>

<!--<p class=MsoNoSpacing style='margin-left:78.0pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�͹</span></b></p>-->

<!--<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>-->

<p class=MsoNoSpacing> <span lang=TH style='font-size:16.0pt;font-family:
"Browallia New","sans-serif";color:#333333;letter-spacing:.2pt;background:white'>�֡ͺ��ᾷ���ШӺ�ҹ�������ʵ��
</span></b>/ <span style="font-size:16.0pt;font-family:
&quot;Browallia New&quot;,&quot;sans-serif&quot;;color:#333333;letter-spacing:.2pt;background:white;">ᾷ���ШӺ�ҹ����ʹ/ᾷ��������
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��ѡ�ٵ�/�Ԫ�/�Ԩ����</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=62 rowspan=2 style='width:46.15pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>�����Թ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=170 colspan=3 valign=top style='width:127.5pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext 1.5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��. �͹��ɮ�</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=170 colspan=3 valign=top style='width:127.5pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��. �͹��Ժѵ�</span></b><b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>�������</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>�͹</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.5pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-right-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>���Чҹ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;mso-border-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext 1.5pt;padding:
  0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>�������</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>�͹</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";color:#333333;
  letter-spacing:.2pt;background:white'><o:p></o:p></span></b></p>  </td>
  <td width=57 style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  color:#333333;letter-spacing:.2pt;background:white'>���Чҹ</span></b><b><span
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
  "Browallia New","sans-serif"'>�Ԩ�����ҧ�Ԫҡ��</span></b><b><span
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
  "Browallia New","sans-serif"'>�͹��ɮ�</span></b><b><span style='font-size:
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
  "Browallia New","sans-serif"'>�͹��Ժѵ�</span></b><b><span style='font-size:
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
  "Browallia New","sans-serif"'>����ͺ</span></b><b><span style='font-size:
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
  "Browallia New","sans-serif"'>�͡����ͺ/��Ǩ����ͺ</span></b><b><span
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����֡ͺ��ᾷ���ШӺ�ҹ����ʹ</span></b><b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><b><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>/ᾷ��������
  (�Ң��Ԫ��) ������</span></b><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
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
"Browallia New","sans-serif"'>�ҹ�Է�ҹԾ���/��ùԾ���/�ç�ҹ </span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span class="MsoNoSpacing" style="text-align:center"><span style='font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;'
  lang="th" xml:lang="th">�ҹ�Է�ҹԾ���/��ùԾ���/�ç�ҹ</span></b></span></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">�ӹǹ
      ��</span></p>  </td>
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
  lang="th" xml:lang="th">����ҹ�Է�ҹԾ���/��ùԾ���/�ç�ҹ������</span></b></span></p>  </td>
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
"Browallia New","sans-serif"'>�Ѻ�٧ҹ���ͺ�� Elective</span></b><b><span style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'><o:p></o:p></span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�Ѻ�٧ҹ���ͺ�� Elective</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">�ӹǹ
      ��</span></p>  </td>
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
  lang="th" xml:lang="th">����Ѻ�٧ҹ���ͺ�� Elective������</span></b></span></p>  </td>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�������оѲ�ҡ���֡��
(��ѧ��ԭ��)</span></b></p>-->
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=124 valign=top style='width:92.7pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  color:#333333;letter-spacing:.2pt;background:white'>�֡ͺ��ᾷ���ШӺ�ҹ����ʹ/ᾷ��������</span></p>
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
  "Browallia New","sans-serif"'>�����á���֡��/�����ҡ���֡��/�����������¹����͹</span></b></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´......
  <span style='background:yellow'>(���Чҹ���������������� </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>2</u></b>-0<span lang=TH> ������)</span></span></p>
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
  "Browallia New","sans-serif"'>�Ѳ�Ң���ͺ</span></b></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´......
  <span style='background:yellow'>(���Чҹ���������������� </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>3</u></b>-0<span lang=TH> ������)</span></span></p>
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
  "Browallia New","sans-serif"'>�Ǻ�����ý֡ͺ��/�٧ҹ/�����ɳ�</span></b></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´......
  <span style='background:yellow'>(���Чҹ���������������� </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>4</u></b>-0<span lang=TH> ������)</span></span></p>
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
  "Browallia New","sans-serif"'>��Ǩ������ʹ���ͺ</span></b></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´......
  <span style='background:yellow'>(���Чҹ���������������� </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>6</u></b>-0<span lang=TH> ������)</span></span></p>
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
  "Browallia New","sans-serif"'>��Ъ���Ѵ�Թ�š���ͺ</span></b></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´......
  <span style='background:yellow'>(���Чҹ���������������� </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";letter-spacing:
  .2pt;background:yellow'>0206-2610 <u>7</u></b>-0<span lang=TH> ������)</span></span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�������оѲ�ҡ���֡�ғ��ѧ��ԭ�Ҕ
  ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>������Чҹ�͹��ѧ��ԭ�ҷ�����
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�͹������</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(�ҹ����֡�ҡ�͹��ԭ��
  + �ҹ����֡����ѧ��ԭ��)</span></b></p>  </td>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�Ԩ��</span></b></p>

<p class=MsoNoSpacing style='margin-left:49.65pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ç����Ԩ�·����ѧ���Թ���</span></b></p>




<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='margin-left:0pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=541 style='width:35.5pt;border:solid windowtext 1.0pt;background:
  #DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=493 style='width:370.1pt;border:solid windowtext 1.0pt;border-left:
  none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�����ç����Ԩ��</span></b></p>  </td>
  <td width=85 valign=top style='width:63.4pt;border:solid windowtext 1.0pt;
  border-left:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ���ҷ����
  (��.)</span></b></p>  </td>
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
  �ç����Ԩ�� : <?=$topic_detail?> &nbsp;&nbsp;/ <?=$topic_eng?>  &nbsp;
  <?
  echo "(".$rec["datetime_start"] . " - " .$rec["datetime_end"] . ")";
  ?>
  <br />
  <?
  $arr_research = Array("","���˹���ç���","��������Ԩ��","����֡��");
  ?>
  ���ҷ : <?=$arr_research[$rec["emp_research"]]?>
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
 // ��� 6 ��͹����͹ ���Ǥ��¤ӹǹ
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ��������ç����Ԩ�·�����</span></b></p>  </td>
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
"Browallia New","sans-serif";background:yellow'>��͸Ժ���������
��ç����Ԩ�·����ѧ���Թ��Ô</span></u></p>
<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>�ҡ���͡�������ç����� ��ç����Ѻ������áԨ��¹͡
(����ѷ��)� ������Դ���Чҹ���ҹ�Ԩ�� ���������ҹ��ԡ���Ԫҡ��᷹</span></p>-->

<p class=MsoNoSpacing><span style='font-size:8.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;</span></p>


<p class=MsoNoSpacing style='margin-left:49.65pt;text-indent:-14.2pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ŧҹ�Ԩ�·�����Ѻ��õվ����</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=605 valign=top style='width:16.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���ͼŧҹ�Ԩ�·�����Ѻ��õվ����</span></b></p>  </td>
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
 echo "���ͺ����� ".$rec["topic_detail"]  ." :  " . $rec["topic_eng"] ;
 echo "<br>����������  ".$rec["name"].
 "  �շ������ ".$rec["book_year"].".   ;�������  ". $rec["book_num1"]." ��Ѻ ".$rec["book_num2"] ." �ͧ������:".$rec["page_start"] ." - ".$rec["page_end"] ."."
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�觵���/˹ѧ���/������觾����</span></b></p>


<!--<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=605 valign=top style='width:16.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�觵���/˹ѧ���/������觾����</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=539 style='width:404.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�觵���/˹ѧ���/������觾����</span></b></p>  </td>
  <td width=65 style='width:48.4pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  (��.)</span></b></p>  </td>
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
 "  �շ������ ".$rec["book_year"].".   ;�������  ". $rec["book_num1"]." ��Ѻ ".$rec["book_num2"] ." �ͧ������:".$rec["page_start"] ." - ".$rec["page_end"] ."."
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ������� �ҹ�觵���/˹ѧ���/������觾����</span></b></p>  </td>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>��óҸԡ��/�ͧ��óҸԡ��</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=593 height="50" style='width:40.85pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=539 style='width:404.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��óҸԡ��/�ͧ��óҸԡ��</span></b></p>  </td>
  <td width=65 style='width:48.4pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  (��.)</span></b></p>  </td>
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
 "  �շ������ ".$rec["book_year"].".   ;�������  ". $rec["book_num1"]." ��Ѻ ".$rec["book_num2"] ." �ͧ������:".$rec["page_start"] ." - ".$rec["page_end"] ."."
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ������� �ҹ�觵���/˹ѧ���/������觾����</span></b></p>  </td>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ���Է�Ժѵ�/͹��Է�Ժѵ� (��ѵ����/��觻�д�ɰ�)</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=605 valign=top style='width:16.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´�ŧҹ���Է�Ժѵ�/͹��Է�Ժѵ�</span></b></p>  </td>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>��ù��ʹͼŧҹ㹷���Ъ���Ԫҡ��
</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=593 style='width:40.85pt;border:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=539 style='width:404.0pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´��ù��ʹͼŧҹ</span></b></p>  </td>
  <td width=65 style='width:48.4pt;border:solid windowtext 1.0pt;border-left:
  none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  (��.)</span></b></p>  </td>
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
  
  ���ͼŧҹ�Ԩ��</span></b> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>:</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <?=$topic_detail?></span></p>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>���͡�û�Ъ��</span></b> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>:</span></b><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'> <?=$meet_name?></span></p>
  <!--<p class=MsoNoSpacing> 
  <span lang=TH style='font-size:14.0pt;font-family: "Browallia New","sans-serif"'>�ѡɳС�ù��ʹ�</span></b> 
  <span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>:</span></b>
  <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  xxxxxxxxxxxxxxxxxxxxxxxxxxxxx <span lang=TH style='background:yellow'>(������, ������, ����)</span></span></p>
  -->
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ѹ�����ʹͼŧҹ</span></b> <span
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ���������ù��ʹͼŧҹ㹷���Ъ���Ԫҡ�÷�����</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�Ԩ�·�����</span></b></p>  </td>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��ԡ�÷ҧ�Ԫҡ��</span></b></p>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:14.0pt;
font-family:"Browallia New","sans-serif"'>3.1<span lang=TH>&nbsp;
�ҹ��ԡ�÷ҧ�Ԫҡ�÷�軯Ժѵ��繻�Ш�</span></span></p>

<p class=MsoNoSpacing style='margin-left:99.25pt;text-indent:-42.55pt'> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>- �ҹ��ԡ�ü����¹͡</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470  colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>  </td>
<!--  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�Ң��Ԫ��</span></u></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��Թԡ੾�зҧ
  <span style='background:yellow'>(���ʷء���ҧ����� </span></span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0301-31102-01- xxxx</b>)<span lang=TH>&nbsp; ��������¤�Թԡ
  ������ա��÷Ѵ���</span></span></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��Թԡ....................</span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ��ҹ��ԡ�ü����¹͡� ������</span></b></p>  </td>
 
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��ԡ�ü������</span></b></p>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td  colspan="2"  width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>  </td>
 
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">����ӹǹ�������
        ��ҹ��ԡ�ü�����㹔 ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��ǹ��ҧ</span></u></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�Ҩ�����ӹ�¡���ͼ�����
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
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�Ң��Ԫ��</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>(�ҡ㹧ҹ���´�ҹ��ҧ�� </span><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif";background:yellow'>sub <span
  lang=TH>�ҹŧ��ա ����ͧ�ʴ����������ӹǹ ��. ������)</span></span></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>Attending
  <span lang=TH>˹��� </span></span></p>
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
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ���ż������Ѻ��֡���Ҥ�Ԫ�/</span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>ward <span
  lang=TH>�����</span></span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ��ҹ��ԡ�ü�����㹔 ������</span></b></p>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ѵ�����ԹԨ���
/ �ѵ�����ѡ��</span></b></p>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>  </td>
 <!-- <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'></span></b></p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">����ӹǹ���������ѵ�����ԹԨ���
        / �ѵ�����ѡ�Ҕ ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>��������´���������������� </span><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif";background:yellow'>0303-33102-02-0
  <span lang=TH>������ ����¡�͡����Ǣ��</span></span></p>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ѵ����............................</span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ���������ѵ�����ԹԨ���
  / �ѵ�����ѡ�Ҕ ������</span></b></p>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�Ǻ�����õ�Ǩ�ҧ��ͧ��Ժѵԡ��</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 valign=top colspan="2" style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>  </td>
 <!-- <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'>&nbsp;</p>  </td>-->
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">����ӹǹ���������Ǻ�����õ�Ǩ�ҧ��ͧ��Ժѵԡ�Ô
        ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ء���Чҹ����������������
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0304-34102-0
  <span lang=TH>������ <span style='background:yellow'>(��觢�й���ѧ��������Чҹ�����ҡ�����
  ������ѭ�ѡɳ� (-) ������)</span></span></span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ���������Ǻ�����õ�Ǩ�ҧ��ͧ��Ժѵԡ�Ô
  ������</span></b></p>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�������оѲ�Ҥس�Ҿ�ҹ��ԡ�÷ҧ���ᾷ��</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=470 colspan="2" valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>  </td>
 
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">����ӹǹ���������ҹ�������оѲ�Ҥس�Ҿ�ҹ��ԡ�÷ҧ���ᾷ��
        ������</span></b></p>  </td>
  
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
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">����ҹ��ԡ�÷ҧ���ᾷ�������
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ</span></b></p>
  </td>
  <td width=81 valign=top style='width:60.9pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=470 valign=top style='width:352.7pt;border:solid windowtext 1.0pt;
  border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��ǹ��ҧ</span></u></p>
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
  </span></span><u><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�Ң��Ԫ��</span></u></p>
  <p class=MsoNoSpacing style='margin-left:2.0cm;text-indent:-14.15pt'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>-<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ء���Чҹ����������������
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0305-35102-0
  <span lang=TH>������ <span style='background:yellow'>(��觢�й���ѧ��������Чҹ�����ҡ�����
  ������ѭ�ѡɳ� (-) ������)</span></span></span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ���������ҹ�������оѲ�Ҥس�Ҿ�ҹ��ԡ�Ô
  ������</span></b></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ��ԡ�÷ҧ���ᾷ�������</span></b></p>  </td>
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
lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��ԡ�÷ҧ�Ԫҡ�÷�軯Ժѵ��繤��駤���</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�Ԫҡ��</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=555 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��Ъ���Ԫҡ��</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�Է�ҡú�����</span></u></p>  </td>
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
  ����ͧ :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;�<?=$rec["meet_name"]?>
&nbsp;&nbsp; � &nbsp;
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ��Է�ҡú���� ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�����Թ�����Ի���/���������Ի���</span></u></p>  </td>
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
  ����ͧ :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;�
<?=$rec["meet_name"]?>
&nbsp;&nbsp; � &nbsp;
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ������Թ�����Ի���/���������Ի�� ������</span></b></p>  </td>
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



 <!-- ��иҹ/��иҹ���� -->

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>��иҹ/��иҹ����</span></u></p>  </td>
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
  ����ͧ :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;�
<?=$rec["meet_name"]?>
&nbsp;&nbsp; � &nbsp;
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ���иҹ/��иҹ����� ������</span></b></p>  </td>
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

  <!-- �ͧ��иҹ -->

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ͧ��иҹ</span></u></p>  </td>
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
  ����ͧ :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;�
<?=$rec["meet_name"]?>
&nbsp;&nbsp; � &nbsp;
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ���иҹ/��иҹ����� ������</span></b></p>  </td>
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


 <!-- ����֡�� -->

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>����֡��</span></u></p>  </td>
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
  ����ͧ :
    <?=$rec["topic_detail"]?>
&nbsp;&nbsp;�
<?=$rec["meet_name"]?>
&nbsp;&nbsp; � &nbsp;
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  �����֡�Ҕ ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�����Թ�����Ի���/���������Ի���</span></u><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>(��������´������������ </span><span style='font-size:
  14.0pt;font-family:"Browallia New","sans-serif";background:yellow'>0401-41101- <u>02</u></b>)
  <span lang=TH>������</span></span></p>  </td>
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
  "Browallia New","sans-serif"'>����ͧ</span></b><span lang=TH  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>....................................&nbsp;
   �</b>..........���ͧҹ...........  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�. ���仾ٴ)</span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ������Թ�����Ի���/���������Ի�� ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>������ô��Թ���</span></u><span lang=TH   style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'><!--(��������´������������ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>0401-41101- <u>03</u></b>)
  <span lang=TH>������--></span></p>  </td>
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
  "Browallia New","sans-serif"'>�����Թ�����Ի���/���������Ի���</span></u></p>  </td>
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
&nbsp;&nbsp; � &nbsp;
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��û�Ъ��...............................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  �������ô��Թ��Ô ������</span></b></p>  </td>
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
  
  ����ӹǹ
  ��ҹ��Ъ���Ԫҡ�Ô ������
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>-->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ�������ͧ���/��Ҥ��ԪҪվ</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�ҹ��Ъ����ҧ�</span></u><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'><!--(��������´������������ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>0401-41102- <u>02</u></b>)
  <span lang=TH>������</span>--></span></p>  </td>
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
//��ǹ�����������Ҥ�� and a.task_flag is null and e.emp_status !='0' �ѹ��� 6/10/2558
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
  "Browallia New","sans-serif"'><?=$rec["meet_name"]?>&nbsp;&nbsp; �&nbsp;<?=$rec["place"]?> &nbsp;(<?=$rec["date_start"]?>) 
  <!--��������´��û�Ъ��</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ъ��)-->
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
  <!--�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��Ъ����С�����ú�������Ҥ����Ե�Է����觻������
  ���駷�� 1/2557&nbsp; � ��ͧ���Ϳ�� �֡��Ҥ����Ե�Է�� (16/07/57)-->
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ��ҹ��Ъ����ҧ� ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�ҹ��ç���˹�</span></u><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'><!--(��������´��������� </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>InfoMed Version
  1.0<span lang=TH>੾�л����� �����������Ҥ��ԪҪվ</span>)--></span></p>  </td>
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
  echo $rec["groupname"] . "   ���˹�  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
   if($rec["dateend"]=="1900-01-01") 
  {
   echo " �Ѩ�غѹ )";
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><!--���ͤ�С������&nbsp;
   ���˹�</b>&nbsp; (���з���ç���˹�)</span></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��С�����ú�������Ҥ����Ե�Է����觻������
  ���˹� �ػ��¡��Ҥ� (01/01/2550-�Ѩ�غѹ)</span>--></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><!--xx.x</span></p>
  <p class=MsoNoSpacing align=center style='text-align:center'><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>(�ӹǹ ��. / ��͹ �ҡ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>InfoMed V. 1)--></span></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border:solid windowtext 1.0pt;
  border-top:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  �</span></b> <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�<span
  lang=TH>�ҹ��ç���˹觔 ������</span></span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ
  ��ҹ�������ͧ���/��Ҥ��ԪҪվ� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�Ҩ�������� (�͡����Է�����)</span></b></p>  </td>
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
    <?=$rec["topic_detail"]?>&nbsp;�&nbsp;
	<?=$rec["place"]?>&nbsp;(<?=$rec["date_start"]?>) </span>
  <!--��������´��û�Ъ��</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ъ��)-->
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
  "Browallia New","sans-serif"'>��������´���任�Ժѵ�</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></p>  </td>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�͹����Ԫ������ӺѴ
  1&nbsp; ��ѡ�֡��ᾷ�줳����Ǫ��ʵ�� ����ŧ�ó�����Է�����&nbsp; �
  ��ͧ���¹ 1408&nbsp; ��� 14&nbsp; ������Ǫ��ʵ�� ����ŧ�ó�����Է����� (08/05/57)</span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ��Ҩ�������� (�͡����Է�����)� ������</span></b></p>  </td>
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
  lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ
  ��ҹ�Ԫҡ�Ô ������</span></b></p>  </td>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>��������������</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
	&nbsp;� &nbsp;
    <?=$rec["place"]?> 
	&nbsp;(<?=$rec["datetime_start"]?> - <?=$rec["datetime_end"]?>)
	</span>
  <!--��������´��û�Ъ��</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ъ��)-->
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
 "  �շ������ ".$rec["book_year"].".   ;�������  ". $rec["book_num1"]." ��Ѻ ".$rec["book_num2"] ." �ͧ������:".$rec["page_start"] ." - ".$rec["page_end"] ."."
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´��軯Ժѵ�&nbsp;
  � ...............ʶҹ���........................ (�ѹ/��͹/�� ����)</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>((���Ǣ�͹����������䫵�, �÷�ȹ�, �Է��,
  ˹ѧ��;���� ����������¡����Ǣ������ �������ѹ����))</span></p>  </td>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ѹ�֡෻��¡��
  �����������Ҫ�&nbsp; ��Ǣ�� ��÷ҹ������˹����͹&nbsp; � ��ͧ�ѹ�֡෻
  ����Ҩ���������Ҫ þ.�����Ҫ (01/08/57)</span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ��������������� ������</span></b></p>  </td>
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
 ��ԡ�ô�ҹ��õ�Ǩ�ͺ/�ԹԨ���/�����Թ/��Ǩ�Ѻ�ͧ�س�Ҿ</b></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
&nbsp;&nbsp;� 
    <?=$rec["place"]?>
	&nbsp;(<?=$rec["datetime_start"]?>)
	 </span>
  <!--��������´��û�Ъ��</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ъ��)-->
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´��軯Ժѵ�&nbsp;
  � ...............ʶҹ���........................ (�ѹ/��͹/�� ����)</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>((���Ǣ�͹���������ŧ��ա ����������¡����Ǣ������
  �������ѹ����))</span></p>  </td>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��Ǩ�����Թ�س�Ҿ����֡��
  ���ᾷ���ʵ�� ����Է����¸�����ʵ��&nbsp; � ���ᾷ���ʵ��
  ����Է����¸�����ʵ�� (02/05/57)</span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ���ԡ�ô�ҹ��õ�Ǩ�ͺ/�ԹԨ���/�����Թ/��Ǩ�Ѻ�ͧ�س�Ҿ� ������</span></b></p>  </td>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>��ԡ���֡��/�Ԩ��</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
&nbsp;&nbsp;�&nbsp;
    <?=$rec["place"]?> (<?=$rec["datetime_start"]?>) </span>
  <!--��������´��û�Ъ��</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ъ��)-->
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ�ء���ҧ������������
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0404-0-0&nbsp;
  <span lang=TH style='background:yellow'>((���Ǣ�͹���������ŧ��ա ����������¡����Ǣ������
  �������ѹ����))</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´��軯Ժѵ�
  &nbsp;� ...............ʶҹ���........................ (�ѹ/��͹/�� ����)</span></p>  </td>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������Ѵ�Թ�š�û�СǴ�ŧҹ�Ԩ�¢ͧᾷ���ШӺ�ҹ&nbsp;
  � ��ͧ��Ъ��������԰ �ѧʴ���� 4&nbsp; �֡��Ҥ���¾ҳԪ�� ��� 2 (28/07/57)</span></p>  </td>
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
  "Browallia New","sans-serif"'>�ç����Ԩ���Ѻ������áԨ��¹͡ (����ѷ��)</span></b></p>  </td>
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
  �ç����Ԩ�� : <?=$topic_detail?> &nbsp;&nbsp;/ <?=$topic_eng?>
  <br />
  <?
  $arr_research = Array("","���˹���ç���","��������Ԩ��","����֡��");
  ?>
  ���ҷ : <?=$arr_research[$rec["emp_research"]]?>
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
  "Browallia New","sans-serif"'>����ѹ������Ǣ�ͷ��份ҡ����� ��ҹ�Ԩ�
  �����ѹ�֧��� <span style='background:yellow'>��ç����Ѻ������áԨ��¹͡
  (����ѷ��)�</span> ����������������</span></u></b></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ٻẺ����ʴ������šó��ç����Ԩ���Ѻ������áԨ��¹͡
  (����ѷ��)</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>........................�����ç����Ԩ��............................................</span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ���ԡ���֡��/�Ԩ� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ��ԡ���Ԫҡ�÷����</span></b></p>  </td>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�������оѲ�ҧҹ��ԡ���Ԫҡ��</span></b></p>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
&nbsp;&nbsp;�&nbsp;
    <?=$rec["place"]?> &nbsp;
	 (<?=$rec["date_start"] ;?>)
	  <!--(<?=$rec["date_start"] . ' - ' .$rec["date_end"]?>)-->
	  </span>
  <!--��������´��û�Ъ��</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ъ��)-->
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ�ء���ҧ������������
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>0404-0-0&nbsp;
  <span lang=TH style='background:yellow'>((���Ǣ�͹���������ŧ��ա ����������¡����Ǣ������
  �������ѹ����))</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´��軯Ժѵ�
  &nbsp;� ...............ʶҹ���........................ (�ѹ/��͹/�� ����)</span></p>  </td>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������Ѵ�Թ�š�û�СǴ�ŧҹ�Ԩ�¢ͧᾷ���ШӺ�ҹ&nbsp;
  � ��ͧ��Ъ��������԰ �ѧʴ���� 4&nbsp; �֡��Ҥ���¾ҳԪ�� ��� 2 (28/07/57)</span></p>  </td>
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
  "Browallia New","sans-serif"'>����ѹ������Ǣ�ͷ��份ҡ����� ��ҹ�Ԩ�
  �����ѹ�֧��� <span style='background:yellow'>��ç����Ѻ������áԨ��¹͡
  (����ѷ��)�</span> ����������������</span></u></b></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ٻẺ����ʴ������šó��ç����Ԩ���Ѻ������áԨ��¹͡
  (����ѷ��)</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>........................�����ç����Ԩ��............................................</span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ�������
  ��������оѲ�ҧҹ��ԡ���Ԫҡ�Ô ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ��ԡ���Ԫҡ�÷����</span></b></p>  </td>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��áԨ����� </span></b></p>
<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
&nbsp;&nbsp;�&nbsp;
    <?=$rec["place"]?> &nbsp;
	 (<?=$rec["date_start"] ;?>)
	  <!--(<?=$rec["date_start"] . ' - ' .$rec["date_end"]?>)-->
	  </span>
  <!--��������´��û�Ъ��</span></b><span lang=TH
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...................................&nbsp;
   �</b> ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ъ��)-->
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ������� ��ҹ��áԨ����ɔ ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ��ԡ�÷ҧ�Ԫҡ�÷�����</span></b></p>  </td>
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
"Browallia New","sans-serif";background:yellow'>��͸Ժ�����������äԴ�����Թ�ҧ
����Чҹ�ҹ��ԡ���Ԫҡ�Ô</span></u></p>

<p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span
style='background:yellow'>�ó����͡����Թ�ҧ��</span></span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>�����ç��Һ�������Ҫ&nbsp; </span><span style='font-size:
14.0pt;font-family:"Browallia New","sans-serif";background:yellow'>: <span
lang=TH>���Դ�����Թ�ҧ ��Ժѵ�����������ҹ��</span></span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>��ا෾��ҹ����л������</span></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>��Ժѵԧҹ�����ԧ ������Թ 3 ��.&nbsp; �Դ�Թ�ҧ�٧�ش��
3 ��. �� ��Ժѵ� 30 �ҷ� �Դ�� 3 ��.</span></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>��Ժѵ��ҡ���� 3 ��.&nbsp; �Դ�Թ�ҧ����Թ 6 ��.</span></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>��ҧ�ѧ��Ѵ</span></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
yellow'>-<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
background:yellow'>�����Ҩл�Ժѵ����������ѹ���� �Դ�Թ�ҧ����Թ 6
��.&nbsp; �� �����·����§���� 2 ��. �Դ�� 6 ��.</span></p>--></p>
<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'> <span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>4.<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></b> <span
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�Ԩ�����ѡ�֡��</span></b></p>

<p class=MsoNoSpacing style='margin-left:36.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�дѺ�Ң��Ԫ��</span></b></p>




<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
   <?=$rec["task_detail"] . "  � " . $rec["place"]  . " (" . $rec["date_start"].")"?>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  "Browallia New","sans-serif"'>��ѧ��ԭ��</span></b></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����.................&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ��������ҹ�Ԩ�����ѡ�֡��
  �дѺ�Ң��Ԫ�� ������</span></b></p>  </td>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�дѺ�Ҥ�Ԫ��
(��ǹ��ҧ)</span></b></p>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  "Browallia New","sans-serif"'>��ѧ��ԭ��</span></b></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����.................&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">����ӹǹ��������ҹ�Ԩ�����ѡ�֡��
        �дѺ����/����Է����� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>
  </td>
 </tr>
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>��͹��ԭ��</span></b></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>............�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)&nbsp; <span style='background:yellow'>(��Ǣ�͹��������Ч������ŧ��ա
  ����������¡��� �������ѹ����)</span></span></span></p>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  "Browallia New","sans-serif"'>��ѧ��ԭ��</span></b></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)<span style='background:yellow'>(��Ǣ�͹��������Ч������ŧ��ա
  ����������¡��� �������ѹ����)</span></span></span></p>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ��������ҹ�Ԩ�����ѡ�֡��
  �дѺ��ǹ��ҧ ������</span></b></p>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�дѺ����/����Է�����</span></b></p>


<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  <?=$rec["task_detail"] . "  � " . $rec["place"]  . " (" . $rec["date_start"].")"?>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  "Browallia New","sans-serif"'>��ѧ��ԭ��</span></b></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����.................&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">����ӹǹ��������ҹ�Ԩ�����ѡ�֡��
        �дѺ����/����Է����� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�Ԩ�����ѡ�֡�ҷ�����</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>
  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>
  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>
  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>��͹��ԭ��</span></b></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>............�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)&nbsp; <span style='background:yellow'>(��Ǣ�͹��������Ч������ŧ��ա
  ����������¡��� �������ѹ����)</span></span></span></p>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  "Browallia New","sans-serif"'>��ѧ��ԭ��</span></b></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�) <span style='background:yellow'>(��Ǣ�͹��������Ч������ŧ��ա
  ����������¡��� �������ѹ����)</span></span></span></p>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ӹǹ��������ҹ�Ԩ�����ѡ�֡��
  �дѺ����/����Է����� ������</span></b></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�Ԩ�����ѡ�֡�ҷ�����</span></b></p>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�ӹغ��ا��Ż�Ѳ������������Ǵ����</span></b></p>



<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none'>
 <tr>
  <td width=54 valign=top style='width:40.85pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=501 valign=top style='width:375.65pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=104 valign=top style='width:77.95pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  echo $rec["topic_detail"]." � ". $rec["place"]." &nbsp;(".$rec["date_start"].")";
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  "Browallia New","sans-serif"'>��ѧ��ԭ��</span></b></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����.................&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>
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
  "Browallia New","sans-serif"'>�ٻẺ����ʴ�������</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������Ҩ�������֡�ҹѡ�֡��ᾷ��
  㹡�èѴ�Է��ȡ����Ż� � ����ùѡ�֡��ᾷ��&nbsp; ��� 2&nbsp; (18/05/57)</span></p>
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
  <p class=MsoNoSpacing align=center style='text-align:center'> <span style="font-size:14.0pt;font-family:&quot;Browallia New&quot;,&quot;sans-serif&quot;">����ҹ�ӹغ��ا��Ż�Ѳ������������Ǵ����������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�ӹغ��ا��Ż�Ѳ������������Ǵ����������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>
  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>
  </td>
  <td width=113 valign=top style='width:3.0cm;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>
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
  background:yellow'>���Чҹ�ء���ҧ���������������� </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0700- -1- -1&nbsp; <span lang=TH>����ѹ�¡�����Чҹ����ŧ��ա��
  �������������¡��� ��������� �������������</span></span></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�) <span style='background:yellow'>(��Ǣ�͹��������Ч������ŧ��ա
  ����������¡��� �������ѹ����)</span></span></span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�ӹغ��ا��Ż�Ѳ������������Ǵ����������</span></b></p>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ������</span></b></p>

<p class=MsoNoSpacing style='margin-left:72.0pt;text-indent:-18.0pt'><span
style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>-<span
style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��Ъ��</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�дѺ�Ң��Ԫ��</span></b></p>  </td>
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
 <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'><?=$task_name?><!--���Чҹ�ء���ҧ���������������� --></span>
  <!-- <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0801-81102-01</span></b><span lang=TH style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>�óշ�������Чҹ����ŧ�
  ���繪��͡�û�Ъ�����ǡѹ ���ǡ�ӹǹ ��. �ҹ���¹������ѹ���ǡѹ</span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  ����</span></p>-->
  <!--<p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>������ҧ������͡���ش</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��Ъ���Ң��Ԫ��</span></p>-->
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��Ъ���дѺ�Ң��Ԫ�ϔ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 <tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�дѺ�Ҥ�Ԫ�� (��ǹ��ҧ)</span></b></p>  </td>
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
  ���Чҹ�ء���ҧ���������������� 
  
   <span  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0801-81101-01</span></b><span lang=TH style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>����ѹ�¡�����Чҹ����ŧ��ա��
  �������������¡��� ��������� ����Һǡ�����</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>-->
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��Ъ����á���Ҥ�Ԫ��������ʵ��</span></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��Ъ����С�����ú������Ҥ�Ԫ��������ʵ��</span></p>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��Ъ����С�����ú����ü������
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��Ъ������</span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��Ъ���дѺ�Ҥ�Ԫ�ϔ ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��Ъ���&nbsp; ������</span></b></p>  </td>
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
</span></span> <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��ç���˹�</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�дѺ�Ң��Ԫ��</span></b></p>  </td>
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
  echo $rec["groupname"] . "   ���˹�  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
   if($rec["dateend"]=="1900-01-01") 
  {
   echo " �Ѩ�غѹ )";
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��ç���˹��дѺ�Ң��Ԫ�ϔ ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�дѺ�Ҥ�Ԫ�� (��ǹ��ҧ)</span></b></p>  </td>
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
  echo $rec["groupname"] . "   ���˹�  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
   if($rec["dateend"]=="1900-01-01") 
  {
   echo " �Ѩ�غѹ )";
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ��ç���˹�
  �дѺ�Ҥ�Ԫ�� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��ç���˹觔&nbsp; ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ�������дѺ�Ҥ�ԪҔ <a name="_GoBack"></a>������</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(�ҹ��Ъ��
  + �ҹ��ç���˹�)</span></b></p>  </td>
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
lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ����
������Ѻ�ͺ����</span></b></p>

<p class=MsoNoSpacing style='margin-left:36.0pt'><span style='font-size:16.0pt;
font-family:"Browallia New","sans-serif"'>7.1<span lang=TH>&nbsp; �ҹ�Ѳ�ҵ��ͧ</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 
 
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�дѺ�Ҥ�Ԫ��</span></b></p>  </td>
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
  echo "&nbsp;�&nbsp;".$rec["place"] .'&nbsp;&nbsp;(' . $rec["date_start"]. ' - ' . $rec["date_end"] . " )";
  
  ?>
 <!-- �ء���ҧ����������������&nbsp; </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0901-91101-0<span lang=TH>&nbsp;
  ��觨������Чҹ����ŧ��ա�繴�ҹ� �����������Ҥ�� ��������������</span>--></span></p>
  <!--<p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........�֧�ҡ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>-->  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ�Ѳ�ҵ��ͧ �дѺ�Ҥ�Ԫ�ϔ ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�дѺ����/����Է�����</span></b></p>  </td>
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
  echo "&nbsp;�&nbsp;".$rec["place"] .'&nbsp;&nbsp;(' . $rec["date_start"] .' - ' .$rec["date_end"]. ")";
  ?>
<!--  �ء���ҧ����������������&nbsp; </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0901-91102-0<span lang=TH>&nbsp;
  ��觨������Чҹ����ŧ��ա�繴�ҹ� �����������Ҥ�� ��������������</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........�֧�ҡ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span>--></span></p></td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ�Ѳ�ҵ��ͧ �дѺ����/����Է���� ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�дѺ�͡����Է�����</span></b></p>  </td>
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
			echo "&nbsp;�&nbsp;".$rec["place"] .'&nbsp;&nbsp;'.$rec["task_travel_detail"] .'&nbsp;&nbsp;(' . $rec["date_start"] .' - ' .  $rec["date_end"] . ")";
  
  ?>
  </span>
    <!-- �ء���ҧ����������������&nbsp; </span><span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0901-91103-0<span lang=TH>&nbsp;
  ��觨������Чҹ����ŧ��ա�繴�ҹ� �����������Ҥ�� ��������������</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........�֧�ҡ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span>--></span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ�Ѳ�ҵ��ͧ �дѺ�͡����Է���� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ�Ѳ�ҵ��ͧ������</span></b></p>  </td>
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
�ҹ������Ѻ�ͺ���¾����੾�СԨ</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�дѺ�Ҥ�Ԫ��</span></b></p>  </td>
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
  <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$task_name?><!--�ء���ҧ����������������&nbsp;--> </span>
 <!-- <span   style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:   yellow'>0902-92101-0<span lang=TH>&nbsp; 
    ��觨������Чҹ����ŧ��ա�繴�ҹ� �����������Ҥ�� ��������������</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........�֧�ҡ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span>--></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ������Ѻ�ͺ���¾����੾�СԨ �дѺ�Ҥ�Ԫ�ϔ ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�дѺ����/����Է�����</span></b></p>  </td>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><?=$task_name?><!--�ء���ҧ����������������&nbsp; <--></span>
  <!--<span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0902-92102-0<span lang=TH>&nbsp;
  ��觨������Чҹ����ŧ��ա�繴�ҹ� �����������Ҥ�� ��������������</span></span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif";
  background:yellow'>...........�֧�ҡ </span><span style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>field <span
  lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span>--></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ������Ѻ�ͺ���¾����੾�СԨ �дѺ����/����Է���� ������</span></b></p>  </td>
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
�ҹ�������дѺ���ᾷ���ʵ�������Ҫ��Һ��</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
  <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>

  <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��Ъ��</span></b></p>  </td>
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
//echo  "<br><br>����Է����� ".$sql; ///////����Է�����//////////////////
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
  ?><!--���Чҹ�ء���ҧ���������������� -->
  </span>
  <!-- <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  0802-82102-0</span></b><span lang=TH style='font-size:14.0pt;  font-family:"Browallia New","sans-serif";background:yellow'>����ѹ�¡�����Чҹ����ŧ��ա��
  �������������¡��� ��������� ����Һǡ�����</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>-->
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��Ъ���дѺ���ᾷ���ʵ�������Ҫ��Һ�Ŕ ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�ҹ��ç���˹�</span></b></p>  </td>
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
//echo  "<br><br>����Է�����".$sql;
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
  echo $rec["groupname"] . "   ���˹�  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
  if($rec["dateend"]=="1900-01-01") 
  {
   echo " �Ѩ�غѹ )";
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��ç���˹��дѺ���ᾷ���ʵ�������Ҫ��Һ�Ŕ ������</span></b></p>  </td>
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
�ҹ�������дѺ����Է�������Դ�</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
  <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��Ъ��</span></b></p>  </td>
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
//echo  "<br><br>����Է����� ".$sql; ///////����Է�����//////////////////
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
  ?><!--���Чҹ�ء���ҧ���������������� -->
  </span>
  <!-- <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";'>
  0802-82102-0</span></b><span lang=TH style='font-size:14.0pt;  font-family:"Browallia New","sans-serif";background:yellow'>����ѹ�¡�����Чҹ����ŧ��ա��
  �������������¡��� ��������� ����Һǡ�����</span></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>-->
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��Ъ���дѺ����Է�������ԴŔ ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�ҹ��ç���˹�</span></b></p>  </td>
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
//echo  "<br><br>����Է�����".$sql;
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
  echo $rec["groupname"] . "   ���˹�  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
  if($rec["dateend"]=="1900-01-01") 
  {
   echo " �Ѩ�غѹ )";
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��ç���˹��дѺ����Է�������ԴŔ ������</span></b></p>  </td>
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
�Ѳ�ҵ��ͧ��ҹ����֡��</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
  <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>

 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ�������оѲ�ҡ���֡�� (��͹��ԭ��)</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ�������оѲ�ҡ���֡�� (��͹��ԭ��)� ������</span></b></p>  </td>
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
  "Browallia New","sans-serif"'>�ҹ�������оѲ�ҡ���֡�� (��ѧ��ԭ��)</span></b></p>  </td>
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

<!-- �͡����ͺ -->
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ�������оѲ�ҡ���֡�� (��ѧ��ԭ��)� ������</span></b></p>  </td>
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
�дѺ����/����Է�����</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>

<!-- ///ͺ���Ҩ��������/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>ͺ���Ҩ��������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  �ͺ���Ҩ�������� ������</span></b></p>  </td>
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

<!-- ///�ҹ��Ъ��/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��Ъ��</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��Ъ��� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��дѺ����/����Է���� ������</span></b></p>  </td>
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
�͡����Է�����</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  �AMEE� ������</span></b></p>  </td>
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

<!-- ///�ҹ��Ъ��/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��Ъ��</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��Ъ��� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��дѺ�͡����Է���� ������</span></b></p>  </td>
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
�Ҥ�Ԫ�</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>

<!-- ///AMEE/// -->
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>��ҹ����֡��</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ���ҹ����֡�Ҕ ������</span></b></p>  </td>
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
�Է�ҡ����������Ѳ�ҵ��ͧ��ҹ����֡��</span></span></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678
 style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��Է�ҡ����������Ѳ�ҵ��ͧ��ҹ����֡�Ҕ ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>����ҹ����
  ������Ѻ�ͺ���·�����</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>(�ҹ�Ѳ�ҵ��ͧ
  + �ҹ������Ѻ�ͺ���¾����੾�СԨ+�ҹ�������дѺ����Է�������Դ�+�ҹ�Ѳ�ҵ��ͧ����֡��)</span></b></p>  </td>
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
 <span lang=TH style='font-size:16.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�������дѺ���ᾷ���ʵ�������Ҫ��Һ��</span></b></p>

<table class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 width=678  style='width:508.65pt;border-collapse:collapse;border:none'>
 <tr>
  <td width=47 valign=top style='width:35.5pt;border:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>
 <tr>
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��Ъ��</span></b></p>  </td>
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
  <?=$rec["task_detail"] . " � &nbsp;". $rec["place"] . " &nbsp;(" .  $day . ")"?>
  <!--���Чҹ�ء���ҧ���������������� </span> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0801-81102-01</span></b><span lang=TH style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>�óշ�������Чҹ����ŧ�
  ���繪��͡�û�Ъ�����ǡѹ ���ǡ�ӹǹ ��. �ҹ���¹������ѹ���ǡѹ</span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  ����</span></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>������ҧ������͡���ش</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��Ъ���Ң��Ԫ��--></span></p>  </td>
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
  yellow'>(���ա�����͡��Ъ���Ң��Ԫ�� ���� �ѹ ��������Ǵ�������ǡѹ
  ���ǡ����ѹ����--></span></p>  </td>
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
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>...........�֧�ҡ
  </span><span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>field
  <span lang=TH>���������´�����...............&nbsp;  �</b>
  ..............(ʶҹ���)...................... (�ѹ/��͹/�� �.�.
  ���任�Ժѵ�)</span></span></p>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��Ъ���дѺ���ϔ ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>

 <tr>
 <!-- <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��ç���˹�</span></b></p>  </td>-->
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��ç���˹�</span></b></p>  </td>
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
  echo $rec["groupname"] . "   ���˹�  " . $rec["managepositiontype"] ;
   echo  "   (". $rec["datestart"] .  " - " ;
  if($rec["dateend"]=="1900-01-01") 
  {
   echo " �Ѩ�غѹ )";
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ��ç���˹��дѺ���ϔ ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӴѺ</span></b></p>  </td>
  <td width=508 valign=top style='width:381.0pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��������´</span></b></p>  </td>
  <td width=123 valign=top style='width:92.15pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ
  ��.</span></b></p>  </td>
 </tr>

 <tr>
 <!-- <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ��ç���˹�</span></b></p>  </td>-->
  <td width=555 colspan=2 valign=top style='width:416.5pt;border-top:none;
  border-left:solid windowtext 1.0pt;border-bottom:solid windowtext 1.0pt;
  border-right:none;background:#DFDFDF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing> <span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>�ҹ����</span></b></p>  </td>
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
  <?=$rec["task_detail"] . " � &nbsp;". $rec["place"] . " &nbsp;(" .  $day . ")"?>
  <!--���Чҹ�ء���ҧ���������������� </span> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif";background:
  yellow'>0801-81102-01</span></b><span lang=TH style='font-size:14.0pt;
  font-family:"Browallia New","sans-serif";background:yellow'>�óշ�������Чҹ����ŧ�
  ���繪��͡�û�Ъ�����ǡѹ ���ǡ�ӹǹ ��. �ҹ���¹������ѹ���ǡѹ</span><span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>
  ����</span></p>
  <p class=MsoNoSpacing><u><span lang=TH style='font-size:14.0pt;font-family:
  "Browallia New","sans-serif"'>������ҧ������͡���ش</span></u></p>
  <p class=MsoNoSpacing><span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��Ъ���Ң��Ԫ��--></span></p>  </td>
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
  yellow'>(���ա�����͡��Ъ���Ң��Ԫ�� ���� �ѹ ��������Ǵ�������ǡѹ
  ���ǡ����ѹ����--></span></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���
  ��ҹ���� ������</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���&nbsp;"�ҹ�������дѺ����" ������</span></b></p>
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
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'><!--�þ���&nbsp;
����¸Թ&nbsp; (�Ң��Ԫ�����ҡ�ä�Թԡ)-->
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
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��ػ���Чҹ������Ѻ�ͺ����
(������Ҫ���) ����Ѻ �ͧ�ع �����������õԔ �ع��ǹ��� </span><span
style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1</span></strong></p>

<p align=center class=MsoNoSpacing style='text-align:center'>
<strong> 
<span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�������ҵ����&nbsp;
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>��Ǣ�����Чҹ</span></b></p>  </td>
  <td width=203 height="52" colspan=2 style='width:152.3pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ� 
  </span></b> <span style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>PA<br />
  (12 ��͹ )</span></b>  </p>  </td>
  <td width=179 colspan=2 valign=top style='width:134.45pt;border:solid windowtext 1.0pt;
  border-left:none;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���Чҹ��軯Ժѵ����ԧ<br />
  (<?=$month;?> ��͹ )</span></b></p>  </td>
 </tr>
 <tr>
  <td width=203 style='width:65.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ�������</span></b></p>  </td>
  <td width=115 style='width:86.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�����С�û�Ժѵԧҹ</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���ࡳ���ҵðҹ</span></b></p>  </td>
  <td width=179 style='width:57.8pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ӹǹ�������</span></b></p>  </td>
  <td width=102 style='width:76.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�����С�û�Ժѵԧҹ</span></b></p>
  <p class=MsoNoSpacing align=center style='text-align:center'> <span
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���ࡳ���ҵðҹ</span></b></p>  </td>
 </tr>
 <tr>
  <td width=296 valign=top style='width:221.65pt;border:solid windowtext 1.0pt;
  border-top:none;background:#BFBFBF;padding:0cm 5.4pt 0cm 5.4pt'>
  <p class=MsoNoSpacing style='margin-left:19.1pt;text-indent:-19.1pt'> <span
  style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>1.<span
  style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�͹</span></b></p>  </td>
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
  14.0pt;font-family:"Browallia New","sans-serif"'>1.1<span lang=TH>&nbsp; �ҹ����֡��
  (��͹��ԭ��)</span></span></b></p>  </td>
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
  �ҹ����֡�� (��ѧ��ԭ��)</span></span></b></p>  </td>
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
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�Ԩ��</span></b></p>  </td>
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
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ��ԡ�÷ҧ�Ԫҡ��</span></b></p>  </td>
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
  �ҹ��ԡ�÷ҧ���ᾷ��</span></span></b></p>  </td>
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
  �ҹ��ԡ���Ԫҡ��</span></span></b></p>  </td>
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
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�Ԩ�����ѡ�֡��</span></b></p>  </td>
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
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�ӹغ��ا��Ż�Ѳ������������Ǵ����</span></b></p>  </td>
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
  </span></span></b> <span lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�����������Ҥ�Ԫ��</span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ����
  ������Ѻ�ͺ����</span></b></p>  </td>
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
  �ҹ�Ѳ�ҵ��ͧ</span></span></b></p>  </td>
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
  14.0pt;font-family:"Browallia New","sans-serif"'>7.2<span lang=TH>&nbsp; �ҹ������Ѻ�ͺ���¾����੾�СԨ</span></span></b></p>  </td>
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
  14.0pt;font-family:"Browallia New","sans-serif"'>7.3<span lang=TH>&nbsp; �ҹ�������дѺ���ᾷ���ʵ�������Ҫ��Һ��</span></span></b></p>  </td>
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
  14.0pt;font-family:"Browallia New","sans-serif"'>7.4<span lang=TH>&nbsp; �ҹ�������дѺ����Է�������Դ�</span></span></b></p>  </td>
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
  14.0pt;font-family:"Browallia New","sans-serif"'>7.5<span lang=TH>&nbsp; �ҹ�Ѳ�ҵ��ͧ��ҹ����֡��</span></span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>�ҹ�������дѺ���ᾷ���ʵ�������Ҫ��Һ��</span></b></p>  </td>
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
  �ҹ��Ъ��/����</span></span></b></p>  </td>
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
  �ҹ��ç���˹�</span></span></b></p>  </td>
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
  lang=TH style='font-size:14.0pt;font-family:"Browallia New","sans-serif"'>���������</span></b></p>  </td>
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
						ŧ����.................................................
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
