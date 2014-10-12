<?php

namespace app\modules\translation\models;

use Yii;

/**
 * This is the model class for table "{{%i18n_source}}".
 *
 * @property string $id
 * @property string $category
 * @property string $message
 *
 * @property I18nMessage[] $i18nMessages
 * @property Language[] $languages
 */
class I18nSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%i18n_source}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'string', 'max' => 32],
            [['message'], 'string', 'max' => 128],
            [['message'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
            'message' => Yii::t('app', 'Message'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getI18nMessages()
    {
        return $this->hasMany(I18nMessage::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages()
    {
        return $this->hasMany(Language::className(), ['iso' => 'language'])->viaTable(
            '{{{%i18n_message}}}',
            ['id' => 'id']
        );
    }
}
