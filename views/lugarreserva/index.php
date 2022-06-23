<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LugarreservaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lugar-Reservas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugarreserva-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Lugar-Reserva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'ID',
            'Lugar_ID',
            'Lugar_Aviao_ID',
            'Reserva_ID',
            'Reserva_Utilizador_ID',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
