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
 $sql = "SELECT     e.empid, e.emprank, e.emprankname, e.empname, e.empsname, e.empengrank, e.empengrankname, e.empengname, e.empengsname, e.empflag, e.empsex, 
                      e.emprace, e.empnation, e.empreligion, e.empmary, e.empson, e.empspouse, e.empaddress, e.empcurrent, e.emptel, e.empmobile, e.empemergency, e.empemrtel, 
                      e.emppid, e.empcardid, e.empemail, e.empremark, e.emppic, e.maryfile, e.addressfile, e.pidfile, e.cardidfile, e.status, u.unitname,u.unitid
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
			$_SESSION['unit_id']=$result["unitid"];

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
	$myauth[pworkunit] = $result["workunit"];
	//$myauth[workplace] = $result["workplace"];
	$myauth[workplace] = $result["workunit"];
	$myauth[unitstatus] = $rowunit["status"];
	
	$_SESSION['session_empid'] = $rec['empid'];
	$_SESSION['session_userid'] =$rec["userid"];
	$_SESSION['session_userin'] =  $rec["empid"];
	$_SESSION['session_ugroup'] = $rec["ugroup"];
	$_SESSION['session_fullname']  = $result["empname"]."  ". $result["empsname"];
	$_SESSION['session_workplace']= $result["unitid"];
	$_SESSION['session_unitstatus'] = $rowunit["status"];
	$_SESSION['session_pworkunit'] =$result["unitid"];
	$_SESSION['session_pname'] = $result["empname"];
	$_SESSION['session_psname'] = $result["empsname"];
	$_SESSION['session_empflag'] = $result["empflag"];
	
	
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
			$chkuser = 1;
}
else{
    		//$err = "Error: No user found.";
			$err = "<label class='alert alert-block'>Error: No user found...</label>";
} 

}

?>

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
	  <div class="span12">
	  
	  <div class="span1">
	   <!--<IMG SRC="Icons/job.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT="">-->
	  </div>
	  
	  <div class="span11">
			<a class="tile wide  imagetext bg-color-blue" href="task/">
				<div class="image-wrapper">
					<!--<img src="../content/img/Apps-Aero-WinFlip-3D-Metro-icon.png" alt=""/>-->
					<!-- <span class="icon icon-stats-up"></span> -->
					<IMG SRC="Icons/job.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT="">
				</div>
                 <div class="column-text">
					<div class="text4">ระบบจัดการภาระงาน</div>
                 </div>
                 <div class="app-label"><!--ระบบจัดการภาระงาน--></div>
                 <div class="app-count"></div>
            </a><!--ระบบจัดการภาระงาน-->

              <a class="tile  wide imagetext bg-color-purple" href="../kpi/main/index.php" target="_blank">
					  <div class="image-wrapper">
					  <IMG SRC="Icons/kpi.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT="">
					  <!--  <span class="icon icon-database "></span> -->
					   <!--<img src="content/img/Apps-Aero-WinFlip-3D-Metro-icon.png" alt=""/>-->
		      		</div>
					<div class="column-text">
                <div class="text4">ตัวชี้วัด<br>ภาควิชาอายุรศาสตร์</div>
                  </div>
					<!--<span class="app-label">ตัวชี้วัด<br>ภาควิชาอายุรศาสตร์</span> -->
			</a> 
			<?php
			/*if ($_SESSION['session_empid']=="10014984" || $_SESSION['session_empid']=="10003655" || $_SESSION['session_empid']=="10007989" || $_SESSION['session_empid']=="10015432" || $_SESSION['session_empid']=="10008876" || $_SESSION['session_empid']=="10022758" || $_SESSION['session_empid']=="10024029" || $_SESSION['session_empid']=="10015549")
			{
				$hr = "hr.php";
			}
			else
			{
				$hr = "../medical/";
			}*/
			$hr = "hr.php";
			?>
		<a class="tile wide  imagetext bg-color-brown" href="<?=$hr;?>" target="_blank">
         <div class="image-wrapper"> <img src="Icons/per.png" width="100" height="100" border="0" alt="" /> </div>
		 <div class="column-text">
                <div class="text4">งานบุคลากร</div>
        </div>
				  
         <!--<span class="app-label">งานบุคลากร</span> --></a>
		 
		 
        <a class="tile wide imagetext bg-color-blueDark" href="../mvmis/" target="_blank">
              <div class="image-wrapper"> 
			  <IMG SRC="Icons/ra.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT="">
			  </div>
			   <div class="column-text"><div class="text4">งานการลา</div></div>
       <!--  <span class="app-label">งานการลา</span>		-->
		 </a>
		 
		 <a class="tile wide imagetext bg-color-orange" href="../meeting" target="_blank">
         <div class="image-wrapper">
           <!-- <img src="content/img/My Apps.png" alt=""/>-->
           <img src="Icons/room.png" width="100" height="100" border="0" alt="" /> </div>
		    <div class="column-text"><div class="text4">ห้องประชุม</div></div>
         <!--<div class="app-label">ห้องประชุม</div>-->
         </a>
		 
		 <a class="tile wide imagetext bg-color-red" target="_blank" href="../office-med/" >
         <div class="image-wrapper"> <img src="Icons/doc.png" width="100" height="100" border="0" alt="" /> </div>
         <!--  <div class="column-text">
                    <div class="text4">Office-MED</div>
                      <div class="text4">งานสารบรรณอิเล็กทรอนิกส์</div>
                    </div> -->
					 <div class="column-text"><div class="text4">งานสารบรรณ</div></div>
         
         </a>
		 
		 <a class="tile wide imagetext bg-color-greenDark" target="_blank" href="http://10.7.14.250/" >
					<div class="image-wrapper"> 
					<IMG SRC="Icons/student.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT="">
					 </div>
                   <!--  <div class="column-text">
                    <div class="text4">Office-MED</div>
                      <div class="text4">งานสารบรรณอิเล็กทรอนิกส์</div>
                    </div> -->
					 <div class="column-text"><div class="text4">ทะเบียนนักศึกษา</div></div>
                    
            </a> 
			<?php
			if ($_SESSION['session_empid']=="10003655" || $_SESSION['session_empid']=="10007989" || $_SESSION['session_empid']=="10022758" || $_SESSION['session_empid']=="10020871")//10007989 10020871
			{
			$_SESSION["pass"]=$password;
			?>
			<a class="tile wide imagetext bg-color-purple" target="_blank" href="acc.php" >
			<div class="image-wrapper"> 
					<img src="Icons/budget.png" width="100" height="100" border="0" alt="">
					<!--<IMG SRC="Icons/student.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT="">-->
					 </div>
					 <div class="column-text"><div class="text4">พัสดุงบประมาณ/บัญชี
				</div></div>
			 </a> 
			<?php
			}
			else
			{
			?>
			<a class="tile wide imagetext bg-color-purple" target="_blank" href="http://10.7.14.250/service/frmstartpage.aspx?username=<?= ''.$_SESSION['session_empid'].''?>&password=<?=''.$password.''?> " >
			<div class="image-wrapper"> 
					<img src="Icons/budget.png" width="100" height="100" border="0" alt="">
					<!--<IMG SRC="Icons/student.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT="">-->
					 </div>
					 <div class="column-text"><div class="text4">พัสดุงบประมาณ/บัญชี
				</div></div>
			            </a> 
			<?php
			}
			?>
			
			<a class="tile wide imagetext bg-color-blue" target="_blank" href="task_table/index.hub.php" >
					<div class="image-wrapper"> 
					<IMG SRC="Icons/table.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT="">
					 </div>
					 <div class="column-text"><div class="text4">จัดตารางปฏิบัติงาน/ตารางสอน</div></div>
            </a>

			<?php
			$sql_sa = "SELECT * FROM evaluate.dbo.tbauthorize WHERE empid = '".$_SESSION["session_empid"]."' ";
			$sal = $objdb->query_first($sql_sa);
			if ($sal)
			{
			?>
				<a class="tile wide imagetext bg-color-pink" target="_blank" href="http://10.7.14.203/salary/index.php?user=<?=$_SESSION["session_empid"]?>" >
						<div class="image-wrapper"> 
							<span class="icon icon-grid-view"/>
						<!-- <IMG SRC="Icons/table.png" WIDTH="100" HEIGHT="100" BORDER="0" ALT=""> -->
						 </div>
						 <div class="column-text"><div class="text4">การจัดการเงินเดือน</div></div>
				</a> 
			<?php
			}
			?>
			</div>
      </div>
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
      $(".metro").metro();
   </script>
  
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    