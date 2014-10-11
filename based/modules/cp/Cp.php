<?php

namespace app\modules\cp;

class Cp extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\cp\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
        $this->modules = [
            'language' => [
                'class' => 'app\modules\language\Cp',
            ],
        ];
    }
}
