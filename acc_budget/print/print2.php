<?php
//session_start();
 require("thai_date.php");
 require("char.php");
?>
<!DOCTYPE>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
   <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   <!-- Mobile viewport optimized: h5bp.com/viewport -->
   <meta name="viewport" content="width=device-width">

   <!-- <link rel="stylesheet" type="text/css" href="font/font.css"> -->

   <title>.: [i - MED : Account ] ...</title>
<?php
  require("../database.mssql.class/config.acc.inc.php");
 // require("../function/function.php");
  // $objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);
 // $arr_budget_type = array("1"=>"������ҳ�ҡ���","2"=>"�����Ҫ��ŹԸ�");
  
 //$objdb = new MSDatabase($strHost,$strDB,$strUser,$strPassword);


 $id = $_GET["id"];
 
 $sql="SELECT     bw.withdraw_ref, bw.budget_year, bw.withdraw_id, bw.dis_id, bw.act_id, bw.detail, bw.act_date, bw.act_emp, bw.emp_id, bw.emp_address, bw.amount1, 
                      bw.amount1_file, bw.amount2, bw.amount2_file, bw.amount3, bw.amount_total, bw.amount_aval, bw.budget_id, bw.amount_valid, bw.bank_account, bw.budget_status 
                      ,emp.emprank,emp.emprankname, emp.empname, emp.empsname,positionname
FROM         budget_withdraw AS bw 
					 INNER JOIN View_tbemployee AS emp ON bw.emp_id = emp.empid collate Thai_CI_AS
					 INNER JOIN View_tbempwork AS ew ON emp.empid = ew.empid
					 INNER JOIN View_mtposition AS mp ON ew.workposition = mp.positionid
WHERE     (bw.withdraw_ref = '$id')
 ";
 $query=mssql_query($sql);
 $exe=mssql_fetch_array($query);

 $total_price=$exe["amount2"];

 $eng_date=strtotime($exe["act_date"]);   
 //echo thai_date($eng_date);  

 $price=number_format($total_price,2);
//$price=number_format(1,2);
 $pieces = explode(".", $price);

$name = $exe["emprank"].$exe["empname"]." ".$exe["empsname"];
$position = $exe["positionname"];
 ?>
 <body>
<input type="button" name="Button" id="bt" value="��������§ҹ" onClick="javascript:this.style.display='none';window.print();">
<table border="0" height="900" width="800" cellpadding="10">
<tr>
	<td valign="top" align="center" height="100">
		<table border="0">
		<tr>
			<th><img src="img/head.png" width="100" height="100" border="0" alt=""></th>
		</tr>
		<tr>
			<th style="padding:10px"><p class="ft">��Ѻ�᷹ͧ������Ѻ�Թ</p></th>
		</tr>
		<tr>
			<th><p class="ft">��ǹ�ҹ �Ҥ�Ԫ��������ʵ�� ���ᾷ����ʵ�������Ҫ��Һ��</p></th>
		</tr>
		</table>
	</td>
</tr>

<tr>
	<td valign="top" align="center" height="580">
		<table width="100%" height="100%" border="1" cellpadding="5" cellspacing="0">
		<tr>
			<th width="15%" height="5%" rowspan="2"><p class="ft">�ѹ ��͹ ��</p></th>
			<th width="50%"  height="5%" rowspan="2"><p class="ft">��������´��è���</p></th>
			<th width="20%"  height="5%" colspan="2"><p class="ft">�ӹǹ�Թ</p></th>
			<th width="15%"  height="5%" rowspan="2"><p class="ft">�����˵�</p></th>
		</tr>
		<tr>
			
			<th width="12%" height="5%" align="right"><p class="ft">�ҷ</p></th>
			<th width="10%" height="5%" align="right"><p class="ft">ʵ.</p></th>

		</tr>
		<tr>
			<td valign="top"><p class="ft"><?= thai_date2($eng_date);?></p></td>
			<td >
				<table height="100%" width="100%">
				<tr>
					<td valign="top"><p class="ft"><?=$exe["detail"]?></p></td>
				</tr>
				<tr>
					<td valign="bottom" align="center">
					<p class="ft">���Ѻ�ͧ�����㹡�û�Ժѵԧҹ��ԧ
					<br><br><br>
					ŧ����.....................................
					<br>
					<!-- (�ҧ���͹��� �ش�����) -->
					(�ͧ��ʵ�Ҩ������ᾷ�����ѵ�� �����ԡ��)
					<br>
					<!-- ���˹�ҷ������çҹ����� -->
					���˹���Ҥ�Ԫ��������ʵ��
					</p>
					</td>
				</tr>
				</table>
			</td>
			<td valign="top" align="right"><p class="ft"><?=$pieces[0];?></p></td>
			<td valign="top" align="right"><p class="ft"><?=$pieces[1];?></p></td>
			<td valign="top"></td>
		</tr>
		<tr>
			<td colspan="2" height="5%">
			<p class="ft">������Թ&nbsp;<strong>(����ѡ��)</strong>&nbsp;
			<?php
			$x = new hk_baht($total_price);
			$total=$x->result;
			echo "<strong>(".$total.")</strong>"
			?></p>
			</td>
			<td valign="top" align="right"><p class="ft"><?=$pieces[0];?></p></td>
			<td valign="top" align="right"><p class="ft"><?=$pieces[1];?></p></td>
			<td></td>
		</tr>
		</table>
	</td>
</tr>

<tr>
	<td valign="top" height="150">
	<!-- <p class="ft">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ҿ��� �ҧ���͹��� �ش����� ���˹� ���˹�ҷ������çҹ����� ˹��§ҹ����ѧ�Ѵ �Ҥ�Ԫ��������ʵ�� ���Ѻ�ͧ��� ��¨��¢�ҧ�鹹�� ����Ҩ���¡������Ѻ�Թ�ҡ����Ѻ�Թ�� ��Т�Ҿ���������㹧ҹ�ͧ����Է����¨�ԧ</p> -->
	<p class="ft">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ҿ��� <?=$name?> ���˹� <?=$position?> ˹��§ҹ����ѧ�Ѵ �Ҥ�Ԫ��������ʵ�� ���Ѻ�ͧ��� ��¨��¢�ҧ�鹹�� ����Ҩ���¡������Ѻ�Թ�ҡ����Ѻ�Թ�� ��Т�Ҿ���������㹧ҹ�ͧ����Է����¨�ԧ</p>
	</td>
</tr>

<tr>
	<td valign="top" align="right" height="20">

	<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td width="50%"></td>
			<td align="center" valign="top">
			<p class="ft">ŧ����.....................................�������Թ
			<br>
				(<?=$name?>)
				<!-- (�ҧ���͹��� �ش�����) -->
				<br><br>
				<?= thai_date($eng_date);?>
			</p>
			</td>
		</tr>
		</table>
	</td>
</tr>

</table>
</body>
</html>