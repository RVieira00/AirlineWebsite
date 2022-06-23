<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aviao */

$this->title = 'Atualizar registo do avião: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Aviaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aviao-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
