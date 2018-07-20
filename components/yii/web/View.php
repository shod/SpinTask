<?php

namespace app\components\yii\web;

use yii\helpers\Html;

/* 
 * @author Schemelev E. 
 */
class View extends \yii\web\View
{
    public $jsonLd = [];
    
    public function registerJsonLd($ld_data)
    {
        $js = \yii\helpers\Json::encode($ld_data);
        $this->jsonLd[md5($js)] = $js;
       
    }
    
    /**
     * Clears up the registered meta tags, link tags, css/js scripts and files.
     */
    public function clear()
    {
        $this->jsonLd = [];
        parent::clear();
    }
    
    /**
     * Renders the content to be inserted in the head section.
     * The content is rendered using the registered meta tags, link tags, CSS/JS code blocks and files.
     * @return string the rendered content
     */
    protected function renderHeadHtml()
    {
        $lines = [];
        if (!empty($this->jsonLd)) {
            $lines[] = Html::script(implode("\n", $this->jsonLd), ['type' => 'application/ld+json']);
        }
        
        $parentHeadHtml = parent::renderHeadHtml();
        $html = empty($lines) ? '' : implode("\n", $lines);
        return $parentHeadHtml . "\n" . $html;
    }
}