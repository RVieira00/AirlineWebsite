<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\TrajetoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trajeto-search container">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'Aviao_ID') ?>

    <?= $form->field($model, 'Tempo_Extimado') ?>

    <?= $form->field($model, 'PrecoTrajeto') ?>

    <?= $form->field($model, 'Data') ?>

    <?php // echo $form->field($model, 'Destino_ID') ?>

    <?php // echo $form->field($model, 'Origem_ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
