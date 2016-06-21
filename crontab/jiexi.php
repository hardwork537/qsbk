<?php

for($i = 1; $i <= 78; $i++)
{
	saveImage($i);
}

function saveImage($page = 1)
{
	$content = file_get_contents('logs/page_'.$page.'.txt');
	//preg_match('/((http:\/\/)(.+)?\.(jpg|gif|bmp|bnp|png))/i', $content, $matches);

	preg_match_all('/((http|https):\/\/)+(\w+\.)+(\w+)[\w\/\.\-]*(jpg|gif|bmp|bnp|png)/i', $content, $matches);

	$images = $matches[0];
	var_dump($images);
	exit;
	$i = 0;

	foreach($images as $image)
	{
		$tmp = explode('/', $image);

		$filename = 'images/'.end($tmp);

		$ch = curl_init();
		$timeout = 30;
		curl_setopt($ch, CURLOPT_URL, $image);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$img = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if($status == 404) {
			echo '抓取图片 '.$v['url'].' 404 error'.PHP_EOL;
			continue;
		}
		$fp = fopen($filename ,'a');
		fwrite($fp, $img);
		fclose($fp);
		unset($img);
		$i++;

		echo $page.'_'.$i.' done!'.PHP_EOL;
	}
}