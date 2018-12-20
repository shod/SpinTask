<?php
namespace app\components\siteMapRenderer;

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class YmlFileRenderer extends SiteMapRenderer
{		
	protected function _renderHead($content){
		if(!$content){
			$date = date('Y-m-d H:i');
			$content = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<yml_catalog xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" date="{$date}"  xsi:noNamespaceSchemaLocation="VendorYML-1.0.xsd"></yml_catalog>

XML;
		}
		$this->DOM = new \SimpleXMLElement($content);
	}
}