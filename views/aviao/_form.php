<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aviao */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="aviao-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lugares')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lugares_eco')->textInput() ?>

    <?= $form->field($model, 'Lugares_exec')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
