<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 07.10.14
 * Time: 22:30
 */

namespace app\components;

use yii;
use yii\base\Widget;
use app\models\Language;
use yii\bootstrap\ButtonDropdown;

class LanguageWidget extends Widget
{
    /**
     * @var array
     */
    protected $languages = [];

    public function init()
    {
        $this->languages = Language::find()->asArray()->all();
    }

    /**
     * @return string
     */
    public function run()
    {
        $list = [];

        foreach ($this->languages as $row) {
            array_push(
                $list,
                [
                    'label' => $row['title'],
                    'url' => yii::$app->urlManager->createUrl([yii::$app->defaultRoute, 'language' => $row['iso']]),
                ]
            );
        }

        return ButtonDropdown::widget(
            [
                'label' => 'Language',
                'dropdown' => [
                    'items' => $list,
                ],
            ]
        );
    }
}
