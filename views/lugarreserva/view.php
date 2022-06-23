<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lugarreserva */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Lugar-Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lugarreserva-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'Lugar_ID' => $model->Lugar_ID, 'Lugar_Aviao_ID' => $model->Lugar_Aviao_ID, 'Reserva_ID' => $model->Reserva_ID, 'Reserva_Utilizador_ID' => $model->Reserva_Utilizador_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'Lugar_ID' => $model->Lugar_ID, 'Lugar_Aviao_ID' => $model->Lugar_Aviao_ID, 'Reserva_ID' => $model->Reserva_ID, 'Reserva_Utilizador_ID' => $model->Reserva_Utilizador_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'Lugar_ID',
            'Lugar_Aviao_ID',
            'Reserva_ID',
            'Reserva_Utilizador_ID',
        ],
    ]) ?>

</div>
