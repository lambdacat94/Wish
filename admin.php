<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" >
<html>
<head>
<title>后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="generator" content="">
<meta name="MSSmartTagsPreventParsing" content="TRUE">
<meta http-equiv="MSThemeCompatible" content="Yes">
</head>
<body>
<?php
include( 'function.php' );
session_start();
if($_SESSION['admin'] !== $DB->admin)
{
	
}

if ( $_POST['submit'] )
{
	if ( is_array( $_POST['delcheck'] ) && count( $_POST['delcheck'] ) > 0 )
	{
		$delStr = implode( ',', $_POST['delcheck'] );
		DeleteWish( $delStr );
	}
}

if ( !isset( $_GET['page'] ) || empty( $_GET['page'] ) || !is_numeric( $_GET['page'] ) || $_GET['page'] < 1 )
	$_GET['page'] = 1;
else
	$_GET['page'] = intval( $_GET['page'] );

$countAll = GetCount();
$newEightyArray = GetWishes( ( $_GET['page'] - 1 ) * 20 );
$pageBarHtml = MultiPage( $countAll, 20, $_GET['page'] );
$DB->Close();
?>
<FORM METHOD="POST" ACTION="<?php echo $managePage; ?>">
<TABLE width="98%" align="center" border="1">
<?
foreach ( $newEightyArray as $key => $val )
{
	echo "<TR>";
	echo '<TD width="10%"><INPUT TYPE="checkbox" NAME="delcheck[]" VALUE="' . $val['id'] . '" /></TD>';
	echo '<TD width="10%">' . $val['name'] . '</TD>';
	echo '<TD width="70%">' . $val['content'] . '</TD>';
	echo '<TD width="10%">' . $val['ip'] . '</TD>';
	echo '</TR>';
}
?>
</TABLE>
<center><INPUT TYPE="submit" name="submit" value="批量删除"></center>
</FORM>
<center><?php echo '<br />' . $pageBarHtml; ?></center>
<center><a href="logout.php">退出</a></center>
</body>
</html>