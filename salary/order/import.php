<?php
require("../inc/header.php");
require("../inc/authorize.php");
if ($auth <> "1")
{
	echo "<script>alert('�س����Է������к����');</script>";
	echo "<script>window.history.back();</script>";
}
?>

<?php
if (isset($_POST["submit"]))
{
	$datetime=date("Y-m-d H:i:s.000");
	$userin = $_SESSION["session_empid"];
	$round = $_POST["round"];
	$i = 0;
	$result = 0;
	if (move_uploaded_file($_FILES["fileCSV"]["tmp_name"],"upload/".$_FILES["fileCSV"]["name"]))
	{
		$objdb->transection();

		$csv = fopen("upload/".$_FILES["fileCSV"]["name"], "r");
		while (($arr = fgetcsv($csv, 1000, ",")) !== FALSE) 
		{
			if ($i <> 0)
			{
				$sql_max = "SELECT MAX(id) AS id FROM tborder ";
				$rec = $objdb->query_first($sql_max);
				$max = $rec["id"]+1;

				if ($arr[5] == "����")
				{
					$unitsign = "1";
				}
				elseif ($arr[5] == "����Է�����")
				{
					$unitsign = "2";
				}

				$year = (date("Y")+543);

				$datesign = sqlthaidate($arr[3]);
				$dateeffect = sqlthaidate($arr[4]);

				$title = $arr[6];
				$amount_old = $arr[7];
				$amount = $arr[8];
				$remuneration = $arr[9];
				$levelup = $arr[10];
				$amount_up = $arr[11];
				$note = $arr[12];
				
				$import = "INSERT INTO tborder(id,year,round,empid,orderno,datesign,dateeffect,unitsign ";
				$import .= ",title,amount_old,amount,remuneration,levelup,amount_up,note,datein,userin) ";
				$import .="VALUES ";
				$import .="('".$max."','$year','$round','".$arr[0]."','".$arr[2]."' ";
				$import .=",'".$datesign."','".$dateeffect."','".$unitsign."' ";
				$import .=",'".$title."','".$amount_old."','".$amount."','".$remuneration."','".$levelup."','".$amount_up."' ";
				$import .=",'".$note."','".$datetime."','".$userin."') ";
				//echo $import."<br>";
				$exe = $objdb->query($import);
				if (!$exe)
				{
					$objdb->rollback();
					$result = 0;
					break;
				}
				else
				{
					$result = 1;
					if ($arr[13] == "1")
					{
						$sql = "SELECT MAX(id) AS id FROM tbworkerfull ";
						$recmax = $objdb->query_first($sql);
						$maxfull = $recmax["id"]+1;
						$import2 = "INSERT INTO tbworkerfull VALUES('$maxfull','".$arr[0]."','".$arr[8]."','$datetime','$userin')";
						$exe2 = $objdb->query($import2);
						if (!$exe2)
						{
							$objdb->rollback();
							$result = 0;
							break;
						}
						else
						{
							$result = 1;
						}
					}
				}
			}//End if i
			$i++;
		}//End while
		fclose($csv);
		if ($result > 0)
		{
			$objdb->commit();
			echo "<script>alert('�ѹ�֡���º����');window.location='index.php';</script>";
		}
	}//End move_uploaded_file
	else
	{
		echo "<script>alert('�ѧ��������͡��� CSV');window.history.back();</script>";
	}
}
?>

<link href="../bootstrap-4.0/fileinput/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="../bootstrap-4.0/fileinput/fileinput/fileinput.js" type="text/javascript"></script>
<script src="../bootstrap-4.0/fileinput/fileinput/fileinput_locale_fr.js" type="text/javascript"></script>
<script src="../bootstrap-4.0/fileinput/fileinput/fileinput_locale_es.js" type="text/javascript"></script>

<div class="col-lg-12">
	<h1 class="page-header">˹ѧ��ͤ����</h1>
</div><!-- /.col-lg-12 -->

<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<strong>������ҧ����͡���Ṻ</strong>
        </div>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th width="10%" rowspan="2">SAPID</th>
                    <th width="15%" rowspan="2">����-���ʡ��</th>
					<th width="10%" rowspan="2">�Ţ�������</th>
					<th width="10%" rowspan="2">�ѹ���ŧ���</th>
					<th width="10%" rowspan="2">�ѹ����ռźѧ�Ѻ��</th>
                    <th width="10%" rowspan="2">˹��§ҹ����͡�����</th>
                    <th width="10%" rowspan="2">����ͧ</th>
					<th width="10%" rowspan="2">�Թ��͹���</th>
					<th width="10%" colspan="2">����͹������Ѻ</th>
					<th width="5%" rowspan="2">�����з������͹</th>
					<th width="5%" rowspan="2">�ӹǹ�Թ�������͹</th>
					<th width="30%" rowspan="2">�����˵ط��������Ѻ�������͹</th>
					<th width="5%" rowspan="2">ʶҹ��Թ��͹</th>
                </tr>
				<tr>
					<th>�Թ��͹</th>
					<th>��ҵͺ᷹�����</th>
                </tr>
            </thead>
            <tbody>
				<tr class="odd gradeX">
					<td>10000000</td>
                    <td>xxxxx xxxxxxx</td>
					<td>1/2560</td>
                    <td class="center">2017-01-01</td>
                    <td class="center">2017-01-01</td>
                    <td class="center">����</td>
					<td class="center">xxxxxxxxxxx</td>
					<td class="center">150000</td>
					<td class="center">165000</td>
					<td class="center">15000</td>
					<td class="center">10</td>
					<td class="center">15000</td>
					<td>xxxxxxxxx</td>
					<td>1</td>
                </tr>
				<tr class="odd gradeX">
					<td>10000001</td>
                    <td>aaaaa xxxxxxx</td>
					<td>1/2560</td>
                    <td class="center">2017-01-01</td>
                    <td class="center">2017-01-01</td>
                    <td class="center">����Է�����</td>
					<td class="center">xxxxxxxxxxx</td>
					<td class="center">10000</td>
					<td class="center">11000</td>
					<td class="center">0</td>
					<td class="center">10</td>
					<td class="center">1000</td>
					<td>xxxxxxxxx</td>
					<td>0</td>
                </tr>
				<tr class="odd gradeX">
					<td colspan="14">1 = �Թ��͹�ѹ ,0 = �Թ��͹�ѧ���ѹ</td>
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
				<label>�ͺ</label>
				<input type="text" name="round" class="form-control" value="" required>
			</div><!-- form-group -->
			<div class="form-group">
				<label>�͡���Ṻ</label>
				<input id="input-2" name="fileCSV" type="file" class="file"  data-show-upload="false" data-show-caption="true" data-show-preview="false" accept=".csv">
			</div><!-- form-group -->

			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-success">�ѹ�֡</button>
				<button type="reset" class="btn btn-warning">¡��ԡ</button>
			</div><!-- form-group -->
		</div>
	</form>
</div><!-- row -->

<?php
require("../inc/footer.php");
?>