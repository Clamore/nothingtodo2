<?php
require("../inc/header.php");
?>

<script type="text/javascript" src="../datetimepicker/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../datetimepicker/js/jquery.maskedinput.js"></script>

<script>
	$.noConflict();
	jQuery(document).ready(function($){
		$("input[id^='datetime']").mask("99/99/9999");	
	});
</script>

<div class="col-lg-12">
	<h1 class="page-header">ประเมินผล</h1>
</div><!-- /.col-lg-12 -->

<div class="row">
	<form role="form" method="post" action="search.php">
		<input type="hidden" name="hdncmd" value="search">
		<div class="col-lg-6">	
			<div class="form-group">
				<label>สาขาวิชา</label>
				<select class="form-control" name="unit" id="unit">
					<option value="0" selected>-----เลือกสาขาวิชา-----</option>
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
					<?php
					$sql_unit = "SELECT subunitid,subunitname FROM $hrmed.mtsubunit ";
					$arr_unit = $objdb->getArray($sql_unit);
					if ($arr_unit > 0)
					{
						foreach ($arr_unit as $unit)
						{
					?>
							<option value="<?=$unit["subunitid"];?>"><?=$unit["subunitname"];?></option>
					<?php
						}
					}
					?>
				</select>
			</div><!-- form-group -->

			<div class="form-group">
				<label>ประเภทสาย</label>
				<select class="form-control" name="type">
					<option value="0" selected>เลือกสายงาน</option>
					<option value="1">สายวิชาการ</option>
					<option value="2">สายสนับสนุน</option>
				</select>
			</div><!-- form-group -->

			<div class="form-group col-lg-6">
				<label>คะแนนประเมิน</label>
				<input type="text" class="form-control" name="evaluate" placeholder="ระบุคะแนน" value="">
            </div><!-- form-group -->

			<div class="form-group col-lg-6">
				<label>คะแนนทักษะ</label>
                <input type="text" class="form-control" name="skill" placeholder="ระบุคะแนน" value="">
            </div><!-- form-group -->
		</div>

		<div class="col-lg-6">	
			<div class="form-group">
				<label>ชื่อผู้ปฏิบัติงาน</label>
				<select class="form-control" name="employee" id="employee">
					<option value="" selected>-----เลือกชื่อ-----</option>
				</select>
			</div><!-- form-group -->

			<div class="form-group col-lg-6">
				<label>ตั้งแต่วันที่</label>
				<input type="text" class="form-control" name="datestart" id="datetime" placeholder="วว/ดด/ปป" value="">
            </div><!-- form-group -->

			<div class="form-group col-lg-6">
				<label>ถึงวันที่</label>
                <input type="text" class="form-control" name="datestop" id="datetime" placeholder="วว/ดด/ปป" value="">
            </div><!-- form-group -->

			<div class="form-group col-lg-3">
				<label><font size="" color="#ffffff">Search</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<button type="submit" class="btn btn-info">ค้นหา</button>
			</div><!-- form-group -->
		</div>
	</form>
</div>

<hr>

<div class="col-lg-12">
	<a href="add_form.php" ><strong>+++เพิ่มรายการ+++</strong></a>
	&nbsp;/&nbsp;
	<a href="import.php" ><strong>+++เพิ่มเป็นชุด+++</strong></a>
</div><!-- /.col-lg-12 -->

<div class="col-lg-12">
	<div class="panel panel-default">
		<table width="100%" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th width="20%"><a href="#" id="name">ชื่อ</a></th>
                        <th width="15%"><a href="#" id="type">ประเภทสาย</a></th>
						<th width="5%">ปี/รอบ</th>
                        <th width="10%"><a href="#" id="evaluate">การประเมินผล</a></th>
                        <!-- <th width="10%"><a href="#" id="skill">คุณลักษณะการปฏิบัติงาน</a></th>
                        <th width="10%">คะแนนรวม</th> -->
						<th width="30%">ข้อคิดเห็น</th>
                    </tr>
                </thead>
                <tbody id="eva">
					<?php
					$sql_emp = "SELECT DISTINCT empid FROM tbevaluate ";
					$arr_emp = $objdb->getArray($sql_emp);
					//$year = Date("Y");
					//$eva = $year."-10-01";
					//$eva = $maxdate["dates"];
					if ($arr_emp > 0)
					{
						foreach ($arr_emp AS $emp)
						{
							$empid = $emp["empid"];
							$sql = "SELECT *,YEAR(datestop) AS year  
								FROM tbevaluate AS ev 
								INNER JOIN $hrmed.tbemployee AS e ON ev.empid=e.empid Collate Thai_CI_AI 
								INNER JOIN $hrmed.tbempwork AS w ON e.id=w.id
								INNER JOIN $hrmed.mtposition AS p ON w.positionid=p.positionid 
								WHERE datestart <> '1900-01-01' AND ev.empid = '$empid' 
								ORDER BY ev.empid ASC,ev.datestop DESC 
							";
							//echo $sql;
							$rec = $objdb->query_first($sql);
								switch ($rec["emptitle"])
									{
										case 1:
											$rank1 = "นาย";
											$rank2 = "นพ.";
											break;
										case 2:
											$rank1 = "นางสาว";
											$rank2 = "พญ.";
											break;
										case 3:
											$rank1 = "นาง";
											$rank2 = "พญ.";
											break;
									}

								if ($rec["emprankname"] == "" OR $rec["emprankname"] == " ")
								{
									$rank = $rank1;
								}
								else
								{
									$rank = $rec["spositionname"].$rank2;
								}

								switch ($rec["type"])
								{
									case 1:
										$type = "สายวิชาการ";
										break;
									case 2:
										$type = "สายสนับสนุน";
										break;
								}

								if ($rec["evaluate"] == " ")
								{
									$evaluate = "";
								}
								else
								{
									$evaluate = $rec["evaluate"];
									//$evaluate = $aes->decrypt(asciitotext($rec["evaluate"]));
								}

								if ($rec["skill"] == " ")
								{
									$skill = "";
								}
								else
								{
									$skill = $rec["skill"];
									//$skill = $aes->decrypt(asciitotext($rec["skill"]));
								}

								if ($rec["suggest"] == " ")
								{
									$suggest = "";
								}
								else
								{
									$suggest = $rec["suggest"];
									//$suggest = $aes->decrypt(asciitotext($rec["suggest"]));
								}
					?>
								<tr class="odd gradeX">
									<td>
										<a href="edit_form.php?emp=<?=$rec["empid"]?>">
											<?=$rank?>&nbsp;<?=$rec["empname"]?>&nbsp;<?=$rec["empsname"]?>
										</a>
									</td>
									<td><?=$type?></td>
									<td><?=$rec["year"]+543;?>/<?=$rec["round"];?></td>
									<td class="center"><?=$evaluate;?></td>
									<!-- <td class="center"><?=$skill;?></td>
									<td class="center"><?=$evaluate+$skill;?></td> -->
									<td><?=$suggest?></td>
								</tr>
					<?php
							

						}//End foreach emp
					}// End if count emp
					?>
					<!-- <tr class="odd gradeX">
						<td><a href="">AAAAAAAAAAAAA</a></td>
                        <td>สายวิชาการ</td>
                        <td class="center">70</td>
                        <td class="center">30</td>
                        <td class="center">100</td>
						<td>ข้อคิดเห็นและเสนอแนะ</td>
                    </tr>
                    <tr class="even gradeC">
						<td><a href="">BBBBBBBBBBBBB</a></td>
                        <td>สายสนับสนุนวิชาการ</td>
                        <td class="center">70</td>
                        <td class="center">30</td>
                        <td class="center">100</td>
						<td>ข้อคิดเห็นและเสนอแนะ</td>
                    </tr>
                    <tr class="odd gradeA">
						<td><a href="">CCCCCCCCCCCC</a></td>
                        <td>สายสนับสนุนวิชาชีพเฉพาะ</td>
                        <td class="center">70</td>
                        <td class="center">30</td>
                        <td class="center">100</td>
						<td>ข้อคิดเห็นและเสนอแนะ</td>
                    </tr>
					<tr class="odd gradeA">
						<td><a href="">DDDDDDDDDDDD</a></td>
                        <td>สายสนับสนุนทั่วไป</td>
                        <td class="center">70</td>
                        <td class="center">30</td>
                        <td class="center">100</td>
						<td>ข้อคิดเห็นและเสนอแนะ</td>
                    </tr> -->
				</tbody>
			</table><!-- /.table-responsive -->
	</div><!-- /.panel-default -->
</div><!-- /.col-lg-12 -->

<?php
require("../inc/footer.php");
?>