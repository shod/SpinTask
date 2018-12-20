<?php
namespace app\components\siteMapRenderer;

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class CsvFileRenderer extends SiteMapRenderer
{
	protected $_folder = '/var/export';
	protected $_fileType = 'csv';
	protected $_data = array();
	protected $_fileName;
	
	public function setData(array $data){
		$this->_data = $data;
		return $this;
	}
	
	public function addData(array $data){
		foreach($data as $row){
			$this->_data[] = $row;
		}
		return $this;
	}
	
	public function render(){
		$csv_folder     = Yii::$app->request->getBasePath() . $this->_dir . $this->_folder;
		$CSVFileName    = $csv_folder.'/'.$this->_fileName;
		if($this->_addToFile){
			$fp = fopen($CSVFileName, 'a+');
		} else {
			$fp = fopen($CSVFileName, 'w') or die("can't open file");
		}
		
		foreach($this->_data as $row){
			fputcsv($fp, $row, ';');
		}
		
		fclose($fp);
		$this->_data = array();
		return true;
	}
}