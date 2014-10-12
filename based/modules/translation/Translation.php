<?php

namespace app\modules\translation;

class Translation extends \yii\base\Module implements \yii\base\BootstrapInterface
{
    /**
     * @var string
     */
    public $controllerNamespace = 'app\modules\translation\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * @param \yii\base\Application $app
     */
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules(
            [
                '<language:\w+\-\w+>/cp/' . $this->id . '/<controller:\w+>/<action:\w+>' => 'cp/' . $this->id . '/<controller>/<action>',
            ],
            false
        );
    }
}
