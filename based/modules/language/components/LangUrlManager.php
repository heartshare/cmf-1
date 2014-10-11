<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 07.10.14
 * Time: 16:47
 */

namespace app\modules\language\components;

use yii;
use yii\web\UrlManager;
use app\modules\language\models\Language;
use yii\helpers\ArrayHelper;

class LangUrlManager extends UrlManager
{
    /**
     * @param array|string $params
     * @return string
     */
    public function createUrl($params)
    {
        $language = isset($params['language']) ? $params['language'] : Language::getCurrent();

        if (!Language::isLanguage($language)) {
            $language = Language::getCurrent();
        }

        return parent::createUrl(ArrayHelper::merge(['language' => $language], $params));
    }
}
