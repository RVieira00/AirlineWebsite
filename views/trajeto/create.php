<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Trajeto */

$this->title = 'Create Trajeto';
$this->params['breadcrumbs'][] = ['label' => 'Trajetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trajeto-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
