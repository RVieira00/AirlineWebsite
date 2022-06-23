<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trajetoreserva */

$this->title = 'Criar Trajeto-Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Trajeto-Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trajetoreserva-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
