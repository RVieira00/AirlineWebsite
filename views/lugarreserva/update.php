<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lugarreserva */

$this->title = 'Atualizar Lugar-Reserva: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Lugar-Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'Lugar_ID' => $model->Lugar_ID, 'Lugar_Aviao_ID' => $model->Lugar_Aviao_ID, 'Reserva_ID' => $model->Reserva_ID, 'Reserva_Utilizador_ID' => $model->Reserva_Utilizador_ID]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="lugarreserva-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
