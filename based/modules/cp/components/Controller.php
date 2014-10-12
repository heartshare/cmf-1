<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 11.10.14
 * Time: 21:23
 */

namespace app\modules\cp\components;

use yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class Controller extends \yii\web\Controller
{
    /**
     * @var string
     */
    public $layout = '@app/modules/cp/views/layouts/main';

    /**
     * @param string $id
     * @param \yii\base\Module $module
     * @param array $config
     */
    public function __construct($id, $module, $config = [])
    {
        yii::$app->errorHandler->errorAction = 'cp/default/error';
        parent::__construct($id, $module, $config = []);
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['post'],
                    ],
                ],
            ]
        );
    }
}
