<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trajeto */

$this->title = 'Update Trajeto: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Trajetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'Aviao_ID' => $model->Aviao_ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trajeto-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
