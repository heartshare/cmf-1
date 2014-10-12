<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\translation\models\I18nSource */

$this->title = Yii::t(
        'app',
        'Update {modelClass}: ',
        [
            'modelClass' => 'I18n Source',
        ]
    ) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'I18n Sources'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="i18n-source-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render(
        '_form',
        [
            'model' => $model,
        ]
    ) ?>

</div>
