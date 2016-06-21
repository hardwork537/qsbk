<?php

include_once "simple_html_dom.php";

$dbConf = array(
	'host' => 'localhost',
	'user' => 'root',
	'pwd' => '674300',
	'charset' => 'latin1',
	'db' => 'test',
	'table' => 'qsbk_article'
);	

for($page = 78; $page > 0; $page--)
{
	saveData($page);
	echo $page. ' done!'.PHP_EOL;
}


function saveData($page)
{
	$content = file_get_contents('logs/page_'.$page.'.txt');
	$html = str_get_html($content);

	$parent_node = $html->find('#content', 0);
	$total_num = count($parent_node->children);

	for($i = 0; $i < $total_num; $i++)
	{
		$element = $parent_node->children($i);

		$eleId = $element->id;
		if(!$eleId)
		{
			continue;
		}

		list($name, $id) = explode('-', $eleId);

		//title
		$titleEle = $element->find('.entry-title', 0);
		$title = $titleEle->plaintext;

		//meta
		$metaEle = $element->find('.entry-meta', 0);
		$meta = trim($metaEle->plaintext);

		//content
		$contenEle = $element->find('.entry-content', 0);
		$content = trim($contenEle->innertext);

		//utility
		$utilityEle = $element->find('.entry-utility', 0);
		$utility = trim($utilityEle->plaintext);

		$value = array(
			'id' => $id,
			'title' => $title,
			'meta' => $meta,
			'content' => $content,
			'utility' => $utility
		);

		//±£´æÊý¾Ý
		$res = saveDataToDb($value);
		var_dump($res);
		//exit;
	}
}

function saveDataToDb($data)
{
	global $conn, $dbConf;

	if(!$conn)
	{
		connectDb();
	}
	extract($data);
	$title = addslashes($title);
	$meta = addslashes($meta);
	$content = addslashes($content);
	$utility = addslashes($utility);
	$time = time();

	$insertSql = "Insert Into {$dbConf['table']}(f_origin_id, f_title, f_meta, f_content, f_utility, f_createtime) VALUES({$id}, '{$title}', '{$meta}', '{$content}', '{$utility}', {$time})";
	//echo $insertSql;

	$insertRes = mysql_query($insertSql, $conn);
	if(!$insertRes)
	{
		echo mysql_error().PHP_EOL;
	}

	return $insertRes;
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