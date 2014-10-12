<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\translation\models\I18nSource */

$this->title = Yii::t(
        'app',
        'Update {modelClass}: ',
        [
            'modelClass' => 'Translation',
        ]
    ) . ' ' . $i18nSource->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Translation'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $i18nSource->id, 'url' => ['view', 'id' => $i18nSource->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="i18n-source-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render(
        '_form',
        [
            'i18nSource' => $i18nSource,
            'i18nMessage' => $i18nMessage,
        ]
    ) ?>

</div>
