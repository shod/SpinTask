<?php

/*
 * Логика генерации текстов для страниц
 */

namespace app\components;

use \Yii;

/**
 * Description of Ads
 *
 * @author Schemelev
 */
class SeoText{    

	const CHARSET = 'utf-8';
    private $SeoSynonyms;
	private $SeoSynonymsWord;
    

    /**
    * Мета информация для страницы товара
    */
    public function getCatalogMetaInfo(\app\models\SeoPatternv2 $mdl_SeoPattern, $catalog) : array
    {         
        if(!$mdl_SeoPattern->id){
            return [
                'title' => '',    
                'keyword' => '',     
                'description' => '',  
            ];
        }
     
        $arr_property = $this->getTemplate($mdl_SeoPattern->type);
        
        $arr_catalog_morpf = $this->getCatalogMorph($catalog->id);
        $params = array_merge(['[h1]' => $mdl_SeoPattern->h1], $arr_catalog_morpf);
        
        /*Сгенерировать текст для text_top_description*/                
 
        return [
            'title' => $this->generateSeoText($arr_property['title'], $params),    
            'keyword' => $this->generateSeoText($arr_property['keyword'], $params),     
            'description' => $this->generateSeoText($arr_property['description'], $params),  
        ];   
     
    }


    /**
    * Мета информация для страницы товара
    */
    public function getProductMetaInfo($product_id, $sys_page_id) : array
    {         
        $arr_property = array();
        $arr_property = 0;
        $params = array();
        
        $mdl_IndexProduct = \app\models\IndexProduct::findOne(['product_id'=>$product_id]);
        if(empty($mdl_IndexProduct)){
            return true;
        }  
        $sectionId = ($mdl_IndexProduct->product->section_link_id)?$mdl_IndexProduct->product->section_link_id:$mdl_IndexProduct->index_section_id;
        
        $arr_property = $this->getTemplate($sys_page_id);
                                  
                
        $catalog_id = \app\models\Catalog::getIdBySectionId($sectionId);
        $catalog = \app\models_ex\Catalog::findOne($catalog_id);
        
        if($catalog->isNameAdd){
            $product = \app\models\Products::findOne($product_id);
            $params["[product_name]"] = $product->public_name; 
        } else {
            $params["[product_name]"] = $mdl_IndexProduct->basic_name; 
        }
        
        
        $arr_catalog_morpf = $this->getCatalogMorph($catalog_id);
        $params = array_merge($params,$arr_catalog_morpf);
        
        /*Сгенерировать текст для text_top_description*/                
 
        return [
            'title' => $this->generateSeoText($arr_property['title'], $params),    
            'keyword' => $this->generateSeoText($arr_property['keyword'], $params),     
            'description' => $this->generateSeoText($arr_property['description'], $params),  
        ];   
     
    }

    /***
     * Возвращает массив переменных морфологии раздела
     */
    private function getCatalogMorph($catalog_id): array {
        $arrMorph = \app\models\SectionMorph::findOne($catalog_id);
        if(!$arrMorph){
            return [];
        }
       
        foreach ($arrMorph as $key => $value) {
            $params["[catalog_{$key}]"] = $value;  
            
            $explValue = explode(' ', $value);
            $explValue[0] = mb_convert_case($explValue[0], MB_CASE_TITLE, self::CHARSET);
            $value = implode(' ', $explValue);
            $params["[~catalog_{$key}]"] = $value;
            $params["[{$key}]"] = $value;
			/*Исключаем раздел товары без описания*/
			if($catalog_id == 492){
				$params["[{$key}]"] = '';
			}
        }
        return $params;
    }

	/***
     * $catalog_id, $sys_page_id, $SeoParam
     */
    public function getProductTextByType($product_id, $sys_page_id) {
 
        $productModel = \app\models\Products::findOne($product_id);
        
        if(empty($productModel)){
            return true;
        }
        
        $section_id = $productModel->section_id;
                
        $indexProduct = \app\models\IndexProduct::find()->where(['product_id' => $product_id])->one();
        if(!$indexProduct){
            \Yii::$app->db->createCommand("CALL p_index_product('{$product_id}')")->execute();
            $indexProduct = \app\models\IndexProduct::find()->where(['product_id' => $product_id])->one();
        }
        
        $arr_property = $this->getTemplate($sys_page_id, $section_id);                

        $prop_description = $arr_property['text_seo'];
        
        /*Сгенерировать текст для text_top_description*/            
        $params = ['[h1]' => $indexProduct->basic_name];
        
        $catalog_id = \app\models\Catalog::getIdBySectionId($section_id);
        foreach (\app\models\SectionMorph::findOne($catalog_id)->attributes as $key => $value) {
                $params["[$key]"] = $value;
                /*Исключаем раздел товары без описания*/
                if($section_id == 3414){
                    $params["[$key]"] = '';
                }
        }                                   
        return $this->generateSeoText($prop_description, $params);
        
    }

	/**
     * Генератор текста из шаблона с переменными
     * $textPattern - текст шаблона
     * $params - массив дополнительных параметров
     */
    public function generateSeoText($textPattern, $params) : string {   
		if(!\Yii::$app->request->is_catalog_seo_only){
            return '';
        }                     
		if(!$this->SeoSynonyms){            
			$this->SeoSynonyms = \app\models\SeoSynonyms::find()->all();
			foreach ($this->SeoSynonyms as $mark) {
				$codes = \app\models\SeoSynonymsWords::findAll(['seo_synonym_id' => $mark->id]);	
				$this->SeoSynonymsWord[$mark->id] = $codes;
			}
		}
		
		foreach ($this->SeoSynonyms as $mark) {     
				$codes = $this->SeoSynonymsWord[$mark->id];                    
				$key = array_rand($codes);
				$replace_word = $codes[$key]->word;
				$textPattern = str_replace('[' . $mark->code . ']', trim($replace_word), $textPattern);
		}
		
		foreach ($params as $key => $value) {                                        
				$textPattern = str_replace($key, $value, $textPattern);
		}
		
		return $this->regionReplace($textPattern);
	}

	/**
	 * Сгенерировать текст для text_top_description
	 */
	private function getParams($section_id, $h1) : array{
		$params = ['[h1]' => $h1];
            
		$catalog_id = \app\models\Catalog::getIdBySectionId($section_id);
        
		foreach (\app\models\SectionMorph::findOne($catalog_id)->attributes as $key => $value) {
				$params["[type_{$key}]"] = $value;

				/*Исключаем раздел товары без описания*/
				if($section_id == 3414){
					$params["[type_{$key}]"] = '';
				}
		}
		return $params;
	}



	/**
     * Для генерации текстов для секции в топ
     * $catalog_id - ID catalog
     * $SeoParam - массив параметров для генерации
     */
    public function createSectionText($catalog_id)
    {
        //Тип страницы
        $sys_page_id = \app\helpers\PageType::SECTION;
        $arr_property = $this->getTemplate($sys_page_id, $catalog_id);
        
        $arr_catalogSubjectModel = \app\models\CatalogSubject::findAll(['catalog_id'=>$catalog_id]);                        
        $catalogSubjectModel = $arr_catalogSubjectModel[0];

        $sql = "select count(DISTINCT seller_id) as seller_count from index_product_cost_data where section_id = " . $catalogSubjectModel->subject_id;
        $row_info_count = \Yii::$app->db->createCommand($sql)->queryAll();
        $seller_count = $row_info_count[0]['seller_count'];
        if($seller_count == 0){
            $seller_count = '';
        }
        
        $sql = "select count(1) as product_count from products as cat where cat.section_id = " . $catalogSubjectModel->subject_id;
        $row_info_count = \Yii::$app->db->createCommand($sql)->queryAll();                
        $product_count = $row_info_count[0]['product_count'];
        
        $mdl_SeoPattern = \app\models\SeoPatternv2::getByParams(['section_id' => $catalog_id]);
        
        $params = ['[h1]' => mb_strtolower($mdl_SeoPattern->h1, self::CHARSET),'[seller_count]' => $seller_count,'[product_count]' => $product_count];                    
        
        foreach (\app\models\SectionMorph::findOne($catalog_id) as $key => $value) {
			$params["[{$key}]"] = $value;
			/*Исключаем раздел товары без описания*/
			if($catalog_id == 492){
				$params["[{$key}]"] = '';
			}
		}
                                    
		$data = ['top_description' => '', 'seo_text' => ''];
		$data['top_description'] = $this->generateSeoText($arr_property['top_description'], $params);
		$data['text_seo'] = $this->generateSeoText($arr_property['text_seo'], $params);
		
        return $data;
	}

	private function regionReplace($text){
		return strtr($text, [
			'[region]' => \app\models\DeliveryGeoMorph::getCurrentName('pred'),
			'{app_name}' => Yii::$app->name]);
	}
	
	/**
     * Получить шаблоны для seo
     * $sys_page_id - Тип страницы (sys_page_type)
     * $object_sub_id - ID конкретного объекта
     */
    private function getTemplate($sys_page_id, $object_sub_id = 0) : array {
        /*Получить шаблоны для секции*/
        $sql = "select sop.id, sop.name, sov.`value`
            from sys_object_property as sop, sys_object_value as sov
            where sop.object_type_id = 17 
            and sov.object_id = {$sys_page_id} 
            and (sov.object_sub_id = {$object_sub_id} or sov.object_sub_id = 0)
            and sov.object_property_id = sop.id
            ORDER BY sov.object_sub_id;";
        //    dd($sql);
        $arr_template = \Yii::$app->db->createCommand($sql)->queryAll();                
        
        foreach ($arr_template as $command) {
            $arr_property[$command['name']] = $command['value'];
        }
        
        return $arr_property;
    }
   
}
