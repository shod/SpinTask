<?php

namespace app\commands;

use app\models\Seller;
use yii\console\Controller;
use yii\swiftmailer\Mailer;

class MailController extends Controller{
    private $Tack_limit = 10;
    public function actionSend()
    {
        $sql = "select id, params from sys_job_commands where `name` = 'mail_send' and is_error = 0 ORDER BY priority desc, id limit " . $this->Tack_limit;
        $command_row = \Yii::$app->db->createCommand($sql)->queryAll();

        foreach((array)$command_row as $command){
            $id = $command['id'];
            //$params = json_decode($command['params'],TRUE);
            try{
                $params = str_replace("\n", "", $command['params']);
                $params = json_decode($params, JSON_UNESCAPED_UNICODE);
                if($params){
                    if(!isset($params['from']) || ($params['from'] == "")){
                        $params['from'] = \Yii::$app->params['email_from'];
                    }
                    if(!isset($params['subject'])){
                        $params['subject'] = "New message";
                    }
                    if(!isset($params['tmpl'])){
                        $params['tmpl'] = "simple";
                    }

                    \Yii::$app->mailer->useFileTransport = false;

                    $mailTo = $params['email'];
                    $mailTo = trim($mailTo);
                    $mailTo = strtolower($mailTo);
                    $print_params = $params;

                    // unset default
                    unset($print_params['email']);
                    unset($print_params['tmpl']);
                    unset($print_params['from']);
                    unset($print_params['subject']);

                    \Yii::$app->mailer->compose($params['tmpl']
                        ,['params' => $print_params])
                        ->setFrom([$params['from'] => 'RealWed'])
                        ->setTo( $mailTo )
                        ->setSubject($params['subject'])
                        ->send();

                   // \Yii::$app->db->createCommand('delete from sys_job_commands where id = '.$id)->execute();
                }else{
                    \Yii::$app->db->createCommand('update sys_job_commands set is_error = is_error+1 where id = '.$id)->execute();
                }
            }catch(\yii\console\Exception $Error){
                \Yii::$app->db->createCommand('update sys_job_commands set is_error = is_error+1 where id = '.$id)->execute();
            }
            catch(\Swift_RfcComplianceException $Error){
                dd($Error->getMessage());
                \Yii::$app->db->createCommand('update sys_job_commands set is_error = is_error+1 where id = '.$id)->execute();
            }
        }

    }
}