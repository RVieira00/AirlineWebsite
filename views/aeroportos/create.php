<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aeroportos */

$this->title = 'Create Aeroportos';
$this->params['breadcrumbs'][] = ['label' => 'Aeroportos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aeroportos-create container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
