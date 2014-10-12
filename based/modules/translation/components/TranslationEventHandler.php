<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 07.10.14
 * Time: 12:36
 */

namespace app\modules\translation\components;

use yii\i18n\MissingTranslationEvent;
use app\modules\translation\models\I18nSource;
use app\modules\translation\models\I18nMessage;

class TranslationEventHandler
{
    public static function handleMissingTranslation(MissingTranslationEvent $event)
    {
        $i18nSource = I18nSource::findOne(['category' => $event->category, 'message' => $event->message]);

        if ($i18nSource === null) {
            $i18nSource = new I18nSource();
            $i18nSource->category = $event->category;
            $i18nSource->message = $event->message;
            $i18nSource->save();
        }

        $i18nMessage = I18nMessage::findOne(['id' => $i18nSource->id, 'language' => $event->language]);

        if ($i18nMessage === null) {
            $i18nMessage = new I18nMessage();
            $i18nMessage->id = $i18nSource->id;
            $i18nMessage->language = $event->language;
            $i18nMessage->translation = $event->message;
            $i18nMessage->save();
        }
    }
}