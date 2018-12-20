<?php
namespace app\components\siteMapRenderer;

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class XmlFileRenderer extends SiteMapRenderer
{
	protected function _renderHead($content){
		if(!$content){
			$content = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>
XML;
		}
		$this->DOM = new \SimpleXMLElement($content);
	}
}