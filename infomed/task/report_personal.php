<?php
session_start();
require("../conf/def.php");
require("../database.mssql.class/msdatabase.class.php");
require("../database.mssql.class/config.inc.php");
require("../data.db/function_emp.php");
require("../data.db/function_task.php");
require("../function/function.php");
require("../data.db/get_public_day.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />

    <title> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
<link rel="stylesheet" type="text/css" href="../content/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="../content/css/bootstrap-responsive.css">
   <link rel="stylesheet" type="text/css" href="../content/css/bootmetro.css">
   <link rel="stylesheet" type="text/css" href="../content/css/bootmetro-tiles.css">
   <link rel="stylesheet" type="text/css" href="../content/css/bootmetro-charms.css">
   <link rel="stylesheet" type="text/css" href="../content/css/metro-ui-light.css">
   <link rel="stylesheet" type="text/css" href="../content/css/icomoon.css">

   <!--  these two css are to use only for documentation -->
   <link rel="stylesheet" type="text/css" href="../content/css/demo.css">
   <link rel="stylesheet" type="text/css" href="../scripts/google-code-prettify/prettify.css" >
    <style type="text/css">
<!--
.style1 {color: #FF0000}
-->
    </style>
</head>
  <body>	
<?php
require("header.php");
?>	  
   <header id="nav-bar" class="container-fluid">
      <div class="row-fluid">
         <div class="span8">
					<div id="header-container"><a id="backbutton" class="win-backbutton" href="#"></a>
						<!--<h5>BootMetro</h5>-->
						<!--<h3>Info-Med <small>V 2.01b</small></h3>-->
							<?php
							printf($hq_version);
							?>
		
									   <div class="dropdown">
										  <a class="header-dropdown dropdown-toggle accent-color" data-toggle="dropdown" href="#" >
											 Start
											 <b class="caret"></b>
										  </a>
										 <?php
										  require("../hub/link_item.php");
										 ?>
									</div>
				   </div>
         </div>	
		 
		 <?php
		 		require("../hub/header_login.php");
		 ?>
		 </div>
 </div>
</header>
  
<script type="text/javascript" src="../lib/jquery-1.3.2.js"></script>
<link rel="stylesheet" type="text/css" href="../lib/jquery.autocomplete.css" />
<link rel="stylesheet" type="text/css" href="../lib/custom-styles.css" />
<script type='text/javascript' src='../lib/jquery.autocomplete.js'></script>
<script type='text/javascript' src='../lib/jquery.maskedinput.js'></script>
<script type="text/javascript">
  $.noConflict();
  jQuery(document).ready(function($) {
	  
	  	$("#date_start").mask("99/99/9999");
		$("#date_end").mask("99/99/9999");
    // Code that uses jQuery's $ can follow here.
	//=== get emp by unit
	$('#unit_id').change(function() {
			var  unit_id = $('#unit_id').val();
			//alert(unit_id);
			var url="get_emp_unit.php?unit_id="+unit_id;
		     //alert(url);
			$.get(url, function(data){
						$("#emp").html(data);
						//alert(data);
			});
	});
/*	$('#emp').change(function(){
			//alert("---");
			var  empid = $('#emp').val();
			var empname = $('#emp option:selected').text();
			var str_emp = '<label class="checkbox">	<input type="checkbox" value="'+empid+'" name="emp_id[]"   checked><span class="metro-checkbox">'+empname+'</span></label>';
			$("#emp_table").append(str_emp);
			$("#emp").val('');
	});*/
    });
 // Code that uses other library's $ can follow here.
</script>

<?
$objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);
?>

<div class="container">
  <div class="row">
    <div class="span12">
			<? 
			require("nav_task.php");
			?>	
			<!--======================= breadcrumb =======================-->
			<!--<div>
						<ul class="breadcrumb">
					  <li>
						<a href="#">ตารางภาระงาน</a> <span class="divider">/</span>
					  </li>
					  <li>
						<a href="table_task.php"class="active">รายการภาระงาน</a> 
					  </li>
					</ul>
</div>-->
<!==============================================->
<form class="form-horizontal" id="frm_task" method='post' action=''>
 <fieldset>
 <legend><h4>รายละเอียดอาจารย์ประจำหลักสูตร </h4></legend>
		<input type="hidden" id="id" name="id"    />
<!--		<input type="hidden" id="task_id" name="task_id" />
		<input type="hidden" id="task_main" name="task_main" />
		<input type="hidden" id="task_sub" name="task_sub"    />-->
		<input type="hidden" id="task_name" name="task_name"  />
		
			<div class="control-group">
					<label class="control-label" for="task_name">ผู้ปฏิบัติงาน</label>
					<div class="controls">		
						<?
						$sql = " SELECT unitid, unitname, unitengname, datein, userin, status FROM View_unit   WHERE unitid < '19'  ORDER BY unitid ";
						//echo $sql;
						$arrunit  = $objdb->getArray($sql);
						?>
							<select name="unit_id" id="unit_id"  class="input-large" <?=$ab?> >
							<option value="0">ไม่ระบุหน่วยงาน</option>
							<?
										 foreach($arrunit as $rec){
											?>
											<option value="<?=$rec["unitid"];?>" >
											<?=$rec["unitname"]?>
											</option>
											<?
										}
										?>
							  </select>
							  <select name="emp" id="emp" class="input-large">
											<option value="" >	</option>
							  </select>
		     	 </div>
			</div>

				<div class="control-group">
					<label class="control-label" for="task_name">&nbsp;</label>
					<div class="controls">		
						<a href="" target="_blank"  name="submit" id="submit" class="btn btn-success" >&nbsp;&nbsp;แสดงรายงาน.. &nbsp;&nbsp;</a>
						<a href="" target="_blank"  name="submit" id="btn_word" class="btn btn-info" >&nbsp;&nbsp;รายงาน.. &nbsp;&nbsp;[Excel]</a>
					</div>
				</div>
			
				<div class="control-group">
						  <div class="controls">
                         
                          	<!--<input type="submit" name="submit2" id="submit2" class="btn btn-success" value=" " />-->
                          </div>
	 		 </div>
</fieldset>
</form>
	<!--  <div id="task_table">
	  </div>
 <div  style="margin-top:10px;padding:10px;border:thin dashed #CCCCCC;width:100%">-->
 <div>
<!------------------------------------------------------------------------------------------------------------>


<div style="margin:1em 1em;border-bottom:thin #999999 solid">
		<strong><h4>&nbsp;</h4></strong>
	  </div>
<div style="margin:1em 1em 1em 3em;;border-bottom:thin #999999 dashed">
				<strong>
				<h4>&nbsp;</h4>	
		</strong>
		</div>
		<div style="margin:1em 1em 1em 5em">
   			:							</div>
							<div style="margin:1em 1em 1em 10em"></div>
								
 					
	  <!--/span8--><!--/row-->
  
     <!--     </div>/row-->
     <!--   </div>/span-->
    <!-- </div>/row--></div>
		</div>
	  </div>
  <!--container-->
	</div>

	<!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../scripts/jquery.js"></script>
    <script src="../scripts/bootstrap-transition.js"></script>
    <script src="../scripts/bootstrap-alert.js"></script>
    <script src="../scripts/bootstrap-modal.js"></script>
    <script src="../scripts/bootstrap-dropdown.js"></script>
    <script src="../scripts/bootstrap-scrollspy.js"></script>
    <script src="../scripts/bootstrap-tab.js"></script>
    <script src="../scripts/bootstrap-tooltip.js"></script>
    <script src="../scripts/bootstrap-popover.js"></script>
	<script type="text/javascript" src="../scripts/jquery.validate.js"></script>
   <script type="text/javascript" src="../scripts/bootstrap-datepicker.js"></script>
   <script type="text/javascript" src="../scripts/bootstrap-datepicker.th.js"></script>
	<script type="text/javascript">
	  $(document).ready(function(){
		  $("#frm_task").validate({
				rules:{
					date_start:"required",
					date_end:"required"
				},
				messages:{
					  date_start:"*",
					  date_end:"* กำหนดเวลาที่ต้องการค้นหา"
				},
				errorClass: "help-inline",
				errorElement: "span",
				highlight:function(element, errorClass, validClass) {
					$(element).parents('.control-group').addClass('error');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).parents('.control-group').removeClass('error');
					$(element).parents('.control-group').addClass('success');
				}
			});
			
		 $('#submit').click(function(e){
				// alert("submit");
				if($("#date_start").val()==""){ 
				$("#date_start").focus();
				return false;
				}
				if($("#date_end").val()==""){ 
				$("#date_end").focus();
				return false;
				}
				if ($("#months").val() == "")
				{
					$("#months").focus();
					return false;
				}
				var unit_name = $( "#unit_id option:selected" ).text();
				var unit = $("#unit_id").val();
				var emp_id = $( "#emp option:selected" ).val();
				var emp_name = $( "#emp option:selected" ).text();
				var date_start = $("#date_start").val();
				var date_end= $("#date_end").val();
				var mon = $("#months").val();
				var url = "../report/report_personal.php?"+"unit_name="+unit_name+"&empid="+emp_id+"&unit="+unit;
				e.preventDefault();
					 window.open(url,'_blank');
		});
		
		 $('#btn_word').click(function(e){
				// alert("submit");
				if($("#date_start").val()==""){ 
				$("#date_start").focus();
				return false;
				}
				if($("#date_end").val()==""){ 
				$("#date_end").focus();
				return false;
				}
				if ($("#months").val() == "")
				{
					$("#months").focus();
					return false;
				}
				var unit_name = $( "#unit_id option:selected" ).text();
				var unit = $("#unit_id").val();
				var emp_id = $( "#emp option:selected" ).val();
				var emp_name = $( "#emp option:selected" ).text();
				var date_start = $("#date_start").val();
				var date_end= $("#date_end").val();
				var mon = $("#months").val();
				var url = "../report/report_personal.php?doc=doc&unit_name="+unit_name+"&empid="+emp_id+"&unit="+unit;
				e.preventDefault();
					 window.open(url,'_blank');
		});

		$('#btn_div').click(function(e){
				// alert("submit");
				if($("#date_start").val()==""){ 
				$("#date_start").focus();
				return false;
				}
				if($("#date_end").val()==""){ 
				$("#date_end").focus();
				return false;
				}
				var unit_name = $( "#unit_id option:selected" ).text();
				var emp_id = $( "#emp option:selected" ).val();
				var emp_name = $( "#emp option:selected" ).text();
				var date_start = $("#date_start").val();
				var date_end= $("#date_end").val();
				var url = "../report/report_excel.php?unit_name="+unit_name+"&emp_id="+emp_id+"&emp_name="+emp_name+"&date_start="+date_start +"&date_end="+date_end;
				e.preventDefault();
					 window.open(url,'_blank');
		});

		$('#btn_excel').click(function(e){
				// alert("submit");
				if($("#date_start").val()==""){ 
				$("#date_start").focus();
				return false;
				}
				if($("#date_end").val()==""){ 
				$("#date_end").focus();
				return false;
				}
				var unit_name = $( "#unit_id option:selected" ).text();
				var emp_id = $( "#emp option:selected" ).val();
				var emp_name = $( "#emp option:selected" ).text();
				var date_start = $("#date_start").val();
				var date_end= $("#date_end").val();
				var url = "../report/report_excel.php?excel=excel&unit_name="+unit_name+"&emp_id="+emp_id+"&emp_name="+emp_name+"&date_start="+date_start +"&date_end="+date_end;
				e.preventDefault();
					 window.open(url,'_blank');
		});
		
			$('#date_start').datepicker({
					format: "dd/mm/yyyy",
					 language: "th"
    	   }); 
		    $('#date_end').datepicker({
					format: "dd/mm/yyyy",
					 language: "th"
    	   }); 
		
			
		});
	</script>

<!--<iframe src="http://demos.9lessons.info/counter.html" frameborder="0" scrolling="no" height="0"></iframe>-->
  

  </body>
</html>

