<?php
require("../inc/header.php");
?>

<div class="col-lg-12">
	<h1 class="page-header">��§ҹ</h1>
</div><!-- /.col-lg-12 -->

<div class="row">
	<form role="form" method="post" action="chkreport.php" target="_blank">
		<input type="hidden" name="hdncmd" value="search">
		<div class="col-lg-6">
			<div class="form-group">
				<label>��������§ҹ</label>
				<select class="form-control" name="report" id="report">
					<option value="0" selected>-----���͡��§ҹ-----</option>
					<option value="1">Ẻ�駼š������͹�Թ��͹</option>
					<option value="2">Ẻ�駼š������͹�Թ��͹ - �͡���ŧ���</option>
					<option value="3">Ẻ�Ԩ�óҡ������͹����Թ��͹</option>
					<option value="4">��§ҹ�������Թ��͹</option>
				</select>
			</div><!-- form-group -->
			<div class="form-group">
				<label>�Ң��Ԫ�</label>
				<select class="form-control" name="unit" id="unit">
					<option value="0" selected>-----���͡�Ң��Ԫ�-----</option>
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
				<label>��黯Ժѵԧҹ</label>
				<select class="form-control" name="employee" id="employee">
				</select>
			</div><!-- form-group -->

			<div class="form-group">
				<label>��������è�ҧ</label>
				<select class="form-control" name="typeid" id="typeid">
					<option value="" selected>-----���͡��������è�ҧ-----</option>
					<option value="1">����Ҫ���</option>
					<option value="7">��ѡ�ҹ����Է�����</option>
					<option value="11">��ѡ�ҹ����Է����� ���ᾷ���ʵ�������Ҫ��Һ��</option>
					<option value="4">�١��ҧ��Ш��Թ������ҳ�蹴Թ</option>
					<option value="5">�١��ҧ��Ш��Թ����餳�ᾷ���ʵ�������Ҫ��Һ��</option>
					?>
				</select>
			</div><!-- form-group -->

			<div class="form-group">
				<label>���������</label>
				<select class="form-control" name="class" id="class">
					<option value="" selected>-----���͡���������-----</option>
					<option value="1">����Ԫҡ��</option>
					<option value="2">���ʹѺʹع</option>
					?>
				</select>
			</div><!-- form-group -->

			<!-- <div class="form-group">
				<label>��</label>
				<input type="text" class="form-control" name="years" id="years" value="">
			</div> --><!-- form-group -->

			<div class="form-group">
				<label>�����˵�</label>
				<textarea name="note" class="form-control" rows="5"></textarea>
			</div><!-- form-group -->

			<input type="submit" id="submit" class="btn btn-success" value="����">
		</div><!-- col-lg-6 -->

		<!-- <div class="col-lg-6">	
			<div class="form-group">
				<label>���ͼ�黯Ժѵԧҹ</label>
				<select class="form-control" name="employee" id="employee">
					<option value="" selected>-----���͡����-----</option>
				</select>
			</div> --><!-- form-group -->

			<!-- <div class="form-group">
				
            </div> --><!-- form-group -->

			<!-- <div class="form-group col-lg-3">
				<label><font size="" color="#ffffff">Search</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
				<button type="submit" class="btn btn-info">����</button>
			</div> --><!-- form-group -->
		<!-- </div> --><!-- col-lg-6 -->
	</form>
</div><!-- row -->
	

<?php
require("../inc/footer.php");
?>