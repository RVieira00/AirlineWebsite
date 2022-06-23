<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lugarreserva */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="lugarreserva-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Lugar_ID')->textInput() ?>

    <?= $form->field($model, 'Lugar_Aviao_ID')->textInput() ?>

    <?= $form->field($model, 'Reserva_ID')->textInput() ?>

    <?= $form->field($model, 'Reserva_Utilizador_ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
