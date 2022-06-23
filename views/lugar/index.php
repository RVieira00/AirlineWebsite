<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LugarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lugares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugar-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registar Lugar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID',
            'Aviao_ID',
            [
                'attribute' => 'Avião',
                'value' => 'aviao.Nome'
            ],
            'Executiva',
            'PreçoMult',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
