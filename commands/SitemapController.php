<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\components\siteMapRenderer\SiteMapRenderer;
use app\models\SeoPattern;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SitemapController extends Controller
{

    public $folder = 'sitemap_xml';

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($prefix)
    {
        $data = [];
        
        $data[] = array(
                'url' => array(
                    'loc' 			=>  $prefix . '/catalog',
                    'changefreq' 	=> 'monthly',
                    'priority' 		=> 0.5,
                ),
            );
        
        $models = SeoPattern::find()->where(['hide' => 0])->all();

		foreach ((array) $models as $r)
		{
            $data[] = array(
                'url' => array(
                    'loc' 			=>  $prefix . '/'. $r->url,
                    'changefreq' 	=> 'monthly',
                    'priority' 		=> 0.5,
                ),
            );
		}
		
		$renderer = SiteMapRenderer::model('XML');
        
		$renderer->setFileName('main.xml')
            ->setDomain($prefix)
            ->setFolder($this->folder)
			->setGzip(false)
		;

		$renderer->setData($data);
		
		$renderer->save();
		//$renderer->createMainLink();
		
		return true;
        return ExitCode::OK;
    }
}
