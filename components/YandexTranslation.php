<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\i18n\MissingTranslationEvent;

class YandexTranslation extends \yii\base\Component
{
    
        /**
         * Provider API key. Get it for free at
         * @link https://tech.yandex.com/keys/get/?service=trnsl
         */
        const apiKey = 'trnsl.1.1.20180829T091450Z.552d72ffdc99179d.5520a5e45b0667b30c96fc1c00d023c02507f48f';

        /**
         * @param MissingTranslationEvent $event
         */
        public static function handleMissingTranslation(MissingTranslationEvent $event)
        {
                /* @var $messageSource \yii\i18n\DbMessageSource */
                $messageSource = $event->sender;
                $db = $messageSource->db;

                // Extract first part of "en-EN" form
                $sourceLang = explode('-', $messageSource->sourceLanguage)[0];
                $targetLang = explode('-', $event->language)[0];

                $content = file_get_contents('https://translate.yandex.net/api/v1.5/tr.json/translate?' . http_build_query([
                        'key' => self::apiKey,
                        'text' => $event->message,
                        'format' => 'plain',
                        'lang' => "$sourceLang-$targetLang",
                ]));
                if ($result = json_decode($content, true)) {
                        $event->translatedMessage = ArrayHelper::getValue($result, 'text.0');
                        if ($event->translatedMessage) {
                            // try to find message source
                            $id = (new Query())->select(['id'])
                                ->from($messageSource->sourceMessageTable)
                                ->where(['category' => $event->category, 'message' => $event->message])
                                ->createCommand()
                                ->queryScalar();
                            // if not found, insert a new one. Note: it's better to use "upsert" command (depending of the used DB engine)
                            if (!$id) {
                                $db->createCommand()->insert($messageSource->sourceMessageTable, [
                                        'category' => $event->category, 
                                        'message' => $event->message            
                                ])->execute();
                                $id = $db->getLastInsertId();
                            }
                            // insert new translated message.
                            $db->createCommand()->insert($messageSource->messageTable, [
                                    'id' => $id,
                                    'language' => $event->language,
                                    'translation' => $event->translatedMessage
                            ])->execute();
                        }
                }
                if (!$event->translatedMessage) {
                        $event->translatedMessage = "@MISSING: {$event->category}.{$event->message} FOR LANGUAGE {$event->language} @";
                }
                return null;
        }
}