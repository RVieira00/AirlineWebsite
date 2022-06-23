<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lugar */

$this->title = 'Registar Lugar';
$this->params['breadcrumbs'][] = ['label' => 'Lugares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lugar-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
