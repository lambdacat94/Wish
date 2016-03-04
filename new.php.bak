<?php
include( 'function.php' );

if ( $_POST['add'] )
{
	$_POST['singnature'] = CleanHtmlTags( trim( $_POST['singnature'] ) );
	$_POST['tagbgcolor'] = trim( $_POST['tagbgcolor'] );
	$_POST['messages'] = CleanHtmlTags( trim( $_POST['messages'] ) );
	$_POST['tagbgpic'] = trim( $_POST['tagbgpic'] );
	if ( !empty( $_POST['singnature'] ) && !empty( $_POST['tagbgcolor'] ) && !empty( $_POST['messages'] ) && !empty( $_POST['tagbgpic'] ) && !is_numeric( $_POST['tagbgcolor'] ) && !is_numeric( $_POST['tagbgpic'] ) )
		exit( '参数错误!' );
	$clientIP = GetIP();
	AddWish( addslashes( $_POST['singnature'] ), addslashes( $_POST['messages'] ), addslashes( $_POST['tagbgcolor'] ), addslashes( $_POST['tagbgpic'] ), trim( $clientIP ) );
	@header( "Location:index.php" );
	exit;
}
$DB->Close();
?>
<html>
<head>
<title>新春许愿墙</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/default.css" type="text/css">
<style type="text/css">
<!--
body {
	background-image: url(images/bg.jpg);
}
-->
</style>
</head>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor=#ffffff>
<div id="content">
<center>
<div id="banner"></div>
<SCRIPT language=JavaScript type="text/javascript">

var ie = false;
function getObj(id) {
	if (ie) {
		return document.all[id]; 
		} else {
		return document.getElementById(id);
	}
}

function setTagBColor(i) {
	color = getBColor(i);
	getObj('preview').style.background = '' + color;
	hopeFM.tagbgcolor.value = i;
}

function setTagBPic(i) {
	picurl = getBPic(i);
	getObj('tagBPic').style.background = " transparent url(\"" + picurl + "\") no-repeat scroll bottom left";
	hopeFM.tagbgpic.value = i;
}

function getBColor(i) {
	i = (i<1 || i>8)?0:parseInt(parseInt(i)-1);
	//colorArray = new Array ("#FFDFFF","#C5FFC2","#FFE3B8","#FFCECE","#CEECFF","#FFFFCC","#E8DEFF","#F0F0F0");
	colorArray = new Array ("#FFDFFF","#C5FFC2","#FFE3B8","#FFCECE","#CEECFF","#FFFFCC","#E8DEFF","#F0F0F0");
	return colorArray[i];
}

function getBPic(i) {
	i = (i<1 || i>12)?1:i;

	//alert(parseInt(parseInt(i)+10));

	return "images/bpic_" + parseInt(parseInt(i)+10) +".gif";
}

function textCounter(field, countfield, maxlimit) {
	if (field.value.length > maxlimit) 
		field.value = field.value.substring(0, maxlimit);
	else
		countfield.value = maxlimit - field.value.length;
	//field.value = field.value.replace(" ","&nbsp;");
	//field.value = field.value.replace("\r\n","<br>");
	viewcontent.innerHTML = field.value;
}

function chkFM() {
	if (hopeFM.messages.value == "") {
		alert("\n\n\n您的祝福内容?\n\n\n");
		hopeFM.messages.focus();
		return false;
	}
	if (hopeFM.singnature.value == "") {
		alert("\n\n\n请留下您的署名!\n\n");
		hopeFM.singnature.focus();
		return false;
	}
	alert( "提交祝福成功!" );
	return true;
}
</SCRIPT>

<div>
  <p align="center">&nbsp;</p>
<br>
	<div id="bar">
		<div class="btn"><a href="index.php"><img src="images/btn_visit.gif" border="0"></a></div>
		<span class="white">新年到了，许个愿望吧......</span>
	</div>

<TABLE 
style="BORDER-RIGHT: #bbbbbb 1px solid; BORDER-TOP: #bbbbbb 1px solid; MARGIN-TOP: 20px; MARGIN-BOTTOM: 20px; BORDER-LEFT: #bbbbbb 1px solid; BORDER-BOTTOM: #bbbbbb 1px solid" 
cellSpacing=0 cellPadding=0 width=500 bgColor=#fffaee border=0>
	<tr>
	<td align=center valign=top>
		
		<table border=0 cellpadding=0 cellspacing=0 width=700>
		<tr>
		<td align=center valign=top>
		<FORM name=hopeFM onSubmit="return chkFM();" method="post" action="new.php">

			<INPUT type=hidden value="7" name="tagbgcolor">
			<INPUT type=hidden value="1" name="tagbgpic">
			<INPUT type=hidden value="1153391194039" name="tm">
			<INPUT type=hidden value="1" name="add">
			<img src="images/spacer.gif" width=1 height=8><br>
			<table border=0 cellpadding=0 cellspacing=0 width=676 bgcolor=#EEF1EC>
			<tr>
			<td height=26><img src="images/pic_title_left.gif" width="12" height="26"></td>
			<td width=652 align=center class="f14_2167 pt4"><strong>我要贴祝福纸条</strong></td>
			<td><img src="images/pic_title_right.gif" width="12" height="26"></td>
			</tr>
			</table>
			<br/>
			<table border=0 cellpadding=0 cellspacing=0 width=676 >
			<tr>
			<td align=center valign=top>
				<img src="images/spacer.gif" width=1 height=10><br>

				<table border=0 cellpadding=0 cellspacing=0 width=608 background="images/line_dot.gif">
				<tr>
				<td height=1></td>
				</tr></table>
				<img src="images/spacer.gif" width=1 height=10><br>
				<table border=0 cellpadding=0 cellspacing=0 width=608>
				<tr align=center valign=top>
				<td width=398>
					<table border=0 cellpadding=0 cellspacing=0 width=398>
					<tr>
					<td width=110 class=f12_5050>请选择纸条颜色：</td>
					<td width=288>
					<a href="javascript:setTagBColor('1');"><img border=0 src="images/bcolor_11.gif" width="25" height="25"></a>
					&nbsp;<a href="javascript:setTagBColor('2');"><img border=0 src="images/bcolor_12.gif" width="25" height="25"></a>
					&nbsp;<a href="javascript:setTagBColor('3');"><img border=0 src="images/bcolor_13.gif" width="25" height="25"></a>
					&nbsp;<a href="javascript:setTagBColor('4');"><img border=0 src="images/bcolor_14.gif" width="25" height="25"></a>
					&nbsp;<a href="javascript:setTagBColor('5');"><img border=0 src="images/bcolor_15.gif" width="25" height="25"></a>
					&nbsp;<a href="javascript:setTagBColor('6');"><img border=0 src="images/bcolor_16.gif" width="25" height="25"></a>
					&nbsp;<a href="javascript:setTagBColor('7');"><img border=0 src="images/bcolor_17.gif" width="25" height="25"></a>
					&nbsp;<a href="javascript:setTagBColor('8');"><img border=0 src="images/bcolor_18.gif" width="25" height="25"></a>
					</td>
					</tr></table>
					<table border=0 cellpadding=0 cellspacing=0 width=398>
					<tr valign=top>
					<td width=110 class='f12_5050 pt12'>请选择纸条图案：</td>
					<td width=262>
						<table border=0 cellpadding=0 cellspacing=0 width=262>
						<tr align=center>
						<td width=44 height=48><a href="javascript:setTagBPic('1')" ><img border=0 src="images/bpic_11.gif"></a></td>
						<td width=79><a href="javascript:setTagBPic('2');" ><img border=0 src="images/bpic_12.gif"></a></td>
						<td width=54><a href="javascript:setTagBPic('3');" ><img border=0 src="images/bpic_13.gif"></a></td>
						<td width=86><a href="javascript:setTagBPic('4');" ><img border=0 src="images/bpic_14.gif"></a></td>
						</tr>
						<tr align=center>
						<td width=44 height=48><a href="javascript:setTagBPic('5');" ><img border=0 src="images/bpic_15.gif"></a></td>
						<td width=79><a href="javascript:setTagBPic('6');" ><img border=0 src="images/bpic_16.gif"></a></td>
						<td width=54><a href="javascript:setTagBPic('7');" ><img border=0 src="images/bpic_17.gif"></a></td>
						<td width=86><a href="javascript:setTagBPic('8');" ><img border=0 src="images/bpic_18.gif"></a></td>
						</tr>
						<tr align=center>
						<td width=44 height=48><a href="javascript:setTagBPic('9');" ><img border=0 src="images/bpic_19.gif"></a></td>
						<td width=79><a href="javascript:setTagBPic('10');" ><img border=0 src="images/bpic_20.gif"></a></td>
						<td width=54><a href="javascript:setTagBPic('11');" ><img border=0 src="images/bpic_21.gif"></a></td>
						<td width=86><a href="javascript:setTagBPic('12');" ><img border=0 src="images/bpic_22.gif"></a></td>
						</tr>
						</table>
					</td>
					<td width=26></td>
					</tr></table>
				</td>
				<td width=210>
				<DIV id=preview style="BACKGROUND-COLOR: #E8DEFF">
					<table border=0 cellpadding=0 cellspacing=0 width=210>
					<tr>
					<td height=1><img src="images/line_top.gif" width="210" height="1"></td>
					</tr></table>

					<table border=0 cellpadding=0 cellspacing=0 width=210>
					<tr>
					<td align=center valign=top>
						<img src="images/spacer.gif" width=1 height=10><br>
						<table border=0 cellpadding=0 cellspacing=0 width=190>
						<tr>
						<td width=183 class=f12_0078>第[xx]条&nbsp;&nbsp;&nbsp;&nbsp; <?php echo date( 'Y-m-d H:i:s', time() ); ?> </td>
						<td width=7><a href=# target=_blank><img border=0 src="images/pic_x.gif" width="7" height="7"></a></td>
						</tr></table>
						<table border=0 cellpadding=0 cellspacing=0 width=190>
						<tr>
							<td id=tagBPic style='background: url(images/bpic_11.gif) no-repeat bottom left; word-wrap: break-word'>
							<br><br>
							<DIV id="viewcontent" style="text-align:left">许愿墙-美好人生从你我开始，我们静静地欣赏，回忆自己人生岁月里沉淀下来的点点滴滴</DIV>
							<br><br><br>
							<table border="0"><tr><td width="40"></td><td width="150" align=right><DIV id=viewsign>我的署名</DIV></td></tr></table>
							</td>
						</tr></table>
						<img src="images/spacer.gif" width=1 height=10><br>
					</td>
					</tr>
					</table>
					<table border=0 cellpadding=0 cellspacing=0 width=210>
					<tr>
					<td><img src="images/line_bottom.gif" width="210" height="1"></td>
					</tr>
					</table>
				</DIV>
				</td>
				</tr></table>
				<img src="images/spacer.gif" width=1 height=10><br>
				<table border=0 cellpadding=0 cellspacing=0 width=608 background="images/line_dot.gif">
				<tr>
				<td height=1></td>
				</tr></table>
				<table border=0 cellpadding=0 cellspacing=0 width=608>
				<tr>
				<td height=33 class=f12_5050>输入你的祝福纸条内容  ( 还能输入<INPUT style="BORDER-TOP-WIDTH: 0px; BORDER-LEFT-WIDTH: 0px; BORDER-BOTTOM-WIDTH: 0px; BORDER-RIGHT-WIDTH: 0px" readOnly maxLength=3 size=3 value=92 name=freeLength>个字 )
				</td>
				</tr></table>
				<table border=0 cellpadding=0 cellspacing=0 width=608>
				<tr>
				<td><textarea cols="90" rows="5" style='color:#505050;font-size:12px;' align="left" onKeyDown="textCounter(this.form.messages,this.form.freeLength,120);" onKeyUp="textCounter(this.form.messages,this.form.freeLength,120);" name="messages" wrap="physical">小爱，你还在想我吗？我祝福你一切好！！</textarea></td>
				</tr>
				<tr><td height=33 class=f12_5050>您的署名：<input type=text name=singnature maxlength="10" value="佑恩" onKeyDown="javascript:viewsign.innerHTML=this.form.singnature.value" onKeyUp="javascript:viewsign.innerHTML=this.form.singnature.value"></td></tr>
				</table>
			
			</td>
			</tr></table>


			<table border=0 cellpadding=0 cellspacing=0 width=174>
			<tr>
			<td><input type=image src="images/pic_submit.gif"></td>
			</tr>
			<tr><td height=5></td></tr></table>
		</FORM>
		</td>
		</tr></table>
		<!------	end 	-->
		
	</td>
	</tr></table>

</div>

<?php include( 'footer.php' ); ?>


</center>
</div>
</body>
</html>