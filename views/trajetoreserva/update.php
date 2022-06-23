<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trajetoreserva */

$this->title = 'Atualizar Trajeto-Reserva: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Trajeto-Reserva', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'Reserva_ID' => $model->Reserva_ID, 'Trajeto_ID' => $model->Trajeto_ID]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="trajetoreserva-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
