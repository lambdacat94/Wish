<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
</body>
</html>

<?php
include( 'function.php' );

if ( !isset( $_GET['page'] ) || empty( $_GET['page'] ) || !is_numeric( $_GET['page'] ) || $_GET['page'] < 1 )
	$_GET['page'] = 1;
else
	$_GET['page'] = intval( $_GET['page'] );

$countAll = GetCount();
if ( $_POST['search'] )
	$newEightyArray = SearchWishes( $_POST['nickname'] );
else
	$newEightyArray = GetWishes( ( $_GET['page'] - 1 ) * 80 );
krsort( $newEightyArray );

$pageBarHtml = MultiPage( $countAll, 80, $_GET['page'] );
$DB->Close();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?=$DB->website?></title>
<bgsound src='images/newyear.mp3' loop="-1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="all" name="robots" />
<meta name="author" content="Sunny V" />
<meta name="Contact" content="tool.la@gmail.com" />
<meta name="Copyright" content="#" />
<meta name="description" content="许愿墙-美好人生从你我开始" />
<meta content="许愿,许愿墙,在线许愿,许愿程序" name="keywords" />
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/default.css" type="text/css">
<style type="text/css">
<!--
body {
	background-image: url(images/bg.jpg);
}
-->
</style>
<SCRIPT language="JavaScript1.2">
var Obj=''
var index=10000;//z-index;
document.onmouseup=onMouseUp
document.onmousemove=onMouseMove
function onMouseDown(Object){
	Obj=Object.id
	document.all(Obj).setCapture()
	pX=event.x-document.all(Obj).style.pixelLeft;
	pY=event.y-document.all(Obj).style.pixelTop;
}

function onMouseMove(){
	if(Obj!=''){
		document.all(Obj).style.left=event.x-pX;
		document.all(Obj).style.top=event.y-pY;
	}
}

function onMouseUp(){
	if(Obj!=''){
		document.all(Obj).releaseCapture();
		Obj='';
	}
}

function onFocus(obj){
       if(obj.style.zIndex!=index) {
               index = index + 2;
               var idx = index;
               obj.style.zIndex=idx;
       }
}

function onRemove(){
	if (event){
		lObj = event.srcElement ;
		n=0;
		while (lObj && n<2) {
			lObj = lObj.parentElement ;
			if(lObj.tagName=="DIV") n++;

		}
	}
	var id=lObj.id
	document.getElementById(id).removeNode(true);

}

function showLogin(n) {
	var formAry = new Array ("formOne","formTwo")
	var Obj = getObject(formAry[n])
	if (Obj.style.display == "none") {
	Obj.style.display = ""
	}
	else 
	{
	Obj.style.display = "none"
	}
}

function getObject(objectId) {
    if(document.getElementById && document.getElementById(objectId)) {
	// W3C DOM
	return document.getElementById(objectId);
    } else if (document.all && document.all(objectId)) {
	// MSIE 4 DOM
	return document.all(objectId);
    } else if (document.layers && document.layers[objectId]) {
	// NN 4 DOM.. note: this won't find nested layers
	return document.layers[objectId];
    } else {
	return false;
    }
}

function chkFM(obj) {
	alert(obj.nickname.value);
	if(obj.nickname.value == "") {
		alert("\n\n\n请输入需要寻找人的署名!\n\n");
		obj.nickname.focus();
		return false;
	}
	return false;
}
</SCRIPT>
</head>
<body>

<div id="content">
<div id="banner">
  <p>&nbsp;</p>
</div>
<p>
  <?php include( 'nav.php' ); ?>
</p>
<div id="bar">
<div class="btn"><a href="#"><img src="images/btn_search.gif" border="0" onclick="showLogin(0)" /></a></div>
		<div class="btn"><a href="new.php"><img src="images/btn_paste.gif" border="0"></a></div>
		<!--找回纸条弹出菜单-->
		<div class="form" id="formOne" style="display:none">
			<form name=schFM1 action="index.php" method="post" onsubmit="return chkFM(this.form);">
			<input type="hidden" name="search" value="1">
			<input type="text" value="输入用户署名" name="nickname" class="input" onclick="javascript:this.form.nickname.value=''"/><br />
			将出现要找的纸条<br>
			<input type=image src="images/submit.gif" width="45" height="19" alt="" border="0" />
			</form>
		</div>
		<!--找回纸条弹出菜单-->
		<span class="white">已有祝福 <?php echo $countAll; ?>条，赶紧贴上我的美好祝福，送给你的情人吧 &nbsp;<img src="images/ico_smile.gif" align="absmiddle"></span>
	</div>
	<div id="contentarea">
	<!----------------------------------------->
<?php
foreach ( $newEightyArray as $key => $val )
{
?>
	<DIV onmousedown="onFocus(this)" id="cc<?php echo stripslashes( $val['id'] ); ?>" class="scrip<?php echo stripslashes( $val['bg_id'] ); ?>">
	<TABLE border=0 cellpadding=0 cellspacing=0>
		<TR>
			<TD onmousedown="onMouseDown(cc<?php echo stripslashes( $val['id'] ); ?>)" style="CURSOR: move" >
			<div class="shead"><span onDblClick="onRemove()" title="双击关闭纸条">第[<?php echo stripslashes( $val['id'] ); ?>]条 <?php echo $val['add_time']; ?>　<a style="CURSOR: hand" onclick="onRemove()" title="关闭纸条">×</a></span></div>
			</TD>
		</TR>
		<TR>
			<TD style="CURSOR:default">
		<div class="sbody"><?php echo stripslashes( $val['content'] ); ?></div>
		<div class="sbot"><img src="images/bpic_<?php echo stripslashes( $val['sign_id'] ) + 10; ?>.gif" class="left" border="0"><h2><a href="#"  style="font-size:16px;"><?php echo stripslashes( $val['name'] ); ?></a></h2></div>
			</TD>
		</TR>
	</TABLE>
	</DIV>
<?php
}
?>
	<!----------------------------------------->
	</div>
	<a href="new.php"><img src="images/btn_paste_big.jpg" border="0"></a>
<div id="bar"><center><?php echo $pageBarHtml; ?></center></div>





<?php include( 'footer.php' ); ?>

</div>
<script type="text/javascript">
var elements = document.getElementById("contentarea").childNodes;
	for (var i = 0; i < elements.length; i++) {
		if(elements[i].tagName && elements[i].tagName=='DIV') {
			elements[i].style.top = Math.ceil(350 * Math.random()) + "px"
	elements[i].style.left = Math.ceil(550 * Math.random()) + "px";
		}
	}
</script>
</body>
</html>