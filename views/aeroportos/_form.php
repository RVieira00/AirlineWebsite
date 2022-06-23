<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aeroportos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aeroportos-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Sigla')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
