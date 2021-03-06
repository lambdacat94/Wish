﻿<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
</body>
</html>
<?php
// 设置应该被返回的错误报告类型
error_reporting( E_ERROR | E_PARSE );

// 默认时区设置函数是否存在，存在则设置
if ( function_exists( 'date_default_timezone_set' ) )
	date_default_timezone_set( 'PRC' );

include( 'database.inc.php' );

$DB = new MySQL();

// 数据库主机
$DB->serverName = 'localhost';

// 数据库名
$DB->dbName = 'wish';

// 数据库用户名
$DB->dbUsername = 'root';

// 数据库密码
$DB->dbPassword = 'www520.0';

// 管理页面名
$managePage = 'admin.php';
$DB->admin  ='admin';//登陆用户
$DB->password='admin';//登陆密码
// 网站title
$DB->website ='新年到了，许个愿吧'; 
##############################

// 连接数据库
$DB->Connect();
$DB->SelectDB();
// 获取当前 magic_quotes_gpc 的配置选项设置，在 PHP5.4 之后被移除
if ( get_magic_quotes_gpc() )
{
	// 返回一个去除转义反斜线后的字符串
	StripslashesArray( $_POST );
	StripslashesArray( $_GET );
	StripslashesArray( $_COOKIE );
}

// ===================================================================================
// 添加许愿条
function AddWish( $name, $content, $bgID, $signID, $ip )
{
	global $DB;
	// 
	$sql = "INSERT INTO plugin_wish SET name='{$name}',content='{$content}',bg_id='{$bgID}',sign_id='{$signID}',ip='{$ip}',add_time=NOW()";
	if ( $DB->Update( $sql ) )
		return true;
	else
		return false;
}

// 获得许愿信息
function GetWishes( $start = 0, $limit = 80 )
{
	global $DB;
	$sql = "SELECT * FROM plugin_wish ORDER BY ID DESC LIMIT {$start},{$limit}";
	return $DB->FM( $sql );
}

// 删除许愿信息
function DeleteWish( $str )
{
	global $DB;
	$sql = "DELETE FROM plugin_wish WHERE id IN({$str})";
	return $DB->FM( $sql );
}

// 搜索许愿信息
function SearchWishes( $name )
{
	global $DB;
	$name = str_replace( '=', '', addslashes( $name ) );
	$sql = "SELECT * FROM plugin_wish WHERE name='{$name}' ORDER BY ID DESC LIMIT 0,80";
	return $DB->FM( $sql );
}

// 获得总数
function GetCount()
{
	global $DB;
	$sql = "SELECT count(*) as total FROM plugin_wish";
	$result = $DB->FO( $sql );
	return $result['total'];
}

// 斜杠带
function StripSlashesArray( & $array )
{
	while ( list( $key, $var ) = each( $array ) )
	{
		if ( $key != 'argc' && $key != 'argv' && ( strtoupper( $key ) != $key || '' . intval( $key ) == "$key" ) )
		{
			if ( is_string( $var ) )
				$array[$key] = stripslashes( $var ); // 斜杠
			if ( is_array( $var ) )
				$array[$key] = StripslashesArray( $var );
		}
	}
	// 返回数组数据
	return $array;
}

// 获得 IP 地址
function GetIP()
{
	if ( $_SERVER['HTTP_CLIENT_IP'] )
		return $_SERVER['HTTP_CLIENT_IP']; // 返回服务器 IP 地址
	elseif ( $_SERVER['HTTP_X_FORWARDED_FOR'] )
		return $_SERVER['HTTP_X_FORWARDED_FOR']; // 返回服务器地址
	else
		return $_SERVER['REMOTE_ADDR']; // 返回远程信息
}

// 清除页面缓存
function CleanHtmlTags( $content ) // 清除网页标签
{
	$content = htmlspecialchars( $content );
	$content = str_replace( '\n', '<br />', $content );
	$content = str_replace( '  ', '&nbsp;&nbsp;' , $content );
	return str_replace( '\t', '&nbsp;&nbsp;&nbsp;&nbsp;', $content );
}
// 多个页面的处理
function MultiPage( $total, $onePage, $page )
{
	$totalPage = ceil( $total / $onePage );
	$linkArray = explode( "page=", $_SERVER['QUERY_STRING'] );
	$linkArg = $linkArray[0];

	if ( $linkArg=='' )
		$url = $_SERVER['PHP_SELF'] . "?";
	else
	{
		$linkArg = substr( $linkArg, -1 ) == "&" ? $linkArg : $linkArg . '&';
		$url = $_SERVER['PHP_SELF'] . '?' . $linkArg;
	}

	!$totalPage && $totalPage = 1;
	( $page > $totalPage ) && $page = 1;
	!$page && $page = 1;

	$mid = floor( 10 / 2 ); // 取其中央的值
	$last = ( 10 - 1 );
	$minPage = ( $page - $mid ) < 1 ? 1 : $page - $mid;
	$maxPage = $minPage + $last;

	if ( $maxPage > $totalPage ) // 获取最大页面
	{
		$maxPage = $totalPage;
		$minPage = $maxPage - $last;
		$minPage = $minPage < 1 ? 1 : $minPage;
	}

	for ( $i = $minPage; $i <= $maxPage; $i++ )
	{
		if ( $i == $page )
			$numPageBar .= "<span class=\"page_on\">[$i]</span>";
		else
			$numPageBar .= "<a href=\"{$url}page=$i\">[$i]</a>";
	}

	// 第一个页面
	if ( $page != 1 )
		$firstPageBar = "<a href=\"{$url}page=1\" title=\"第一页\">第一页</a> ";

	if ( $page > 1 )
	{
		$prePage = $page - 1;
		$prePageBar = "<a href=\"{$url}page=$prePage\" title=\"上一页\">上一页</a> ";
	}

	if ( $page < $totalPage )
	{
		$nextPage = $page + 1;
		$nextPageBar = " <a href=\"{$url}page=$nextPage\" title=\"下一页\"下一页</a>";
	}

	if ( $page != $totalPage ) 
		$lastPageBar = " <a href=\"{$url}page=$totalPage\" title=\"最后一页\">最后一页</a>";

	// 返回到需要的页面
	return $firstPageBar . $prePageBar . $numPageBar . $nextPageBar . $lastPageBar;
}
?>