<?php

$content = file_get_contents('logs/page_1.txt');

$imgName = uniqid() . $suf;
$filename = $this->img_save_dir . $imgName;
$ch = curl_init();
$timeout = 30;
curl_setopt($ch, CURLOPT_URL, $v['url']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$img = curl_exec($ch);
$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
if($status == 404) {
    echo "total:$this->total_num use:$this->use_num" . ' 抓取图片 '.$v['url'].' 404 error'.PHP_EOL;
    continue;
}
$fp = fopen($filename ,'a');
fwrite($fp, $img);
fclose($fp);
unset($img);