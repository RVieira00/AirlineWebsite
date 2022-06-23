<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Trajetoreserva */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="trajetoreserva-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Reserva_ID')->textInput() ?>

    <?= $form->field($model, 'Trajeto_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
