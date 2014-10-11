<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 07.10.14
 * Time: 22:30
 */

namespace app\modules\language\widgets;

use yii;
use yii\base\Widget;
use app\modules\language\models\Language;
use yii\bootstrap\Nav;
use yii\helpers\ArrayHelper;

class LanguageWidget extends Widget
{
    /**
     * @var array
     */
    protected $languages = [];

    /**
     * @var array
     */
    public $options = [];

    public function init()
    {
        $this->languages = Language::listing();
    }

    /**
     * @return string
     */
    public function run()
    {
        $list = [];

        foreach ($this->languages as $row) {
            $list = ArrayHelper::merge(
                $list,
                [
                    [
                        'label' => $row['title'],
                        'url' => yii::$app->urlManager->createUrl(
                                [yii::$app->requestedRoute, 'language' => $row['iso']]
                            ),
                    ],
                ]
            );
        }

        return Nav::widget(
            [
                'options' => $this->options,
                'items' => [
                    [
                        'label' => Language::getCurrentRecord()->title,
                        'items' => $list,
                    ],
                ],
            ]
        );
    }
}
