<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components\yii\i18n;

use Yii;


/**
 * DbMessageSource extends [[MessageSource]] and represents a message source that stores translated
 * messages in database.
 *
 * The database must contain the following two tables: source_message and message.
 *
 * The `source_message` table stores the messages to be translated, and the `message` table stores
 * the translated messages. The name of these two tables can be customized by setting [[sourceMessageTable]]
 * and [[messageTable]], respectively.
 *
 * The database connection is specified by [[db]]. Database schema could be initialized by applying migration:
 *
 * ```
 * yii migrate --migrationPath=@yii/i18n/migrations/
 * ```
 *
 * If you don't want to use migration and need SQL instead, files for all databases are in migrations directory.
 *
 * @author resurtm <schevgeny@gmail.com>
 * @since 2.0
 */
class DbMessageSource extends \yii\i18n\DbMessageSource
{
    


    public function translate($category, $message, $language)
    {
        if(!in_array($category, ['const', 'Site', 'yii'])){
            $crc = (string) crc32($message);
            $category .= '_' . substr($crc, 0, 3); 
        }
        
        if ($this->forceTranslation || $language !== $this->sourceLanguage) {
            return $this->translateMessage($category, $message, $language);
        }

        return false;
    }
}
