<?php
namespace app\components\siteMapRenderer;

use app\components\siteMapRenderer\XmlFileRenderer;
use Yii;
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class SiteMapRenderer
{
	protected $DOM;

	protected $_dir = '/web/';
    private $domain = '';
    protected $_folder = 'sitemap_xml';
	// files will be gzip
	protected $_gzip = true;
	// if true - all data adding to the file
	protected $_addToFile = false;
	
	protected $_fileName;
	
	protected $_data = array();
	
	public static function model($type){
		$className = "app\components\siteMapRenderer\\" . ucfirst(strtolower($type)) . 'FileRenderer';
		return new $className();
	}
	
	public function setFileName($fileName){
		$this->_fileName = $fileName;
		return $this;
	}
    
    public function setDomain($fileName){
		$this->domain = $fileName;
		return $this;
	}
	
	public function addToFile($flag){
		$this->_addToFile = $flag;
		return $this;
	}
	
	public function setGzip($flag){
		$this->_gzip = $flag;
		return $this;
	}
	
	public function setData(array $data){
		$this->_data = $data;
		return $this;
	}
	
	public function setDir($dir){
		$this->_dir = $dir;
	}
	
	public function setFolder(string $folder){
		$this->_folder = $folder;
        return $this;
	}
	
	protected function openFile(){
		$full_filename = Yii::$app->getBasePath(true) . $this->_dir . $this->_folder . '/' . $this->_fileName;
		if($this->_addToFile){
			if($this->_gzip){
				$this->_ungzip($full_filename);
			}
			if(file_exists($full_filename)){
				$text = file_get_contents($full_filename);
			} else {
				$text=='';
			}
		} else {
			$text = '';
		}
		return $text;
	}
	
	protected function _renderDataRow($key, $val, $node = null){
		if(is_numeric($key)){ 							// array have a numeric keys
			foreach($val as $k => $v){
				$this->_renderDataRow($k, $v, $node);
			}
			return;
		}
		if($key == '@attributes'){
			foreach($val as $k => $v){
				$node->addAttribute($k, $v);
			}
			return;
		}
		if(is_array($val)){
			if(array_key_exists('@value', $val)){
				$value = $val['@value'];
				unset($val['@value']);
			} else {
				$value = NULL;
			}
			if($node !== NULL){
				$node = $node->addChild($key, $value);
			} else {
				$node = $this->DOM->addChild($key, $value);
			}
			
			foreach($val as $k => $v){
				$this->_renderDataRow($k, $v, $node);
			}
		} else {
			if($node !== NULL){
				$node->addChild($key, htmlspecialchars($val));
			} else {
				$this->DOM->addChild($key, $val);
			}
		}
		return $this;
	}
	
	public function save(){
		$this->_renderHead($this->openFile());
		
		$this->_renderData();
		$this->saveFile();
	}
	
	public function createMainLink($fileName = 'sitemap.xml'){
		$ifull_filename = Yii::$app->getBasePath(true) . $this->_dir . $this->_folder . '/' . $fileName;

		if (!file_exists($ifull_filename) || file_get_contents($ifull_filename)=='')
		{		
			$xml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
</sitemapindex>
XML;
			file_put_contents($ifull_filename, $xml);
			chmod($ifull_filename, 0666);			
		}else{
			$xml = file_get_contents($ifull_filename);
		}
	
		$text = str_replace('xmlns=', 'ns=', $xml);
		
		$doc = new \SimpleXMLElement($text);
		$nodes = $doc->xpath(".//sitemap[contains(loc/text(),'{$this->_fileName}.gz')]");
		if ($nodes!==false && count($nodes))
		{
			$nodes[0]->lastmod = date("Y-m-d");
		}
		else
		{
			$node = $doc->addChild("sitemap");
			$node->addChild("loc", $this->domain . '/' . $this->_folder . '/' . $this->_fileName . ".gz");
			$node->addChild("lastmod", date("Y-m-d"));
		}

		$DOMDocument = new \DOMDocument('1.0');
		$DOMDocument->preserveWhiteSpace = false;
		$DOMDocument->loadXML($doc->asXML());
		$DOMDocument->formatOutput = true;
        
		$textDOMDocument = str_replace('ns=', 'xmlns=', $DOMDocument->saveXML());
		file_put_contents($ifull_filename, $textDOMDocument);
		@chmod($ifull_filename, 0666);

		//$this->gzip($ifull_filename);
		if($this->attr[ $this->mode ]['gzip'] = true){
			exec("gzip -c {$ifull_filename} > {$ifull_filename}.gz");
			@chmod("{$ifull_filename}.gz", 0666);
		}
	}
	
	protected function _renderData(){
		foreach($this->_data as $k => $v){
			$this->_renderDataRow($k, $v);
		}
	}
	
	protected function saveFile(){
		$full_filename = Yii::$app->getBasePath(true) . $this->_dir . $this->_folder . '/' . $this->_fileName;
        if(file_exists($full_filename)){
            @exec("rm {$full_filename}");
        }
		$doc = new \DOMDocument('1.0');
		$doc->preserveWhiteSpace = false;
		$doc->loadXML($this->DOM->asXML());
		$doc->formatOutput = true;
		$doc->save($full_filename);
		@chmod($full_filename, 0666);

		if($this->_gzip){
			$this->_gzip($full_filename);
		}
	}
	
	protected function _gzip($filename)
	{
		sleep(1);
//		exec("gzip -c {$filename} > {$filename}.gz");
        if(file_exists($filename . '.gz')){
            @exec("rm {$filename}.gz");
        }
		
		exec("gzip {$filename}");
		@chmod("{$filename}.gz", 0666);
	}

	protected function _ungzip($filename)
	{
		sleep(1);
//		exec("gzip -cd {$filename}.gz > {$filename}");
		exec("gzip -d {$filename}.gz");
		@chmod($filename, 0666);
	}
}