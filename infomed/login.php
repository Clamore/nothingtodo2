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
/*if (isset($_POST["submit"]))
{
	$header = array('Type: application/json','token:app_token','secret:app_secret');
	$data = array 
		("function" => "authenticate", 
		"org_id" => $_POST["org_id"],
		"password" => $_POST["password"]);

	$curl = curl_init();
	$url = 'https://10.7.14.14/accio';

	$options = array(CURLOPT_URL => $url,
						    CURLOPT_HTTPHEADER =>$header,
							CURLOPT_SSL_VERIFYPEER => false,
							CURLOPT_SSL_VERIFYHOST => FALSE,
							CURLOPT_POST => 1,
							CURLOPT_POSTFIELDS => $data
						   );

	curl_setopt_array($curl, $options);

	$result = curl_exec($curl);
	//$result = json_decode($result,true);

	curl_close($curl);

	$result = explode(",",$id);
	print_r($result);
}*/
?>

   <header id="hero"  style="height:110px">
				<div class="container-fluid">
							   <!-- <div class="row-fluid" style="background-image:url(images/hq_med_h1.png); background-repeat:no-repeat; height:120px"> -->
							   </div><!--lass="inner">-->
					   </div><!--<div class="row-fluid">-->
		   </div><!--<div class="container-fluid">-->
   </header>
   
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
				 $action = 'action="login_cmd.php" ';
				 //$action = '';
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
# request ����Ѻ authentication service
/*{
method     => 'POST'
base_url   => https://10.7.14.14 // ���֧�ҡ config file
endpoint   => '/accio'

header     => 'Accept' = 'application/json'
              'token'  = 'app_token' // ���֧�ҡ config file  
              'secret' = 'app_secret'// ���֧�ҡ config file

parameters => 'function' = 'authenticate'
			  'org_id'   = user input SAP ID
			  'password' = user input password

return code
	8 => token ���/���� secret ���١��ͧ
	7 => �� parameters �����ú
	1 => ��辺 sap id ��к� ����ö���ͺ����¡���� id ��������������ҡѺ 8
	2 => sap id �������ҹ ����ö���ͺ����¡���� sap id �������鹵鹴����Ţ 1
	3 => password �Դ ����ö���ͺ���¡���觤�� org_id != password
	0 => ����ö login �� ����ö���ͺ���¡���觤�� org_id == password
}*/
?>