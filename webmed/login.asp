<% session.CodePage ="65001"%>
<!--#include file="header.asp"-->

<!--#include file="menu.asp"-->

<script language="javascript">
function fncSubmit()
{
	if(document.loginform.username.value == "")
	{
		alert('กรุณากรอก Username');
		document.loginform.username.focus();
		return false;
	}	
	if(document.loginform.password.value == "")
	{
		alert('กรุณากรอก Password');
		document.loginform.password.focus();		
		return false;
	}
	/*if (document.loginform.chosie.value == "")
	{
		alert('กรุณาเลือกประเภทบุคคลด้วย');
		document.loginform.chosie.focus();
		return false;
	}*/
	
	document.loginform.submit();
}
</script>
<td class="f2">

<%
Dim online1,online2,reconline1,reconline2,dd
dd=Date()

online1="select count(*) as online1 from useronline where onoff > 0 and types='St' "
Set reconline1=con.execute(online1)

online2="select count(*) as online2 from useronline where onoff > 0 and types='Staff' "
Set reconline2=con.execute(online2)
%>

<div>
<form name="loginform" method="post" action="loging.asp" >
<!--<input type="hidden" name="action" value="submit"/> -->
<p>
<table class="logg" border="0" cellspacing="1" cellpadding="3" width="350" align="center">
<tr align="center">
	<td colspan="2"  align="center" class="logg1" height="25px">เข้าสู่ระบบ  
		</td>
</tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
            
	<td class="tabright"  width="100"><label for="login">Username :</label></td>
	<td><input type="text" name="username" id="username"  size="20" maxlength="20"/></td>
</tr>
<tr>
	<td class="tabright"><label for="password">Password :</label></td>
              <td><input name="password" type="password" class="input" id="password"  size="20" maxlength="20"/></td>
</tr>

<!-- <tr><td colspan="2" align="center">
<select name="chosie">
	<option value="" selected>กรุณาเลือก</option>
	<option value="อาจารย์" >อาจารย์/เจ้าหน้าที่</option>
	<option value="บุคคลทั่วไป">แพทย์/นักศึกษาแพทย์</option>
</select></td></tr> -->

<tr >
	<td colspan="2"  align="center">
		<input type="submit" value="ตกลง"/> <input type="reset" value="ยกเลิก"/>
	</td>
</tr>
<tr >
	<td colspan="2"  align="center">
		<a href="javascript:popup3();">ลืมรหัสผ่าน</a>
	</td>
</tr>
<tr >
	<td colspan="2"  align="center">
		<a href="javascript:popup2();">ตรวจสอบสิทธิ์การใช้งาน</a>
	</td>
</tr>
<tr >
	<td colspan="2"  align="center">
		<a href="change_password.pdf">แบบฟอร์มกู้รหัสผ่าน</a>
	</td>
</tr>
<tr >
	<td colspan="2"  align="center">
		<a href="sap.asp">แบบประเมิน</a>
	</td>
</tr>
<!-- <tr>
	<td rowspan="2" align="right"><font size="" color="#ff0000">ขณะนี้มีผู้ใช้ระบบ </font></td>
	<td><font size="" color="#ff0000">แพทย์/นักศึกษาแพทย์&nbsp;&nbsp;</font><font size="" color="#33cc00"><%=reconline1.fields("online1").value%></font>&nbsp;&nbsp;<font size="" color="#ff0000">คน</font></td>
</tr>
<tr>
	<td><font size="" color="#ff0000">อาจารย์/เจ้าหน้าที่&nbsp;&nbsp;</font><font size="" color="#33cc00"><%=reconline2.fields("online2").value%></font>&nbsp;&nbsp;<font size="" color="#ff0000">คน</font></td>
</tr> -->
</table>
</form>
    </div>
<br>

</td>
</tr>
</table>


<!--#include file="footer.asp"-->

