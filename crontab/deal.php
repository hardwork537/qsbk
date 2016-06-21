<?php

for($page = 1; $page <= 78; $page++)
{
	pregImage($page);
	echo "{$page} done!".PHP_EOL;
}

function pregImage($page = 1)
{
	$filepath = 'logs/page_'.$page.'.txt';
	$content = file_get_contents('logs/page_'.$page.'.txt');

	preg_match_all('/((http|https):\/\/)+(\w+\.)+(\w+)[\w\/\.\-]*(jpg|gif|bmp|bnp|png)/i', $content, $matches);

	$images = $matches[0];
	$images = array_flip(array_flip($images));

	foreach($images as $image)
	{
		$tmp = explode('/', $image);

		$filename = end($tmp);

		if(file_exists('images/'.$filename))
		{
			$content = str_replace($image, '/images/qsbk/'.$filename, $content);
		}
	}

	file_put_contents($filepath, $content);
}