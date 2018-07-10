<?php
require("../inc/header.php");
?>

<div class="col-lg-12">
	<h1 class="page-header">รายงาน</h1>
</div><!-- /.col-lg-12 -->

<div class="row">
	<form role="form" method="post" action="chkreport.php" target="_blank">
		<input type="hidden" name="hdncmd" value="search">
		<div class="col-lg-6">
			<div class="form-group">
				<label>ประเภทรายงาน</label>
				<select class="form-control" name="report" id="report">
					<option value="0" selected>-----เลือกรายงาน-----</option>
					<option value="1">แบบแจ้งผลการเลื่อนเงินเดือน</option>
					<option value="2">แบบแจ้งผลการเลื่อนเงินเดือน - เอกสารลงนาม</option>
					<option value="3">แบบพิจารณาการเลื่อนขั้นเงินเดือน</option>
					<option value="4">รายงานข้อมูลเงินเดือน</option>
				</select>
			</div><!-- form-group -->
			<div class="form-group">
				<label>สาขาวิชา</label>
				<select class="form-control" name="unit" id="unit">
					<option value="0" selected>-----เลือกสาขาวิชา-----</option>
					<?php
					$sqlunit = "SELECT * FROM $hrmed.mtunit ORDER BY unitid ";
					$arr = $objdb->getArray($sqlunit);
					if ($arr > 0)
					{
						foreach ($arr AS $rec)
						{
					?>
							<option value="<?=$rec["unitid"]?>"><?=$rec["unitname"]?></option>
					<?php
						}
					}
					?>
				</select>
			</div><!-- form-group -->

			<div class="form-group">
				<label>ผู้ปฏิบัติงาน</label>
				<select class="form-control" name="employee" id="employee">
				</select>
			</div><!-- form-group -->

			<div class="form-group">
				<label>ประเภทการจ้าง</label>
				<select class="form-control" name="typeid" id="typeid">
					<option value="" selected>-----เลือกประเภทการจ้าง-----</option>
					<option value="1">ข้าราชการ</option>
					<option value="7">พนักงานมหาวิทยาลัย</option>
					<option value="11">พนักงานมหาวิทยาลัย คณะแพทยศาสตร์ศิริราชพยาบาล</option>
					<option value="4">ลูกจ้างประจำเงินงบประมาณแผ่นดิน</option>
					<option value="5">ลูกจ้างประจำเงินรายได้คณะแพทยศาสตร์ศิริราชพยาบาล</option>
					?>
				</select>
			</div><!-- form-group -->

			<div class="form-group">
				<label>ประเภทสาย</label>
				<select class="form-control" name="class" id="class">
					<option value="" selected>-----เลือกประเภทสาย-----</option>
					<option value="1">สายวิชาการ</option>
					<option value="2">สายสนับสนุน</option>
					?>
				</select>
			</div><!-- form-group -->

			<!-- <div class="form-group">
				<label>ปี</label>
				<input type="text" class="form-control" name="years" id="years" value="">
			</div> --><!-- form-group -->

			<div class="form-group">
				<label>หมายเหตุ</label>
				<textarea name="note" class="form-control" rows="5"></textarea>
			</div><!-- form-group -->

			<input type="submit" id="submit" class="btn btn-success" value="ค้นหา">
		</div><!-- col-lg-6 -->

		<!-- <div class="col-lg-6">	
			<div class="form-group">
				<label>ชื่อผู้ปฏิบัติงาน</label>
				<select class="form-control" name="employee" id="employee">
					<option value="" selected>-----เลือกชื่อ-----</option>
				</select>
			</div> --><!-- form-group -->

			<!-- <div class="form-group">
				
            </div> --><!-- form-group -->

			<!-- <div class="form-group col-lg-3">
				<label><font size="" color="#ffffff">Search</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<button type="submit" class="btn btn-info">ค้นหา</button>
			</div> --><!-- form-group -->
		<!-- </div> --><!-- col-lg-6 -->
	</form>
</div><!-- row -->
	

<?php
require("../inc/footer.php");
?>