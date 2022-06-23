<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aeroportos */

$this->title = 'Update Aeroportos: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Aeroportos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aeroportos-update container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
