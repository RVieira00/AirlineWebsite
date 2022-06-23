<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lugarreserva */

$this->title = 'Criar Lugar-Reserva';
$this->params['breadcrumbs'][] = ['label' => 'Lugar-Reservas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugarreserva-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
