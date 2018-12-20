<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

/**
 * Description of Analytics
 *
 * @author MIG102-ssd
 */
class Analytics {
    //put your code here
    
    public $google_tag_id;
    public $metrica;


    public function getCode($name) {
        return $this->$name;
    }
}
