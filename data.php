<?php

$dbConf = array(
	'host' => '127.0.0.1',
	'user' => 'root',
	'pwd' => '674300',
	'charset' => 'latin1',
	'db' => 'test',
	'table' => 'qsbk_article'
);	
$conn = null;

function getDataByPage($page = 1, $pagesize = 10)
{
	global $dbConf, $conn;

	if(!$conn)
	{
		connectDb();
	}
	$offset = ($page - 1) * $pagesize;
	$sql = "SELECT * FROM {$dbConf['table']} ORDER BY f_id DESC LIMIT {$offset},{$pagesize}";
	$result = @mysql_query($sql, $conn);
	
	$data = array();
	while($row = mysql_fetch_assoc($result)) 
	{
		$data[] = $row;
	}
	
	return $data;
}

function getCount()
{
	global $dbConf, $conn;

	if(!$conn)
	{
		connectDb();
	}
	
	$sql = "SELECT count(f_id) as num FROM {$dbConf['table']}";
	$result = @mysql_query($sql, $conn);
	$row = mysql_fetch_assoc($result);
	
	return intval($row['num']);
}

function connectDb()
{
	global $dbConf, $conn;

	$conn = @mysql_connect($dbConf['host'], $dbConf['user'], $dbConf['pwd']);
	if(!$conn) 
	{
		$data = array(
			'ret' => false,
			'msg' => '',
			'error' => 'connect error'
		);

		echo json_encode($data);
		exit();
	}
	if(!mysql_select_db($dbConf['db'], $conn)) 
	{
		$data = array(
			'ret' => false,
			'msg' => '',
			'error' => 'select db error'
		);

		echo json_encode($data);
		exit();
	}
	mysql_query('set NAMES '.$dbConf['charset']);
}

function getPages($pages, $nowpage)
{
	$rangeMin = 4;
	$rangeMax = $pages - 3;

	$pageStr = '';
	if($nowpage > $rangeMin)
	{
		$pageStr .= '<a class="first-page-link" href="/qsbk/" title="first">first</a>';
	}

	if(1 != $nowpage)
	{
		$prepage = $nowpage - 1;
		$pageStr .= '<span class="prev-link"><a href="/qsbk/?page='.$prepage.'">← previous</a></span>';
	}

	if($nowpage <= $rangeMin)
	{
		$min = 1;
		$max = 7;
	} elseif($nowpage >= $rangeMax) {
		$min = $pages - 6;
		$max = $pages;
	} else {
		$min = $nowpage - 3;
		$max = $nowpage + 3;
	}

	for($i = $min; $i <= $max; $i++)
	{
		if($i == $nowpage) 
		{
			$pageStr .= '<span class="current">'.$i.'</span>';
		} else {
			$pageStr .= '<a href="/qsbk/?page='.$i.'">'.$i.'</a>';
		}
	}

	if($pages != $nowpage)
	{
		$lastpage = $nowpage + 1;
		$pageStr .= '<span class="next-link"><a href="/qsbk/?page='.$lastpage.'">next →</a></span>';
	}

	if($nowpage < $rangeMax)
	{
		$pageStr .= '<a class="last-page-link" href="/qsbk/?page='.$pages.'" title="last">last</a>';
	}

	return $pageStr;	
}