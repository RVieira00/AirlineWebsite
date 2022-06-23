<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aviao */

$this->title = 'Registar Aviao';
$this->params['breadcrumbs'][] = ['label' => 'Aviões', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aviao-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
