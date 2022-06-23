<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AviaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aviões';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aviao-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registar Avião', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID',
            'Nome',
            'Lugares',
            'Lugares_eco',
            'Lugares_exec',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
