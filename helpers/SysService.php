<?php
namespace app\helpers;

class SysService {

    /**
     * Отправка писем
     */
    const SEND_MAIL = 'mail_send';

    /**
     * Отправка писем smtp
     */
    const SMTP_SEND_MAIL = 'smtp_mail_send';

    private static $data;

    public static function get($name){
        if(isset(self::$data[$name])){
            return self::$data[$name];
        }
        $res = \Yii::$app->db->createCommand("SELECT value FROM `sys_status` WHERE `name` = '{$name}' LIMIT 1")->queryOne();
        self::$data[$name] = $res['value'];
        return $res['value'];
    }

    public static function set($name, $value){
        \Yii::$app->db->createCommand("call prc_sys_status_insert('{$name}','{$value}');")->execute();
    }

    /*
     * Добавление событие в базу обработки событий системы
     * $key - Событие
     * $value - Значение
     */
    public static function EventAdd($key, array $value) {

        $str_value = json_encode($value, JSON_UNESCAPED_UNICODE);
        \Yii::$app->db->createCommand("call ps_sys_events_add('{$key}','{$str_value}');")->execute();
    }

    public static function EventAddOne($key, $value) {
        \Yii::$app->db->createCommand("call ps_sys_events_add('{$key}','{$value}');")->execute();
    }

    /**
     * Инсерт через ивент
     * @param object $model
     */
    public static function eventForInsert($model, $class) {
        $value = $model->getAttributes();
        foreach ($value as &$item){
            $item = addslashes($item);
            $item = nl2br($item);
            $item = str_replace(array("\r","\n")," ",$item);
        }
        $data = ['class' => addslashes( $class ), 'attributes' => $value];
        self::EventAdd(self::MODEL_INSERT, $data);
    }

    /**
     *
     * @param type $email
     * @param type $text
     * @param type $template
     * @param type $params
     */
    public static function sendEmail($email, $subject, $from, $text = false, $template = 'simple', $params = []) {
        $arr_mail = (array)$params;
        $arr_mail['email'] = $email;
        $arr_mail['tmpl'] = $template;
        $arr_mail['from'] = $from;
        $arr_mail['subject'] = $subject;
        if($text){
            $arr_mail['text'] = $text;

        }
        foreach ($arr_mail as &$item){
            if(is_array($item)){
                continue;
            }
            $item = nl2br($item);
            $item = str_replace(array("\r","\n")," ",$item);
        }
        if(isset($arr_mail['smtp_type'])){
            self::EventAdd(self::SMTP_SEND_MAIL, $arr_mail);
        } else {
            self::EventAdd(self::SEND_MAIL, $arr_mail); ;
        }

    }
}
