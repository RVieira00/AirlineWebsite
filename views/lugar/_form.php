<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Lugar;

/* @var $this yii\web\View */
/* @var $model app\models\Lugar */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="lugar-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $programs = Lugar::getAllAsArray();
        echo $form->field($model, "Aviao_ID")->dropDownList(
            $programs, ['prompt' => Yii::t('app', '--Select Program --')]
        )
    ;?>

    <?= $form->field($model, 'Executiva')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PreçoMult')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
