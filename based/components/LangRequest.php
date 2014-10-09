<?php
/**
 * Created by PhpStorm.
 * User: krok
 * Date: 09.10.14
 * Time: 18:38
 */

namespace app\components;

use yii;
use yii\web\Request;
use app\models\Language;
use yii\helpers\ArrayHelper;

class LangRequest extends Request
{
    /**
     * @return bool|string
     */
    protected function resolveRequestUri()
    {
        $pattern = [];
        $resolveRequestUri = parent::resolveRequestUri();

        if (yii::$app->getUrlManager()->enablePrettyUrl === true) {
            $pattern[] = '/' . preg_replace('/\//', '\/', yii::$app->getUrlManager()->suffix) . '/';
        }

        if (yii::$app->getUrlManager()->showScriptName === true) {
            $pattern[] = '/' . preg_replace('/\//', '\/', $this->getScriptUrl()) . '/';
        }

        $requestUri = preg_replace($pattern, '', $resolveRequestUri);

        list($language,) = explode('/', trim($requestUri, '/'));

        if (Language::isLanguage($language)) {
            Language::setCurrent($language);
        } else {
            Language::setCurrent(
                $this->getPreferredLanguage(ArrayHelper::getColumn(Language::listing(), 'iso'))
            );
        }

        return $resolveRequestUri;
    }
}
