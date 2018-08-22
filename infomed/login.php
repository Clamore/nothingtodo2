<?php
session_start();
require_once("config.php");
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	<!--
		$(document).ready(function(){
			$('#submit').click(function(){
				var org_id = $('#org_id').val();
				var password = $('#password').val();
				if (org_id == '')
				{
					alert('Username is not empty');
					$('#org_id').focus();
					return false;
				}

				if (org_id.length < 8)
				{
					alert('Username is wrong');
					$('#org_id').focus();
					return false;
				}

				if (password == '')
				{
					alert('Password is not empty');
					$('#password').focus();
					return false;
				}

				/*$.post("login_cmd.php",{org_id:org_id,password:password})
					.done(function(data){

				});*/

			});
		});
	//-->
	</script>
	
</head>

<body data-accent="blue">

<?php
if (isset($_POST["submit"]))
{
	$id = curl($_POST["org_id"],$_POST["password"]);

	$result = explode(",",$id);
	print_r($result);
}
?>

   <header id="hero"  style="height:110px">
				<div class="container-fluid">
							   <!-- <div class="row-fluid" style="background-image:url(images/hq_med_h1.png); background-repeat:no-repeat; height:120px"> -->
							   </div><!--lass="inner">-->
					   </div><!--<div class="row-fluid">-->
		   </div><!--<div class="container-fluid">-->
   </header>
   q
   <div class="container-fluid" >
      <div class="row-fluid" >
	  
 
	  		<div class="span4">
			<fieldset>
			<div class="alert alert-info">
		 		</div>
				 <div id="user" > 
				 <?php
				 //$token = session_id();
				 /*$path = 'accio';
				 $action = 'action="'.$url.$path.'" ';*/
				 $action = '';
				 ?>
				   <form id="frm_login" <?=$action?> class="form-horizontal" method="post">
									<div class="control-group">
									<label class="control-label" for="username">User name</label>
									<div class="controls">
									<input type="text" id="org_id" name="org_id" class="input-medium" placeholder="Username">
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="password">Password</label>
									<div class="controls">
									<input type="password" id="password" name="password"  class="input-medium"  placeholder="Password">
									</div>
									</div>
									<div class="control-group">
									<div class="controls">

									<input type="submit" id="submit" name="submit" value="Sign in" class="btn-info" />
									</div>
									</div>
					</form>
 				</div>
 
    
		</fieldset>
				 				
	</div>
  
</body>
</html>
<?php                                                                                                                                                     
//require_once("config.php");
# request สำหรับ authentication service
/*{
method     => 'POST'
base_url   => https://10.7.14.14 // ให้ดึงจาก config file
endpoint   => '/accio'

header     => 'Accept' = 'application/json'
              'token'  = 'app_token' // ให้ดึงจาก config file  
              'secret' = 'app_secret'// ให้ดึงจาก config file

parameters => 'function' = 'authenticate'
			  'org_id'   = user input SAP ID
			  'password' = user input password

return code
	8 => token และ/หรือ secret ไม่ถูกต้อง
	7 => ส่ง parameters มาไม่ครบ
	1 => ไม่พบ sap id ในระบบ สามารถทดสอบได้ด้วยการส่ง id ที่ความยาวไม่เท่ากับ 8
	2 => sap id ไม่ได้ใช้งาน สามารถทดสอบได้ด้วยการส่ง sap id ที่ไม่ขึ้นต้นด้วยเลข 1
	3 => password ผิด สามารถทดสอบด้วยการส่งค่า org_id != password
	0 => สามารถ login ได้ สามารถทดสอบด้วยการส่งค่า org_id == password
}*/
?>