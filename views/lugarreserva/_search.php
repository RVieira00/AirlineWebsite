<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\LugarreservaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lugarreserva-search container">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Lugar_ID') ?>

    <?= $form->field($model, 'Lugar_Aviao_ID') ?>

    <?= $form->field($model, 'Reserva_ID') ?>

    <?= $form->field($model, 'Reserva_Utilizador_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
