<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Trajeto;
use kartik\datetime\DateTimePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Trajeto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trajeto-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $programs = Trajeto::getAllAviaoArray();
    echo $form->field($model, "Aviao_ID")->dropDownList(
        $programs, ['prompt' => Yii::t('app', '--Selecionar Avião --')]
    )
    ;?>



    <?= $form->field($model, 'PrecoTrajeto')->textInput(['maxlength' => true]) ?>

    <?php
    $programs = Trajeto::getAllAeroportosArray();
    echo $form->field($model, "Destino_ID")->dropDownList(
        $programs, ['prompt' => Yii::t('app', '--Selecionar Destino --')]
    )
    ;?>

    <?php
    $programs = Trajeto::getAllAeroportosArray();
    echo $form->field($model, "Origem_ID")->dropDownList(
        $programs, ['prompt' => Yii::t('app', '--Selecionar Origem --')]
    )
    ;?>

    <?= $form->field($model, 'Tempo_Extimado')->widget(TimePicker::classname(), [
        'name' => 't1',
        'pluginOptions' => [
            'showMeridian' => false,
            'minuteStep' => 1,
        ]
    ]); ?>

    <?= $form->field($model, 'Data')->widget(
        DateTimePicker::class,
        [
            'options' => ['placeholder' => 'Select operating time ...'],
            'convertFormat' => true,
            'pluginOptions' => [
                'format' => 'yyyy-MM-dd HH:mm',
                'startDate' => '01-Mar-2014 12:00 AM',
                'todayHighlight' => true
            ]
        ]
    );?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
