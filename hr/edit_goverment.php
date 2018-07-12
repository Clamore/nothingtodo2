<?
//session_start();
//$_SESSION['conf'];
//header('Content-Type: text/html; charset=utf-8');
//$chkuser = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
       <!--[if gt IE 8]><!-->
<html> <!--<![endif]-->
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
   <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <!-- Mobile viewport optimized: h5bp.com/viewport -->
   <meta name="viewport" content="width=device-width">

   <title>.: [i - MED : Staff ] ...</title>

   
   <!-- remove or comment this line if you want to use the local fonts -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>-->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

  <link rel="stylesheet" href="bootstraps/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="bootstraps/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstraps/bootstrap/3.3.7/js/bootstrap.min.js"></script>
       
	<link rel="stylesheet" href="dist/css/bootstrap-multiselect.css" type="text/css">
	<script type="text/javascript" src="dist/js/bootstrap-multiselect.js"></script>

      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrapValidator.min.css">

	  
	  <!-- <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"> -->
	  <!-- <script src="lib/1.12.0/jquery.min.js"></script> -->
	  <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->

	 <!-- <script type="text/javascript" src="scripts/bootstrap-datepicker.js"></script>
	 <script type="text/javascript" src="scripts/bootstrap-datepicker.th.js"></script> -->

	 <link href="date-th/css/datepicker.css" rel="stylesheet" media="screen">
	<script src="date-th/js/bootstrap-datepicker.js"></script>
	<script src="date-th/js/bootstrap-datepicker-thai.js"></script>
	<script src="date-th/js/locales/bootstrap-datepicker.th.js" charset="UTF-8"></script>

   <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.2.custom.css">
   <style>
   form.cmxform{width:370px;font-size:1.0em;color:#333;}
   form.cmxform legend{padding-left:0;}
   form.cmxform legend,form.cmxform label{color:#333;}
   --form.cmxform fieldset{border:none;border-top:1px solid #C9DCA6;background:url(../images/cmxform-fieldset.gif) left bottom repeat-x;background-color:#F8FDEF;}
   form.cmxform fieldset fieldset{background:none;}
   form.cmxform fieldset p,form.cmxform fieldset fieldset{padding:5px 10px 7px;background:url(../images/cmxform-divider.gif) left bottom repeat-x;}
   form.cmxform label.error,label.error{color:red;font-style:italic}
   div.error{display:none;}
   input{border:1px solid black;}
   input.checkbox{border:none}
   input:focus{border:1px dotted black;}
   input.error{border:1px dotted red;}
   form.cmxform .gray *{color:gray;}
   
   </style>

	<script type="text/javascript">
		$(document).ready(function(){
			/*$("input[id^='goverdatestart']").datepicker({
				format: 'dd/mm/yyyy',
				//todayBtn: true,
				language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
				thaiyear: true              //Set เป็นปี พ.ศ.
			});//#goverdatestart

			$("input[id^='goverdateend']").datepicker({
				format: 'dd/mm/yyyy',
				//todayBtn: true,
				language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
				thaiyear: true              //Set เป็นปี พ.ศ.
			});//#goverdateend

			$("input[id^='goverdatesign']").datepicker({
				format: 'dd/mm/yyyy',
				//todayBtn: true,
				language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
				thaiyear: true              //Set เป็นปี พ.ศ.
			});//#goverdatesign

			$("input[id^='goverdateuse']").datepicker({
				format: 'dd/mm/yyyy',
				//todayBtn: true,
				language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
				thaiyear: true              //Set เป็นปี พ.ศ.
			});//#goverdateuse

			$("input[id^='goverdateback']").datepicker({
				format: 'dd/mm/yyyy',
				//todayBtn: true,
				language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
				thaiyear: true              //Set เป็นปี พ.ศ.
			});//#goverdateback*/

			$('#managetype').change(function(){
				var managelevel = $('#managelevel').val();
				var managetype = $('#managetype').val();
				var url = "get_manageposition.php?level="+managelevel+"&type="+managetype;
				$.get(url, function(data){
					//alert(data);
					$("#manageposition").html(data);
				});//get url
			});//mtpositiontype

			$('#file').change(function(){
				var file = $('#file').val();
				var id = $('#id').val();
				//alert (file);
				var file1 = file.split('|');
				var file2 =  file1[1];
				//alert(file2);
				window.open('edit_goverment.php?chk=add&id='+id+'&num='+file2,'_self');
			});//file
		
		});
	</script>

	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput.js"></script> 

	<script type="text/javascript">
	<!--
		$.noConflict();
		jQuery(document).ready(function($){
			$("input[id^='goverdatestart']").mask("99/99/9999");
			$("input[id^='goverdateend']").mask("99/99/9999");
			$("input[id^='goverdatesign']").mask("99/99/9999");
			$("input[id^='goverdateuse']").mask("99/99/9999");
			$("input[id^='goverdateback']").mask("99/99/9999");
		});

		 function demo() {
			$('.datepicker').datepicker();
		  }
	//-->
	</script>
    
<?
  require("database.mssql.class/msdatabase.class.php");
  require("database.mssql.class/config.hr.inc.php");
  //require("function.php");//class sql
  require("function/function.php");  
  $objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);
  /*$db = new database;
  $db->con_db(); //คำสั่งเชื่อมต่อฐานข้อมูล+*/
?>
</head>

<body>

<link href="content/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<!-- <script src="lib/2.1.1/jquery.min.js"></script> -->
<script src="js/fileinput/fileinput.js" type="text/javascript"></script>
<script src="js/fileinput/fileinput_locale_fr.js" type="text/javascript"></script>
<script src="js/fileinput/fileinput_locale_es.js" type="text/javascript"></script>

<?php
$id = $_GET["id"];
$goverid = $_GET["goverid"];
$chk = $_GET["chk"];
$num = $_GET["num"];

if ($chk == "edit")
{
	$sql = "SELECT * FROM tbempgoverment AS g INNER JOIN mtfile AS f ON g.fileid=f.fileid WHERE id = '$id' AND goverid = '$goverid' ";
}
else
{
	$sql = "SELECT * FROM mtfile WHERE fileid = '$num' ";
}
$rec = $objdb->query_first($sql);
?>

<div class="bs-docs-example" style="margin-top:0px;padding:20px;">
	<fieldset>
		<legend>ประวัติรับราชการ - <?=$rec["filename"];?></legend>

		<form class="form-horizontal" method="post" role="form" name="frmMain" id="frmMain" action="edit_goverment_cmd.php">
			<input type="hidden" name="id" id="id" value="<?=$id?>">
			<input type="hidden" name="goverid" value="<?=$goverid?>">
			<input type="hidden" name="chk" value="<?=$chk?>">
			<input type="hidden" name="filenum" value="<?=$rec["filenum"]?>">
			<?php
			if ($chk == "add")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">ประเภทเอกสาร</label>
					<div class="col-sm-6">
						<select name="file" id="file"  class="form-control ">
							<option value="">กรุณาเลือก</option>
							<?php
							$sql_file = "SELECT * FROM mtfile ";
							$arr = $objdb->getArray($sql_file);
							if (count($arr) > 0)
							{
								foreach ($arr as $file)
								{
							?>
									<option value="<?=$file["filenum"]?>|<?=$file["fileid"]?>" <?php if ($rec["fileid"] == $file["fileid"]) {echo "selected";}?>><?=$file["filename"]?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
				</div><!-- from-group -->
			<?php
			}
			?>
			<div class="form-group">
				<label class="col-sm-2 control-label">เลขคำสั่ง</label>
				<div class="col-sm-6">
					<input type="text" id="governo" name="governo" value="<?=$rec["governo"];?>" placeholder="ระบุเลขคำสั่ง"  class="form-control"/>
				</div>
			</div><!-- from-group -->

			<div class="form-group">
				<label class="col-sm-2 control-label">เรื่องคำสั่ง</label>
				<div class="col-sm-6">
					<input type="text" id="govername" name="govername" value="<?=$rec["govername"];?>" placeholder="ระบุเรื่องคำสั่ง"  class="form-control"/>
				</div>
			</div><!-- from-group -->

			<div class="form-group">
				<label class="col-sm-2 control-label">หน่วยงาน</label>
				<div class="col-sm-6">
					<input type="text" id="goverunit" name="goverunit" value="<?=$rec["goverunit"];?>" placeholder="ระบุหน่วยงาน"  class="form-control"/>
				</div>
			</div><!-- from-group -->

			<div class="form-group">
				<label class="col-sm-2 control-label">วันที่ลงนาม</label>
				<div class="col-sm-6">
					<input type="text" id="goverdatesign" name="goverdatesign" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdatesign"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
				</div>
			</div><!-- from-group -->

			<div class="form-group">
				<label class="col-sm-2 control-label">หมายเหตุ</label>
				<div class="col-sm-6">
					<textarea name="governote" class="form-control"><?=$rec["governote"];?></textarea>
				</div>
			</div><!-- from-group -->

			<?php
			if ($rec["filenum"] == "1")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">ตำแหน่ง</label>
					<div class="col-sm-6">
						<select name="positionid" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<?php
							$sql_file = "SELECT * FROM mtposition WHERE status = '1' ";
							$arr = $objdb->getArray($sql_file);
							if (count($arr) > 0)
							{
								foreach ($arr as $file)
								{
							?>
									<option value="<?=$file["positionid"]?>" <?php if ($rec["positionid"] == $file["positionid"]) {echo "selected";}?>><?=$file["positionname"]?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ระยะเวลาจ้างเริ่ม</label>
					<div class="col-sm-6">
						<input type="text" id="goverdatestart" name="goverdatestart" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdatestart"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->
				<div class="form-group">
					<label class="col-sm-2 control-label">ระยะเวลาจ้างสิ้นสุด</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateend" name="goverdateend" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateend"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->
			<?php
			}
			elseif ($rec["filenum"] == "2")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">วันที่มีผลบังคับใช้</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateuse" name="goverdateuse" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateuse"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ตำแหน่ง</label>
					<div class="col-sm-6">
						<select name="positionid" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<?php
							$sql_file = "SELECT * FROM mtposition WHERE status = '1' ";
							$arr = $objdb->getArray($sql_file);
							if (count($arr) > 0)
							{
								foreach ($arr as $file)
								{
							?>
									<option value="<?=$file["positionid"]?>" <?php if ($rec["positionid"] == $file["positionid"]) {echo "selected";}?>><?=$file["positionname"]?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
				</div><!-- from-group -->
			<?php
			}
			elseif ($rec["filenum"] == "3")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">วันที่มีผลบังคับใช้</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateuse" name="goverdateuse" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateuse"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ตำแหน่ง</label>
					<div class="col-sm-6">
						<select name="positionid" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<?php
							$sql_file = "SELECT * FROM mtposition WHERE status = '1' ";
							$arr = $objdb->getArray($sql_file);
							if (count($arr) > 0)
							{
								foreach ($arr as $file)
								{
							?>
									<option value="<?=$file["positionid"]?>" <?php if ($rec["positionid"] == $file["positionid"]) {echo "selected";}?>><?=$file["positionname"]?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ประเภทการจ้าง</label>
					<div class="col-sm-6">
						<select name="typeid" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<?php
							$sql_file = "SELECT * FROM mttype WHERE status = '1' ";
							$arr = $objdb->getArray($sql_file);
							if (count($arr) > 0)
							{
								foreach ($arr as $file)
								{
							?>
									<option value="<?=$file["typeid"]?>" <?php if ($rec["typeid"] == $file["typeid"]) {echo "selected";}?>><?=$file["typename"]?></option>
							<?php
								}
							}
							?>
									</select>
					</div>
				</div><!-- from-group -->
			<?php
			}
			elseif ($rec["filenum"] == "4")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">วันที่มีผลบังคับใช้</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateuse" name="goverdateuse" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateuse"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->
				<?php
				if ($_GET["num"] == "29")
				{
				?>
					<div class="form-group">
						<label class="col-sm-2 control-label">หลักสูตร/เรื่อง</label>
						<div class="col-sm-6">
							<input type="text" id="vacname" name="vacname" value="" class="form-control"/>
						</div>
					</div><!-- from-group -->

					<div class="form-group">
						<label class="col-sm-2 control-label">ตั้งแต่วันที่</label>
						<div class="col-sm-6">
							<input type="text" id="datevacstart" name="datevacstart" data-provide="datepicker" data-date-language="th-th" value="" class="form-control"/>
						</div>
					</div><!-- from-group -->

					<div class="form-group">
						<label class="col-sm-2 control-label">ถึงวันที่</label>
						<div class="col-sm-6">
							<input type="text" id="datevacend" name="datevacend" data-provide="datepicker" data-date-language="th-th" value=""   class="form-control"/>
						</div>
					</div><!-- from-group -->

					<div class="form-group">
						<label class="col-sm-2 control-label">สถานศึกษา</label>
						<div class="col-sm-6">
							<input type="text" id="vacschool" name="vacschool" value="" class="form-control"/>
						</div>
					</div><!-- from-group -->

					<div class="form-group">
						<label class="col-sm-2 control-label">ประเทศ</label>
						<div class="col-sm-6">
							<input type="text" id="vaccountry" name="vaccountry" value="" class="form-control"/>
						</div>
					</div><!-- from-group -->

					<div class="form-group">
						<label class="col-sm-2 control-label">เมือง</label>
						<div class="col-sm-6">
							<input type="text" id="vactown" name="vactown" value="" class="form-control"/>
						</div>
					</div><!-- from-group -->

					<div class="form-group">
						<label class="col-sm-2 control-label">หมายเหตุ</label>
						<div class="col-sm-6">
							<input type="text" id="vacnote" name="vacnote" value="" class="form-control"/>
						</div>
					</div><!-- from-group -->
				<?php
				}
				?>
			<?php
			}
			elseif ($rec["filenum"] == "5")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">วันที่มีผลบังคับใช้</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateuse" name="goverdateuse" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateuse"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ตำแหน่ง</label>
					<div class="col-sm-6">
						<select name="positionid" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<?php
							$sql_file = "SELECT * FROM mtposition WHERE status = '1' ";
							$arr = $objdb->getArray($sql_file);
							if (count($arr) > 0)
							{
								foreach ($arr as $file)
								{
							?>
									<option value="<?=$file["positionid"]?>" <?php if ($rec["positionid"] == $file["positionid"]) {echo "selected";}?>><?=$file["positionname"]?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">สายงาน</label>
					<div class="col-sm-6">
						<select name="levelpositionid" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<?php
							$sql_file = "SELECT * FROM mtlevelposition WHERE status = '1' ";
							$arr = $objdb->getArray($sql_file);
							if (count($arr) > 0)
							{
								foreach ($arr as $file)
								{
							?>
									<option value="<?=$file["levelpositionid"]?>" <?php if ($rec["levelpositionid"] == $file["levelpositionid"]) {echo "selected";}?>><?=$file["levelpositionname"]?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
				</div><!-- from-group -->
			<?php
			}
			elseif ($rec["filenum"] == "6")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">วันที่มีผลบังคับใช้</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateuse" name="goverdateuse" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateuse"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ตำแหน่ง</label>
					<div class="col-sm-6">
						<select name="positionid" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<?php
							$sql_file = "SELECT * FROM mtposition WHERE positiontypeid = '1' AND status = '1' ";
							$arr = $objdb->getArray($sql_file);
							if (count($arr) > 0)
							{
								foreach ($arr as $file)
								{
							?>
									<option value="<?=$file["positionid"]?>" <?php if ($rec["positionid"] == $file["positionid"]) {echo "selected";}?>><?=$file["positionname"]?></option>
							<?php
								}
							}
							?>
						</select>
					</div>
				</div><!-- from-group -->
			<?php
			}
			elseif ($rec["filenum"] == "7")
			{
				$sql7 = "SELECT * FROM tbmanagedetail AS md INNER JOIN mtmanageposition A mp ON md.manageid=mp.id WHERE md.manageid = '".$rec["manageid"]."' ";
				$rec7 = $objdb->query_first($sql7);
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">วันที่มีผลบังคับใช้</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateuse" name="goverdateuse" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateuse"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ระดับ</label>
					<div class="col-sm-6">
						<select name="managelevel" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<option value="1" <?php if ($rec7["managelevel"] == "1") {echo "selected";}?>>สาขาวิชาฯ</option>
							<option value="2" <?php if ($rec7["managelevel"] == "2") {echo "selected";}?>>ภาควิชาฯ</option>
							<option value="3" <?php if ($rec7["managelevel"] == "3") {echo "selected";}?>>คณะฯ</option>
							<option value="4" <?php if ($rec7["managelevel"] == "4") {echo "selected";}?>>มหาวิทยาลัยฯ</option>
							<option value="5" <?php if ($rec7["managelevel"] == "5") {echo "selected";}?>>นอกมหาวิทยาลัยฯ</option>
						</select>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ระดับ</label>
					<div class="col-sm-6">
						<select name="managetype" class="form-control ">
							<option selected>กรุณาเลือก</option>
							<option value="1" <?php if ($rec7["managetype"] == "1") {echo "selected";}?>>วิชาการ</option>
							<option value="2" <?php if ($rec7["managetype"] == "2") {echo "selected";}?>>บริหาร</option>
							<option value="3" <?php if ($rec7["managetype"] == "3") {echo "selected";}?>>ภาครัฐ</option>
							<option value="4" <?php if ($rec7["managetype"] == "4") {echo "selected";}?>>วิชาชีพ</option>
						</select>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ระดับ</label>
					<div class="col-sm-6">
						<select name="manageposition" id="manageposition" class="form-control ">
							<option value="<?=$rec7["managetype"]?>" selected><?=$rec7["groupname"]?></option>
						</select>
					</div>
				</div><!-- from-group -->
			<?php
			}
			elseif ($rec["filenum"] == "9")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">วันที่มีผลบังคับใช้</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateuse" name="goverdateuse" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateuse"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">ระยะเวลาจ้างเริ่ม</label>
					<div class="col-sm-6">
						<input type="text" id="goverdatestart" name="goverdatestart" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdatestart"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->
				<div class="form-group">
					<label class="col-sm-2 control-label">ระยะเวลาจ้างสิ้นสุด</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateend" name="goverdateend" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateend"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->
			<?php
			}
			elseif ($rec["filenum"] == "10")
			{
			?>
				<div class="form-group">
					<label class="col-sm-2 control-label">วันที่มีผลบังคับใช้</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateuse" name="goverdateuse" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateuse"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->

				<div class="form-group">
					<label class="col-sm-2 control-label">วันกลับเข้าปฏิบัติงาน</label>
					<div class="col-sm-6">
						<input type="text" id="goverdateback" name="goverdateback" data-provide="datepicker" data-date-language="th-th" value="<?=thaidate543($rec["goverdateback"]);?>" placeholder="ระบุวันลงนาม"  class="form-control"/>
					</div>
				</div><!-- from-group -->
			<?php
			}
			?>

			<div class="form-group">
				<label class="col-sm-2 control-label"></label>
				<div class="col-sm-1">
					<input type="submit"  value="บันทึก" class="form-control btn-primary glyphicon glyphicon-search ">
				</div>
			</div><!-- from-group -->
		</form>

	</fieldset>
<div>

</body>
</html>