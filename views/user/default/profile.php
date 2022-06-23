<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use amnah\yii2\user\helpers\Timezone;
use \app\models\search\ReservaSearch;
use \app\models\search\TrajetoreservaSearch;
use \app\models\search\TrajetoSearch;
use \app\models\search\AviaoSearch;
use \app\models\search\AeroportosSearch;
use \app\models\search\LugarreservaSearch;
use \app\models\search\LugarSearch;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var amnah\yii2\user\models\Profile $profile
 */


$reservaID_array = ReservaSearch::findAll(["Utilizador_ID"=>Yii::$app->user->id]);


$this->title = Yii::t('user', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-profile container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($flash = Yii::$app->session->getFlash("Profile-success")): ?>

        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>

    <?php endif; ?>

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($profile, 'full_name') ?>

    <?php
    // by default, this contains the entire php timezone list of 400+ entries
    // so you may want to set up a fancy jquery select plugin for this, eg, select2 or chosen
    // alternatively, you could use your own filtered list
    // a good example is twitter's timezone choices, which contains ~143  entries
    // @link https://twitter.com/settings/account
    ?>
    <?= $form->field($profile, 'timezone')->dropDownList(ArrayHelper::map(Timezone::getAll(), 'identifier', 'name')); ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <br>

    <h1>As suas reservas</h1>
    <hr>
    <?php
        if(count($reservaID_array)>0){

            for($i = 0; $i < count($reservaID_array); $i++){
                //Detalhes do trajeto
                $trajeto_reserva = TrajetoreservaSearch::findOne(["Reserva_ID"=>$reservaID_array[$i]]);
                $trajetoID = $trajeto_reserva->Trajeto_ID;
                //var_dump($trajetoID);
                $trajeto_items = TrajetoSearch::findOne(["ID"=>$trajetoID]);
                $aviaoID = $trajeto_items->Aviao_ID;
                $origemID = $trajeto_items->Origem_ID;
                $destinoID = $trajeto_items->Destino_ID;
                $data = $trajeto_items->Data;
                $preco = $trajeto_items->PrecoTrajeto;
                $tempoExt = $trajeto_items->Tempo_Extimado;

                $aviaoNome = AviaoSearch::findOne(["ID"=>$aviaoID])->Nome;
                $destinoNome = AeroportosSearch::findOne(["ID"=>$destinoID])->Nome;
                $origemNome = AeroportosSearch::findOne(["ID"=>$origemID])->Nome;

                //Detalhes do lugar
                $lugarID = LugarreservaSearch::findOne([
                        "Reserva_ID"=>$reservaID_array[$i],
                        "Reserva_Utilizador_ID" => Yii::$app->user->id,
                ])->Lugar_ID;

                $executiva = LugarSearch::findOne(["ID"=>$lugarID]);
                ?>
                <div class="card">
                    <div class="card-header">
                        <?= $data ?>
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <h5><?= $origemNome ?> <small>para</small> <?= $destinoNome ?></h5>
                            <footer class="blockquote-footer">
                                <div>Avião: <?= $aviaoNome ?></div>
                                <div>Duração: <?= $tempoExt ?></div>
                                <div>Lugar: <?= $lugarID ?>
                                <?php
                                    if($executiva){
                                        echo "Executivo";
                                    }else{
                                        echo "Economico";
                                    }
                                ?>
                                </div>
                                <div>Preço: <?= $preco ?></div>
                            </footer>
                        </blockquote>
                    </div>
                </div>
                <?php
            }
        }else{
            ?>
            <p><i>Ainda não efetuou nenhuma reserva. Pode faze-lo <a href="/#carousel">aqui</a></i></p>
            <?php
        }
    ?>

</div>