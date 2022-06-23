<?php
use app\models\Trajeto;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
/** @var Trajeto $model */

$destino = Yii::$app->request->get('destino');
$origem = Yii::$app->request->get('origem');

$plane = \app\models\search\AviaoSearch::findOne($model->Aviao_ID);

//var_dump($plane->Nome);

?>

    <div class="col m-auto">
        <i class="fas fa-clock"></i><br>
        <?= $model->Tempo_Extimado?><br>
        <hr>
        <small><?= $model->Data; ?><br/></small>
    </div>

    <div class="col m-auto m">
        <?= $plane->Nome; ?>
    </div>


    <div class="col m-auto">
        <span>Lugares Eco: <?= $plane->Lugares_eco; ?></span><br>
        <span>Lugares Exec: <?= $plane->Lugares_exec; ?></span><br>
    </div>
    <div class="col m-auto">
        € <?= $model->PrecoTrajeto; ?>
    </div>

    <a class="col m-auto voo-link" href="voos/detalhestrajeto?trajetoID=<?= $model->ID; ?>&origem=<?= $origem ?>&destino=<?= $destino?>&aviaoID=<?= $model->Aviao_ID ?>" >
        <div class="round">
            <div id="cta">
                <span class="arrow primera next "></span>
                <span class="arrow segunda next "></span>
            </div>
        </div>
    </a>

