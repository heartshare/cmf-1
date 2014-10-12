<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\translation\models\I18nSourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Translation');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="i18n-source-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=
        Html::a(
            Yii::t(
                'app',
                'Create {modelClass}',
                [
                    'modelClass' => 'Translation',
                ]
            ),
            ['create'],
            ['class' => 'btn btn-success']
        ) ?>
    </p>

    <?=
    GridView::widget(
        [
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'category',
                'message',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]
    ); ?>

</div>
