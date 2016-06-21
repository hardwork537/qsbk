<?php

/**
 * 抓取数据
 */
include("base.php");

foreach($argv as $v)
{
    if(false === strpos($v, '='))
    {
        continue;
    }
    $result = explode('=', $v);
    if($result[0] && $result[1])
    {
        $params[$result[0]] = $result[1];
    }
}
$obj = new crawlData($params);
$obj->run();
$obj = null;
unset($obj);

class crawlData
{
    private $_filePath;
    private $_url = 'http://www.indianfunpic.com/';
	private $maxPage = 78;

    public function __construct($params = array())
    {
        $this->_filePath = CRONTAB_PATH . 'logs/';
        register_shutdown_function(array($this, 'dealWithDone'));
    }

    public function run()
    {
        $message = date('Y-m-d H:i:s').' 开始执行';
        $this->writeLog($message);

        $this->crawlDataByPage();
    }

    /**
     * 根据城市id抓取数据
     * @param type $cityId
     */
    public function crawlDataByPage($page = 1)
    {
        if(1 == $page)
        {
            $url = $this->_url;
        }

        $content = Curl::GetResult($this->_url, 'get');
        $fileName = 'page_'.$page.'.txt';

        //保存第一页数据
        $this->saveFile($fileName, $content);

		for($i = 2; $i <= $this->maxPage; $i++)
		{
			$url = $this->_url . 'page/' . $i . '/';

			$content = Curl::GetResult($url, 'get');
			$fileName = 'page_'.$i.'.txt';

			//分页保存数据
			$this->saveFile($fileName, $content);
			echo $i . ' done! '.PHP_EOL;
			sleep(1);
		}
    }

    public function dealWithDone()
    {
        $arrError = error_get_last();
        $message = '';
        if(isset($arrError['type']) && ($arrError['type'] & (E_ERROR | E_WARNING | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR)))
        {
            $message .= "错误信息: Message: " . $arrError['message'] . "\t File: " . $arrError['file'] . "\t Line: " . $arrError['line'];
        }

        $message .= date('Y-m-d H:i:s').' 执行完毕';
        $this->writeLog($message);
    }
    public function writeLog($message)
    {
        $file = $this->_filePath . 'exec.log';
        $fp = fopen($file, "a");
        flock($fp, LOCK_EX);

        fwrite($fp, $message . "\n");
        flock($fp, LOCK_UN);
        fclose($fp);
    }

    public function saveFile($fileName, $content)
    {
        $file = $this->_filePath . $fileName;
        $fp = fopen($file, "w");
        flock($fp, LOCK_EX);
        fwrite($fp, $content);
        flock($fp, LOCK_UN);
        fclose($fp);
    }
}
