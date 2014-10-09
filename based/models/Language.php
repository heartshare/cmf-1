<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cmf_language".
 *
 * @property integer $id
 * @property string $title
 * @property string $iso
 * @property integer $is_default
 *
 * @property I18nMessage[] $i18nMessages
 * @property I18nSource[] $ids
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @var array
     */
    private static $_languages = [];

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%language}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 16],
            [['iso'], 'string', 'max' => 8],
            [['title', 'iso'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'iso' => 'ISO',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getI18nMessages()
    {
        return $this->hasMany(I18nMessage::className(), ['language' => 'iso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIds()
    {
        return $this->hasMany(I18nSource::className(), ['id' => 'id'])->viaTable(
            '{{%i18n_message}}',
            ['language' => 'iso']
        );
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function listing()
    {
        if (self::$_languages === []) {
            self::$_languages = self::find()->asArray()->all();
        }
        return self::$_languages;
    }

    /**
     * @return string
     */
    public static function getCurrent()
    {
        return yii::$app->language;
    }

    /**
     * @param string $language
     */
    public static function setCurrent($language)
    {
        yii::$app->language = $language;
    }

    /**
     * @param string $language
     * @return bool
     */
    public static function isLanguage($language)
    {
        if (in_array($language, ArrayHelper::getColumn(self::listing(), 'iso'))) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return static
     */
    public static function getCurrentRecord()
    {
        return self::findOne(['iso' => self::getCurrent()]);
    }
}
