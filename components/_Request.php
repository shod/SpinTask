<?php

namespace app\components;

class Request extends \yii\web\Request {

    public $seo;
    public $is_catalog_seo_only = TRUE;
    public $page_type_id = 0;
    public $product_id;
    public $section_id;
    public $section_url = '';
    public $root_menu_url;
    
    private $_hostInfo;

    public function init() {
        $this->seo = new \app\models\SeoPatternv2();
        parent::init();
    }
    
    public function getAbsoluteUrl($secure = NULL)
    {
        return $this->getHostInfo($secure) . $this->getUrl();
    }
    
    public function getHostInfo($secure = NULL)
    {
        if($secure != NULL){
            $http = $secure ? 'https' : 'http';
            if (isset($_SERVER['HTTP_HOST'])) {
                $_hostInfo = $http . '://' . $_SERVER['HTTP_HOST'];
            } elseif (isset($_SERVER['SERVER_NAME'])) {
                $_hostInfo = $http . '://' . $_SERVER['SERVER_NAME'];
                $port = $secure ? $this->getSecurePort() : $this->getPort();
                if (($port !== 80 && !$secure) || ($port !== 443 && $secure)) {
                    $_hostInfo .= ':' . $port;
                }
            }
            return $_hostInfo;
        }
        if ($this->_hostInfo === null ) {
            $secure = $this->getIsSecureConnection();
            $http = $secure ? 'https' : 'http';
            if (isset($_SERVER['HTTP_HOST'])) {
                $this->_hostInfo = $http . '://' . $_SERVER['HTTP_HOST'];
            } elseif (isset($_SERVER['SERVER_NAME'])) {
                $this->_hostInfo = $http . '://' . $_SERVER['SERVER_NAME'];
                $port = $secure ? $this->getSecurePort() : $this->getPort();
                if (($port !== 80 && !$secure) || ($port !== 443 && $secure)) {
                    $this->_hostInfo .= ':' . $port;
                }
            }
        }

        return $this->_hostInfo;
    }

    public function getInt($name = null, $defaultValue = null) {
        if ($name === null) {
            return (int) $this->getQueryParams();
        } else {
            return (int) $this->getQueryParam($name, $defaultValue);
        }
    }

    public function setCookie($name, $value, $time = 0) {
        unset($_COOKIE[$name]);

        \Yii::$app->response->cookies->add(new \yii\web\Cookie([
            'name' => $name,
            'value' => $value
        ]));


        /*
          if(version_compare(PHP_VERSION,'5.2.0','>='))
          setcookie($name,$value,0,$cookie->path,$cookie->domain,$cookie->secure,$cookie->httpOnly);
          else
          setcookie($name,$value,0,$cookie->path,$cookie->domain,$cookie->secure); */
    }

    public function getCookie($name) {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    public function getProtacol() {
        return 'http://';
    }

    public function setPageType(int $value) {
        $this->page_type_id = $value;
    }

    public function getPageType(): int {
        return $this->page_type_id;
    }
    
    public function setSection(int $id) {
        $this->section_id = $id;
        
        $catalog_id = \app\models_ex\Catalog::getIdBySectionId($id);
        $this->setSectionUrl($catalog_id);
        $this->setMenuBySection($catalog_id);
    }
    
    private function setSectionUrl(int $catalog_id){
        $url = \yii\helpers\Url::to(['/catalog/index', 'section_id' => $catalog_id]);
        $this->section_url = trim($url, '/');
    }
    
    public function getSectionUrl() : string {
        return $this->section_url;
    }
    
    private function setMenuBySection(int $catalog_id) {
        $menu = \app\models\Menu::find()->where(['catalog_id' => $catalog_id])->one();
        if($menu){
            $rootmenu = $menu->getRootMenu();
            $this->setRootMenuUrl($rootmenu);
        }
        
    }
    
    public function setRootMenuUrl($model) {
        $this->root_menu_url = $model->seo->url;
    }

}
