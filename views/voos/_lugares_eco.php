<?php
use app\models\Trajeto;
use app\models\Lugar;
use app\models\search\AviaoSearch;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $form yii\bootstrap4\ActiveForm */
/** @var Lugar $model */

$destino = Yii::$app->request->get('destino');
$origem = Yii::$app->request->get('origem');

$plane = AviaoSearch::findOne($model->Aviao_ID);

//var_dump($model);


?>



    <input type="radio" id="male" name="seat" value="<?= $model->ID ?>">Eco


