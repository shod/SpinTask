<?php
namespace app\helpers;
use app\models\MailRule;

class MailService
{
    public static function Add($type){
        $mail_rule = MailRule::find()->where(['type' => $type])->one();
        $sql = $mail_rule->sql_query;
        $users = \Yii::$app->db->createCommand($sql)->queryAll();
        foreach ($users as $user){
            $user['template'] = $mail_rule->template;

            \app\helpers\SysService::sendEmail(
                $user['email'],
                $user['subject'],
                \Yii::$app->params['email_from'], FALSE,
                $user['template'],
                $user);
        }
    }
}