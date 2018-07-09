<?php
require("../inc/header.php");
require("../inc/authorize.php");
if ($auth <> "1")
{
	echo "<script>alert('คุณไม่สิทธิ์ใช้ระบบนี้');</script>";
	echo "<script>window.history.back();</script>";
}
?>

<?php
if (isset($_POST["submit"]))
{
	$datetime=date("Y-m-d H:i:s.000");
	$userin = $_SESSION["session_empid"];
	$round = $_POST["round"];
	if ($round <> "")
	{
		$yy = date("Y");
		if ($round == "1")
		{
			$datestart = $yy."-07-01";
			$datestop = $yy."-12-31";
		}
		else
		{
			$datestart = $yy."-01-01";
			$datestop = $yy."-06-30";
		}
		$i = 0;
		if (move_uploaded_file($_FILES["fileCSV"]["tmp_name"],"upload/".$_FILES["fileCSV"]["name"]))
		{
			$csv = fopen("upload/".$_FILES["fileCSV"]["name"], "r");
			while (($arr = fgetcsv($csv, 1000, ",")) !== FALSE) 
			{
				if ($i <> "0")
				{
					$sql_max = "SELECT MAX(id) AS id FROM tbevaluate ";
					$rec = $objdb->query_first($sql_max);
					$max = $rec["id"]+1;

					$sql_hr = "SELECT * 
						FROM $hrmed.tbemployee AS e 
						LEFT JOIN $hrmed.tbempwork AS w ON e.id=w.id
						LEFT JOIN $hrmed.mtposition AS mp ON w.positionid=mp.positionid
						LEFT JOIN $hrmed.mtpositiontype AS mpt ON mp.positiontypeid=mpt.positiontypeid
						WHERE e.empid = '$arr[0]'
					";
					$hr = $objdb->query_first($sql_hr);
					if ($hr["positiontypeid"] == "1")
					{
						$type = "1";
					}
					else
					{
						$type = "2";
					}

					/*if ($arr[2] == "สายวิชาการ")
					{
						$type = "1";
					}
					elseif ($arr[2] == "สายสนับสนุน")
					{
						$type = "2";
					}*/

					$import = "INSERT INTO tbevaluate(id,empid,type,datestart,datestop,round,evaluate,suggest,datein,userin) ";
					$import .="VALUES ";
					$import .="('".$max."','".$arr[0]."','".$type."' ";
					$import .=",'".$datestart."','".$datestop."','".$round."' ";
					$import .=",'".texttoascii($aes->encrypt($arr[2]))."','".texttoascii($aes->encrypt($arr[3]))."' ";
					$import .=",'".$datetime."','".$userin."') ";
					$exe = $objdb->query($import);
					if (!$exe)
					{
						break;
					}
				}//End if <> 0
				$i++;
			}// End While
			fclose($csv);

			echo "<script>alert('บันทึกเรียบร้อย');window.location='index.php';</script>";
			//echo "Upload & Import Done.";
		}
		else
		{
			echo "<script>alert('ยังไม่ได้เลือกไฟล์ CSV');window.history.back();</script>";
			//echo "Upload & Import Done.";
		}
	}
	else
	{
		echo "<script>alert('กรุณาเลือกรอบ');window.history.back();</script>";
	}
}
?>

<link href="../bootstrap-4.0/fileinput/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="../bootstrap-4.0/fileinput/fileinput/fileinput.js" type="text/javascript"></script>
<script src="../bootstrap-4.0/fileinput/fileinput/fileinput_locale_fr.js" type="text/javascript"></script>
<script src="../bootstrap-4.0/fileinput/fileinput/fileinput_locale_es.js" type="text/javascript"></script>

<div class="col-lg-12">
	<h1 class="page-header">เอกสารแนบคะแนนประเมินผล</h1>
</div><!-- /.col-lg-12 -->

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>ตัวอย่างไฟล์เอกสารแนบ</strong>
        </div>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th width="10%">SAPID</th>
                    <th width="20%">ชื่อ-นามสกุล</th>
                    <th width="10%">คะแนนประเมิน</th>
					<th width="10%">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
				<tr class="odd gradeX">
					<td>10000000</td>
                    <td>xxxxx xxxxxxx</td>
                    <td class="center">80</td>
					 <td>xxxxx xxxxxxx</td>
                </tr>
				<tr class="odd gradeX">
					<td>10000001</td>
                    <td>aaaaa xxxxxxx</td>
                    <td class="center">80</td>
					 <td>xxxxx xxxxxxx</td>
                </tr>
			</tbody>
		</table><!-- /.table-responsive -->
	</div><!-- /.panel-default -->
</div><!-- /.col-lg-12 -->

<div class="row">
	<div class="col-lg-12">	
		<hr>
	</div>
</div><!-- row -->

<div class="row">
	<form role="form" method="post" action="" enctype="multipart/form-data">
		<input type="hidden" name="hdncmd" value="search">
		<div class="col-lg-6">	
			<div class="form-group">
				<label>รอบ</label>
				<select class="form-control" name="round" id="round" required>
					<option value="" selected>-----เลือกรอบ-----</option>
					<option value="1">1</option>
					<option value="2">2</option>
				</select>
            </div><!-- form-group -->
			<div class="form-group">
				<label>เอกสารแนบ</label>
				<input id="input-2" name="fileCSV" type="file" class="file"  data-show-upload="false" data-show-caption="true" data-show-preview="false" accept=".csv">
			</div><!-- form-group -->

			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-success">บันทึก</button>
				<button type="reset" class="btn btn-warning">ยกเลิก</button>
			</div><!-- form-group -->
		</div>
	</form>
</div><!-- row -->

<?php
require("../inc/footer.php");
?>