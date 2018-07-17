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
   ?>
</head>

<body data-accent="blue">

<?
if(isset($_POST["submit"]))
{
//echo "---------------------------------";
$username = $_POST["username"];
$password =$_POST["password"];

//echo "username ->" . $username;
//echo "password ->" . $password;
$sql = "SELECT *  FROM   tbuser where status='1' and userid='".$username."' and upassword='".md5($password)."'";
//echo "<br>".$sql;
$row = $objdb->numrows($sql);
//echo "<br>".$row;
$rec = $objdb->query_first($sql); 
//userid, empid, upassword, ugroup, ueditjob, datein, userin, status, meddoc
$empid=$rec["empid"];
$ugroup=$rec["ugroup"];

$_SESSION['userid']=$empid;
$_SESSION['ugroup']=$ugroup;

if($row > 0){
//echo "Success! Number of users found: ". $db->affected_rows;
 $sql = "SELECT     e.empid, e.emprank, e.emprankname, e.empname, e.empsname, e.empengrank, e.empengrankname, e.empengname, e.empengsname, e.empflag, e.empsex, e.emprace, e.empnation, e.empreligion, e.empmary, e.empson, e.empspouse, e.empaddress, e.empcurrent, e.emptel, e.empmobile, e.empemergency, e.empemrtel, e.emppid, e.empcardid, e.empemail, e.empremark, e.emppic, e.maryfile, e.addressfile, e.pidfile, e.cardidfile, e.status, u.unitname,u.unitid,w.positiontype , u.status AS unitstatus, w.workunit 
FROM         View_tbemployee AS e INNER JOIN
                      View_tbempwork AS w ON e.empid = w.empid INNER JOIN
                      View_unit AS u ON w.workunit = u.unitid  WHERE (e.empid = '$empid')"; 
//echo "<br>".$sql;
$result = $objdb->query_first($sql); 
			// using query_first() 
			// this sets variables in the session 
			//echo "<br>". $result["emprankname"].'  '.$result["empname"].'  '.$result["empsname"];
			$_SESSION['fullname']=$result["emprankname"].'  '.$result["empname"].'  '.$result["empsname"];
			$_SESSION['unit']=$result["unitname"];
			$_SESSION['unit_id']=$result["workunit"];
	//----------------
	session_register(myauth);

	$myauth[userid] =  $rec["userid"];
	$myauth[userin] =  $rec["empid"];
	$myauth[empid] =  $rec["empid"];
	$myauth[ugroup] = $rec["ugroup"];
	$myauth[ueditjob] = $rec["ueditjob"];
	$myauth[prank] =  $result["emprank"];
	$myauth[pname] = $result["empname"];
	$myauth[psname] = $result["empsname"];
	$myauth[empflag] = $result["empflag"];
	$myauth[pposition] = $result["workposition"];
	//$myauth[pworkunit] = $result["workunit"];$result["unitid"];
	$myauth[pworkunit] = $result["workunit"];
	//$myauth[workplace] = $result["workplace"];
	$myauth[workplace] =  $result["workunit"];
	
	//$myauth[workplace] = $result["workunit"];
	$myauth[unitstatus] = $result["unitstatus"];
	
	$_SESSION['session_empid'] = $rec['empid'];
	$_SESSION['session_userid'] =$rec["userid"];
	$_SESSION['session_userin'] =  $rec["empid"];
	$_SESSION['session_ugroup'] = $rec["ugroup"];
	$_SESSION['session_fullname']  = $result["empname"]."  ". $result["empsname"];
	$_SESSION['session_workplace']= $result["workunit"];
	//$_SESSION['session_workplace']= $result["unitid"];
	$_SESSION['session_unitstatus'] = $result["unitstatus"];
	$_SESSION['session_pworkunit'] =$result["workunit"];
	$_SESSION['session_pname'] = $result["empname"];
	$_SESSION['session_psname'] = $result["empsname"];
	$_SESSION['session_empflag'] = $result["empflag"];
	$_SESSION['session_positiontype'] = $result["positiontype"];
	//------------------
	//		$_SESSION['FAC_NAME']=$result["FAC_NAME"];
			//echo "<br>". $_SESSION['fullname'].'  '.$_SESSION['unit'];
			//$_SESSION['session_person_id']=$record['person_id']; 
			//$_SESSION['session_unit_id']=$record["unit_id"];
			//$_SESSION['session_unit_parent']=$record["unit_parent"];
			//$_SESSION['session_person_name']=$record["title_name"]. "  ".$record["person_name"]. "  ".$record["person_sname"];
			//$_SESSION['session_unit_name']=$record["unit_name"];
			//$_SESSION['session_position_name']=$record["position_name"];
			/* Redirect browser */
			//header("Location: main/index.php");
			/* Make sure that code below does not get executed when we redirect. */
			//exit;
			//echo '<meta http-equiv="Refresh" content="0;URL=hub/hub.php">';
			//echo '<meta http-equiv="Refresh" content="0;URL=task/index.php">';

			if ($password == "1234")
			{
				echo '<meta http-equiv="Refresh" content="0;URL=changepw.php">';
			}
			else
			{
				if($result["positiontype"]=="1"){
					echo '<meta http-equiv="Refresh" content="0;URL=pub/index.php">';
				}else{
					echo '<meta http-equiv="Refresh" content="0;URL=index.main.php">';
				}
				//echo '<meta http-equiv="Refresh" content="0;URL=../question/usercheck.php">';
				$chkuser = 1;

			}//End if password 1234
	}
	else{
    		//$err = "Error: No user found.";
			$err = "<label class='alert alert-block'>Error: No user found...</label>";
	} 

}//End if isset

?>
   <header id="hero"  style="height:110px">
				<div class="container-fluid">
							   <div class="row-fluid" style="background-image:url(images/hq_med_h1.png); background-repeat:no-repeat; height:120px">
							   </div><!--lass="inner">-->
					   </div><!--<div class="row-fluid">-->
		   </div><!--<div class="container-fluid">-->
   </header>
   
   <div class="container-fluid" >
      <div class="row-fluid" >
	  
 
	  		<div class="span4">
			<fieldset>
			<div class="alert alert-info">
				 <h4>ลงชื่อเข้าใช้งาน</h4>
		 		</div>
			<!--<legend><h4>ลงชื่อเข้าใช้งาน</h4></legend>-->
			 <? if($_SESSION['userid']==""){?>
				 <div id="user" > 
				   <form id="frm_login" class="form-horizontal" action="index.php" method="post">
									<div class="control-group">
									<label class="control-label" for="username">User name</label>
									<div class="controls">
									<input type="text" id="username" name="username" class="input-medium" placeholder="Username">
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
									<?=$err?>
									<input type="submit" name="submit" value="Sign in" class="btn-info" />
									</div>
									</div>
					</form>
 				</div>
 
                <? }else{
						$sql_emp="select empid,empname,empsname,empengname,empengsname,emppic from view_tbemployee where empid='".$_SESSION['userid']."'";
						//echo $sql_emp;
						$result_emp = $objdb->query_first($sql_emp); 		
						$user = substr($_SESSION["fullname"],0,40) . "... ";
					    $newstring = str_replace("", "&nbsp;",$user);
						//echo  "position type " . $_SESSION['session_positiontype'] ;
    					//print $newstring;
					?>
					
              <div >   
			  <input type="hidden" name="h_ugroup" id="h_ugroup" value="<?=$_SESSION['session_ugroup']?>"/>
			    <? 
									  $len = strlen($result_emp["emppic"]);
									  $stremp = substr($result_emp["emppic"],3,$len);
									  $_SESSION['emppic']=$stremp;
				 ?>
			    <table width="100%">
				  <tr>
				  <td> <img id="img" src="../medical/<?=$stremp?>"  width="100px" height="120px" border="1" style="border-color:#0066CC"></td>
				  <td width="70%">
				  						<div style="margin:10px">
                                       
									   <h4>
                                       <?=$_SESSION["unit"] .' ['.$_SESSION["unit_id"].']'?>
                                       <br />
									   <?="".$arr_authen_type[$_SESSION["ugroup"]] .""?>
									   </h4>
									   </div>
                   
				  </td>
				  </tr>
				  <tr><td colspan="2"><h3><?=$newstring?></h3>
				  SAP ID : <?=$_SESSION['userid']?>
				  </td></tr>
				  <tr><td colspan="2"></td></tr>
				  </table>
				 <div id="top-info" class="pull-left">
                                 <a href="#" class="pull-left">
									  <div class="top-info-block">
										   <!--<img src="content/img/appbar.png" alt=""/>-->
									 </div>
                        		</a>
                                <!-- <hr class="separator pull-left"/>-->
                              <a   class="pull-left" href="logout.php" title="ออกจากระบบ">
                               <b class="icon-locked"></b>
                              </a>
                  </div>
			</div>
				
			<div id="section1" class="metro  tile-span-4" style="border-top:#CCCCCC thin solid"> 	<br />

			

			  <a id="id_group" class="tile wide imagetext bg-color-greenDark" href="pub/"  target="_blank"> 
			  <span class="app-label"><!--<h4>งานบุคลากร</h4>--></span>
              <div class="image-wrapper">  <span class="icon icon-user-3" ></span> 
			  <div class="column-text">
                			<div class="text4">ระบบงานสำหรับ อาจารย์</div>
                </div>
			   </div>
                      <!--<span class="app-label">งานบุคลากร</span>-->
              </a>
			  
			  <a class="tile wide imagetext bg-color-blueDark" href="index.main.php"  target="_blank">
             <!-- <div class="image-wrapper">  <img src="content/img/metro-tiles.jpg" /> </div>-->
			  <div class="image-wrapper">  <span class="icon icon-screen " ></span> 
			  <div class="column-text">
                			<div class="text4">ระบบงานสำหรับเจ้าหน้าที่ส่วนบันทึกข้อมูล</div>
                </div>
			   </div>
               
               <!-- <div class="app-label">งานประชาสัมพันธ์</div>-->
              </a>
			  
			  <a id="id_group" class="tile wide imagetext bg-color-yellow" href="index.hub.php"  target="_blank"> 
			  <span class="app-label"><!--<h4>งานบุคลากร</h4>--></span>
              <div class="image-wrapper">  <span class="icon icon-calendar" ></span> 
			  <div class="column-text">
                			<div class="text4" align="left">จัดตารางปฏิบัติงาน/ <br />ตารางสอน</div>
             </div>
			 </div>
                      <!--<span class="app-label">งานบุคลากร</span>-->
              </a>
			  
		</div>			
				
				 <? }?>
				 </fieldset>
				 				
	</div>


			
	<div class="span8">
			<div class="metro">
				<div class="alert alert-success">
				 <h4> ข่าว ประชาสัมพันธ์ แจ้ง ประกาศ </h4>
				 </div>
								<!--<div class="bs-docs-example">-->
												 <div data-spy="scroll" data-offset="0" class="scrollspy-example" id="manage" style="height:500px"> 
												 <div class="accordion" id="accordion2">
												 
												  <?
												  //start
												  $sql = "SELECT  id, title, detail, file1, file2, file3, comment, pic1, pic2 FROM   View_tbannounce  order by id desc";
												  $arr= $objdb->getArray($sql);
													if(count($arr)!=0){
													 foreach($arr as $rec){
												  ?>
																   <div class="accordion-group">
																					 <div class="accordion-heading">
																						 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?=$rec['id']?>">
																									 <?
																									 //heading
																									 $title = $rec['title'];
																									 echo substr($title,0,100)."...";
																									 echo "  ".$rec['detail'];
																									 ?>
																									 
																								 <? if(strlen($rec['file1'])>1){ ?>
																								 		 <img src="images/circular icons/paperclip.png" border="0" />
																								   		<? //=  " " . $rec['file1'] ;?>
																								
																								   <? } ?>
																								   
																					   </a>
																								  
																								 
																	 </div>  <!--accordion-heading-->
																						
																						 <div id="<?=$rec['id']?>" class="accordion-body collapse">
																												   <div class="accordion-inner">
																													<?
																													//detail
																													echo $title;
																													
																													?>
																													<div>
																											<? if(strlen($rec['file1'])>1){ ?>
																											<a href="#">
																								 		 <img src="images/circular icons/paperclip.png" border="0" />
																								   		<? //=  " " . $rec['file1'] ;?>
																										</a>
																								
																								   <? } ?>
																							<?
																							if(strlen($rec['pic1'])>1){
																							?>
																							<img src="announcement/upload/<?=$rec['pic1']?>" />
																							<? } ?>
																							<?
																								if(strlen($rec['pic2'])>1){
																							?>
																							<img src="announcement/upload/<?=$rec['pic2']?>" />
																							<? } ?>
																						</div> <!--accordion-body collapse-->
																	   </div><!--accordion-group-->
																	   </div>
											</div><!--accordion-->
											<?
											   //end
													}// foreach
											   }// if count
											   ?>	 	
											   	 </div>
							 </div><!--alert alert-info-->
							 
      	</div>
			</div>
	  </div>
   </div>

   
<div class="container-fluid">
  <div class="row-fluid">
		 <div class="metro span12">
		 </div><!--metro span12-->
</div><!--row-fluid-->
</div><!--container-fluid-->

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
	  
	  $('#id_group').click(function(){
	  		if($('#id_group')!="5") {
			//alert(" ไม่มีสิทธิเข้าใช้งาน ");
			//return false;
			}
	  });
	  
		/*$('#registerHere input').mouseover(function(){
			$(this).popover('show')
		});
		$('#registerHere input').mouseout(function(){
			$(this).popover('hide')
		});*/
	$("#frm_login").validate({
				rules:{
					username:"required",
					password:"required"
				},
				messages:{
					 username:"*",
					 password:"*"
				},
				errorClass: "help-inline",
				errorElement: "span"
			});
		});
	</script>
   <script type="text/javascript">
      $(".metro").metro();
   </script>
  
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    