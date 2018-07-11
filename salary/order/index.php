<?php
require("../inc/header.php");
?>
<div class="col-lg-12">
	<h1 class="page-header">˹ѧ��ͤ����</h1>
</div><!-- /.col-lg-12 -->

<div class="row">
	<form role="form" method="post" action="search.php">
		<input type="hidden" name="hdncmd" value="search">
		<div class="col-lg-6">	
			<div class="form-group">
				<label>�Ң��Ԫ�</label>
				<select class="form-control" name="unit" id="unit">
					<option value="0" selected>-----���͡�Ң��Ԫ�-----</option>
					<?php
					$sql_unit = "SELECT unitid,unitname FROM $hrmed.mtunit ";
					$arr_unit = $objdb->getArray($sql_unit);
					if ($arr_unit > 0)
					{
						foreach ($arr_unit as $unit)
						{
					?>
							<option value="<?=$unit["unitid"];?>"><?=$unit["unitname"];?></option>
					<?php
						}
					}
					?>
				</select>
			</div><!-- form-group -->

			<div class="form-group">
				<label>�Ţ�������</label>
				<input type="text" class="form-control" name="orderno" id="orderno" placeholder="�Ţ�������" value="">
			</div><!-- form-group -->

			<div class="form-group col-lg-3">
				<button type="submit" class="btn btn-info">����</button>
			</div><!-- form-group -->
		</div><!-- col-lg-6 -->

		<div class="col-lg-6">	
			<div class="form-group">
				<label>���ͼ�黯Ժѵԧҹ</label>
				<select class="form-control" name="employee" id="employee">
					<option value="" selected>-----���͡����-----</option>
				</select>
			</div><!-- form-group -->

			<div class="form-group">
				<label>��������è�ҧ</label>
				<select class="form-control" name="typeid" id="typeid">
					<option value="" selected>-----���͡��������è�ҧ-----</option>
					<option value="1">����Ҫ���</option>
					<option value="7">��ѡ�ҹ����Է�����</option>
					<option value="11">��ѡ�ҹ����Է����� ���ᾷ���ʵ�������Ҫ��Һ��</option>
					<option value="4">�١��ҧ��Ш��Թ������ҳ�</option>
					<option value="5">�١��ҧ��Ш��Թ����餳��</option>
				</select>
            </div><!-- form-group -->
		</div><!-- col-lg-6 -->
	</form>
</div>
	
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="add_form.php" ><strong>+++������¡��+++</strong></a>
			&nbsp;/&nbsp;
			<a href="import.php" ><strong>+++����������¡��+++</strong></a>
			&nbsp;/&nbsp;
			<a href="file.php" ><strong>+++�͡���Ṻ+++</strong></a>
        </div>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th width="10%">SAPID</th>
					<th width="20%">����</th>
					<th width="10%">�Ţ�������</th>
                    <th width="15%">�ѹ���ŧ���</th>
                    <th width="30%">����ͧ</th>
					<th width="30%">�Թ��͹���</th>
                    <th width="25%">�����˵�</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT *,o.id AS 'order' 
					FROM tborder AS o 
					INNER JOIN $hrmed.tbemployee AS e ON o.empid=e.empid Collate Thai_CI_AI 
					INNER JOIN $hrmed.tbempwork AS w ON e.id=w.id 
					INNER JOIN $hrmed.mtposition AS p ON w.positionid=p.positionid 
					INNER JOIN $hrmed.mtpositiontype AS pt ON p.positiontypeid=pt.positiontypeid
					ORDER BY e.empid DESC  
				";
				//echo $sql;
				$arr = $objdb->getArray($sql);
				if (count($arr) > 0)
				{
					foreach ($arr AS $rec)
					{
						if ($rec["emprankname"] == "" OR $rec["emprankname"] == " ")
						{
							switch ($rec["emptitle"])
							{
								case 1:
									$rank = "���";
									break;
								case 2:
									$rank = "�ҧ���";
									break;
								case 3:
									$rank = "�ҧ";
									break;
							}
						}
						else
						{
							switch ($rec["emptitle"])
							{
								case 1:
									$rank = "��.";
									break;
								case 2:
									$rank = "��.";
									break;
								case 3:
									$rank = "��.";
									break;
							}
							$rank = $rec["spositionname"].$rank;
						}
						
						if ($rec["title"] == " " OR $rec["title"] == "")
						{
							$title = "";
						}
						else
						{
							$title = $rec["title"];
							//$title = $aes->decrypt(asciitotext($rec["title"]));
						}

						if ($rec["amount_old"] == " " OR $rec["amount_old"] == "")
						{
							$amount_old = "";
						}
						else
						{
							$amount_old = $rec["amount_old"];
							//$amount_old = $aes->decrypt(asciitotext($rec["amount_old"]));
						}

						if ($rec["note"] == " " OR $rec["note"] == "")
						{
							$note = "";
						}
						else
						{
							$note = $rec["note"];
							//$note = $aes->decrypt(asciitotext($rec["note"]));
						}
				?>
						<tr class="odd gradeX">
							<td><?=$rec["empid"]?></td>
							<td><a href="edit_form.php?id=<?=$rec["order"]?>"><?=$rank?>&nbsp;<?=$rec["empname"]?>&nbsp;<?=$rec["empsname"]?></a></td>
							<td><?=$rec["orderno"]?></td>
							<td><?=thaidate543($rec["datesign"])?></td>
							<td class="center"><?=$title?></td>
							<td class="center"><?=$amount_old?></td>
							<td class="center"><?=$note?></td>
						</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table><!-- /.table-responsive -->
	</div><!-- /.panel -->
</div><!-- /.col-lg-12 -->

<?php
require("../inc/footer.php");
?>