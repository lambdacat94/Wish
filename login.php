<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<body>
</body>
</html>

<?
include('function.php');
session_start();
if(!empty($_POST['username']))
{
if($_POST['username'] == $DB->admin)
	{
	if($_POST['password'] == $DB->password)
		{
		$_SESSION['admin']=$DB->admin;
		echo "<script>alert('登陆成功!');location.href='admin.php';</script>";
		}
		else
			{
			echo "<script>alert('密码错误!');</script>";
			}
			}
			else
				{
				echo "<script>alert('用户名错误!');</script>";
				}
}
?>
<style type="text/css">
body {
	background-image: url(images/bg.jpg);
}
</style>


<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<form action="" method="post"><td align="center" valign="middle"><table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="tablebg">
<tr class="tdbg">
<td colspan="2" bgcolor="#FFFFFF"><div align="center">后台登录</div></td>
</tr>
<tr class="tdbg">
<td bgcolor="#FFFFFF"><div align="center">用户名</div></td>
<td bgcolor="#FFFFFF"><div align="center">
<input name="username" type="text" id="username">
</div></td>
</tr>
<tr class="tdbg">
<td bgcolor="#FFFFFF"><div align="center">密码</div></td>
<td bgcolor="#FFFFFF"><div align="center">
<input name="password" type="password" id="password">
</div></td>
</tr>
<tr class="tdbg">
<td colspan="2" bgcolor="#FFFFFF"><div align="center">
<input type="submit" name="Submit" value="登陆">
 <input type="reset" name="Submit2" value="重设">
</div></td>
</tr>
<tr class="tdbg">
  <td colspan="2" bgcolor="#FFFFFF"><a href="index.php">返回许愿墙</a></td>
</tr>
</table></td></form>
</tr>
</table>


