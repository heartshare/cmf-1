<?php

namespace app\modules\cp;

use yii;

class Cp extends \yii\base\Module
{
    /**
     * @var string
     */
    public $controllerNamespace = 'app\modules\cp\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->registerModules();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        yii::$app->i18n->translations[$this->id] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@app/modules/' . $this->id . '/messages',
        ];
    }

    public function registerModules()
    {
        $this->modules = [
            'language' => [
                'class' => 'app\modules\language\Manage',
            ],
            'translation' => [
                'class' => 'app\modules\translation\Manage',
            ],
            'page' => [
                'class' => 'app\modules\page\Manage',
            ],
        ];
    }
}
