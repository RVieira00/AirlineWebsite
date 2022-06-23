<?php

use app\models\search\VoosSearch;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use app\models\search\AviaoSearch;
use app\models\Voos;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/** @var Trajeto $model */

$this->title = 'Voos';
$this->params['breadcrumbs'][] = $this->title;

$destino = Yii::$app->request->get('destino');
$origem = Yii::$app->request->get('origem');
$flightNumber = Yii::$app->request->get('trajetoID');
$planeID = Yii::$app->request->get('planeID');

?>



<div class="container">
    <?php Pjax::begin(); ?>
    <section id="flight-list-header">
        <h1><?php echo $origem ?></h1> <span>para</span> <h1><?php echo $destino ?></h1>
        <h4>Voo número: <?php echo $flightNumber; ?></h4>
    </section>
    <hr>

    <?=

        ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_detalhestrajeto',
            'itemOptions' => ['class' => 'row'],
            'layout' => '<br><br><span>{items}</span>{pager}',
        ]);
    ?>

    <h1>
     Escolher lugar
    </h1>

    <section id="flight-choose-seat">
        <form onsubmit="return false;" id="seat-form">
            <div class="row"> <!--Executiva-->
                <div class="col-6">
                    <?=
                    ListView::widget([
                    'dataProvider' => $dataProviderLugarExec,
                    'itemView' => '_lugares_exec',
                    'itemOptions' => ['class' => 'plane-seat'],
                    'layout' => '<br><br><span>{items}</span>{pager}',
                    ]);
                    ?>
                </div>
            </div>
            <hr>
            <div class="row"> <!--Economica-->
                <div class="col-6">
                    <?=
                    ListView::widget([
                        'dataProvider' => $dataProviderLugarEco,
                        'itemView' => '_lugares_eco',
                        'itemOptions' => ['class' => 'plane-seat'],
                        'layout' => '<br><br><span>{items}</span>{pager}',
                    ]);
                    ?>
                </div>
            </div>
            <div id="TOS_container">
                <div class="row-cols-1">
                    <h5><i>Termos de privacidade</i></h5>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                    <br>
                </div>
                <div class="row-cols-1">
                    <div id="TOS_checkbox_container">
                        <input class="form-check-input" type="checkbox" value="read" id="TOS_checkbox">
                        <label class="form-check-label" for="flexCheckDefault">
                            Confirmo que li e aceito os termos.
                        </label>
                    </div>
                </div>
            </div>
        </form>
        <br>
        <button class="btn btn-outline-primary" id="confimar_reserva">Confirmar Reserva</button>
    </section>
    <br>
    <br>
    <?php Pjax::end(); ?>


</div>
