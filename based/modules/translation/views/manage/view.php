<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\translation\models\I18nMessage;

/* @var $this yii\web\View */
/* @var $model app\modules\translation\models\I18nSource */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('translation', 'Translation'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-source-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(
            Yii::t('yii', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]
        ) ?>
    </p>

    <?=
    DetailView::widget(
        [
            'model' => $model,
            'attributes' => [
                'id',
                'category',
                'message',
                [
                    'attribute' => 'language',
                    'label' => (new I18nMessage())->attributeLabels()['language'],
                    'value' => isset($language[$model->i18nMessage->language]) ? $language[$model->i18nMessage->language] : '',
                ],
                [
                    'attribute' => 'translation',
                    'label' => (new I18nMessage())->attributeLabels()['translation'],
                    'value' => isset($model->i18nMessage->translation) ? $model->i18nMessage->translation : '',
                ],
            ],
        ]
    ) ?>

</div>
