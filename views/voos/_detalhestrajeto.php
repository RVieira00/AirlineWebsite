<?php
use app\models\Trajeto;
use app\models\search\AviaoSearch;
use \app\models\search\LugarSearch;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap\Html;
/** @var Trajeto $model */

$destino = Yii::$app->request->get('destino');
$origem = Yii::$app->request->get('origem');

$plane = AviaoSearch::findOne($model->Aviao_ID);


?>



<div class="col m-auto" style="text-align: center; height: 200px">
    <i class="fas fa-clock"></i><br>
    <?= $model->Data; ?><br>

    Tempo extimado: <small><?= $model->Tempo_Extimado; ?><br/></small>
</div>
<div class=" border-right">

</div>
<div class="col m-auto" style="text-align: center; height: 200px">
    <i class="fas fa-plane"></i><br>
    Avião:<?= $plane->Nome; ?><br>

    Preço: <h5>€ <?= $model->PrecoTrajeto; ?><br/></h5>
</div>




