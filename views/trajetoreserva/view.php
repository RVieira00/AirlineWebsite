<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trajetoreserva */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Trajeto-Reserva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trajetoreserva-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID, 'Reserva_ID' => $model->Reserva_ID, 'Trajeto_ID' => $model->Trajeto_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID, 'Reserva_ID' => $model->Reserva_ID, 'Trajeto_ID' => $model->Trajeto_ID], [
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
            'Reserva_ID',
            'Trajeto_ID',
        ],
    ]) ?>

</div>
