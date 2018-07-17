<?
session_start();
$_SESSION['conf'];
header('Content-Type: text/html; charset=tis-620');
$chkuser = 0;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html> <!--<![endif]-->
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=tis-620" />
   <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <!-- Mobile viewport optimized: h5bp.com/viewport -->
   <meta name="viewport" content="width=device-width">

   <title>.: [i - MED] ...</title>

   <meta name="robots" content="index, nofollow">
   <meta name="description" content="" />
   <meta name="keywords" content="" />
   <meta name="author" content="AozoraLabs by Marcello Palmitessa"/>
   
   <!-- remove or comment this line if you want to use the local fonts -->
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>-->

   <link rel="stylesheet" type="text/css" href="./content/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="./content/css/bootstrap-responsive.css">
   <link rel="stylesheet" type="text/css" href="./content/css/bootmetro.css">
   <link rel="stylesheet" type="text/css" href="./content/css/bootmetro-tiles.css">
   <link rel="stylesheet" type="text/css" href="./content/css/bootmetro-charms.css">
   <link rel="stylesheet" type="text/css" href="./content/css/metro-ui-light.css">
   <link rel="stylesheet" type="text/css" href="./content/css/icomoon.css">
   <!--  these two css are to use only for documentation -->
   <link rel="stylesheet" type="text/css" href="./content/css/demo.css">
   <link rel="stylesheet" type="text/css" href="./scripts/google-code-prettify/prettify.css" >
   <?
   require("database.mssql.class/msdatabase.class.php");
   require("database.mssql.class/config.inc.php");
   require("function/function.php");  
   $objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);

	if (isset($_POST["submit"]))
	{
		//echo "<script>alert('test');</script>";
		$empid = $_POST["empid"];
		$newpassword = md5($_POST["newpassword"]);
		$sql = "UPDATE tbuser SET upassword = '$newpassword' WHERE empid = '$empid' ";
		$rec = $objdb->query_first($sql);
		if ($rec)
		{
			if ($_SESSION['session_positiontype'] == "1")
			{
				echo '<meta http-equiv="Refresh" content="0;URL=pub/index.php">';
			}
			else
			{
				echo '<meta http-equiv="Refresh" content="0;URL=index.main.php">';
			}
		}
	}
   ?>
</head>

<body data-accent="blue">

   <header id="hero"  style=" margin-top:-20px;height:150px">
	 <!-- <a id="backbutton" class="win-backbutton" href="./index.php"></a>-->
            <div class="container-fluid">
               <div class="row-fluid" style="background-image:url(images/hq_med_h1.png); background-repeat:no-repeat; height:150px">
			   <div align="right" style="margin-top:100px;margin-right:20px">
			   <h4>
			  <?
			   $sql_emp="select empid,empname,empsname,empengname,empengsname,emppic from view_tbemployee where empid='".$_SESSION['userid']."'";
						//echo $sql_emp;
						$result_emp = $objdb->query_first($sql_emp); 		
						//$user = $_SESSION["fullname"] ;
						$user = $_SESSION['session_fullname'] ; 
					    $newstring = str_replace("", "&nbsp;",$user);
						//echo  "position type " . $_SESSION['session_positiontype'] ;
    					echo  $newstring;
						?>&nbsp;
						 / 
                         <?="".$arr_authen_type[$_SESSION["ugroup"]] .""?>
						&nbsp;&nbsp;
			   [<a href="logout.php">Logout</a>]
			   </h4>
			   </div>
			  
				 <!--lass="inner">-->
       </div><!--<div class="row-fluid">-->
       </div><!--<div class="container-fluid">-->
   </header>
   
	<div id="home-tiles" class="container-fluid metro">
		<div class="row-fluid">
			<form method="post" action="">
				<input type="hidden" name="empid" value="<?=$_SESSION["session_empid"]?>">
				<table align="center">
					<tr>
						<td align="right">รหัสผ่านใหม่ :</td>
						<td><input type="password" name="newpassword" id="newpassword" class="form-control"></td>
					</tr>
					<tr>
						<td align="right">ยืนยันรหัสผ่าน :</td>
						<td><input type="password" name="confirmpassword" id="confirmpassword" class="form-control"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="submit" id="submit" class="btn-success" value="บันทึก"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
   
   <script type="text/javascript" src='scripts/jquery-1.8.2.min.js'></script>
   <script type="text/javascript" src="scripts/google-code-prettify/prettify.js"></script>
   <script type="text/javascript" src="scripts/jquery.mousewheel.js"></script>
   <script type="text/javascript" src="scripts/jquery.scrollTo.js"></script>
   <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
   <script type="text/javascript" src="scripts/bootmetro.js"></script>
   <script type="text/javascript" src="scripts/bootmetro-charms.js"></script>
   <script type="text/javascript" src="scripts/demo.js"></script>
   <script type="text/javascript" src="scripts/holder.js"></script>
<script type="text/javascript" src="scripts/jquery.validate.js"></script>

	
   <script type="text/javascript">
	$(document).ready(function(){
		//alert('aa');
      $(".metro").metro();

	  $('#submit').click(function(){
		var newpass = $('#newpassword').val();
		var confirmpass = $('#confirmpassword').val();
		if (newpass.length < "4")
		{
			alert('รหัสต้องไม่ต่ำกว่า 4 ตัวอักษร');
			$('#newpassword').focus();
			return false;
		}
		if (newpass == "1234")
		{
			alert('ไม่อนุญาตให้ตั้ง 1234');
			$('#newpassword').focus();
			return false;
		}
		if (newpass != confirmpass)
		{
			alert('Password ไม่ตรงกัน');
			$('#confirmpassword').focus();
			return false;
		}
	  });
	 });
   </script>
  
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    