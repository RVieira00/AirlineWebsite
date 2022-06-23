<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\TrajetoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Trajetos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trajeto-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Trajeto', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'Aviao',
                'value' => 'aviao.Nome'
            ],
            'Tempo_Extimado',
            'PrecoTrajeto',
            'Data',
            //'Destino_ID',
            [
                'attribute' => 'Destino',
                'value' => 'destino.Nome'
            ],
            //'Origem_ID',
            [
                'attribute' => 'Origem',
                'value' => 'origem.Nome'
            ],


            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
