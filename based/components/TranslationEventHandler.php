<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 07.10.14
 * Time: 12:36
 */

namespace app\components;

use yii;
use yii\i18n\MissingTranslationEvent;

class TranslationEventHandler
{
    public static function handleMissingTranslation(MissingTranslationEvent $event)
    {
        yii::$app->db->createCommand(
            "INSERT INTO " . $event->sender->sourceMessageTable . " SET `category` = :category, `message` = :message ON DUPLICATE KEY UPDATE `category` = :category;",
            [
                ':category' => $event->category,
                ':message' => $event->message,
            ]
        )->execute();

        if (yii::$app->db->lastInsertID) {
            yii::$app->db->createCommand(
                "INSERT INTO " . $event->sender->messageTable . " SET `id` = :id, `language` = :language, `translation` = :translation ON DUPLICATE KEY UPDATE `translation` = :translation;",
                [
                    ':id' => yii::$app->db->lastInsertID,
                    ':language' => $event->language,
                    ':translation' => '',
                ]
            )->execute();
        }
    }
}
