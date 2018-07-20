<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components\yii\db;


class Command extends \yii\db\Command
{
    public function loopExecute($echo = false) {
        $res = false;
		$i = 10;
        do {
			$i--;
			$execute_ready = false;
			try {
				$res = $this->execute();
				$execute_ready = false;
			} catch (\yii\db\Exception $e) {
				sleep(1);
                if($echo){
                    echo 'sql loop sleep';
                    dd($e->getMessage());
                }
                $start = time();
                while ($start+60 > time()) {};
				if($i > 0){
					$execute_ready = true;
				}else{
					$execute_ready = false;
				}
				
			}
		} while ($execute_ready);
		return $res;
    }
}
