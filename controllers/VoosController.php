<?php


namespace app\controllers;

use app\models\Lugar;
use app\models\LugarReserva;
use app\models\Reserva;
use app\models\search\AviaoSearch;
use app\models\search\LugarSearch;
use app\models\search\TrajetoSearch;
use app\models\TrajetoReserva;
use Yii;
use app\models\search\VoosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Request;

class VoosController extends Controller
{
    public function actionIndex()
    {

        $searchModel = new VoosSearch();
        $dataProvider = $searchModel->getFlightInfoAsArray(Yii::$app->request->get('destino'),
                                                                Yii::$app->request->get('origem'),
                                                                    Yii::$app->request->get('data'));
        //var_dump($dataProvider);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDetalhestrajeto(){
        $searchModel = new VoosSearch();
        $dataProvider = $searchModel->getFlightInfoByID(Yii::$app->request->get('trajetoID'));

        $Lugares_searchModel= new LugarSearch();
        $dataProvider_lugaresEco = $Lugares_searchModel->findPlaneEcoSeats(Yii::$app->request->get('AviaoID'));

        $dataProvider_lugaresExec = $Lugares_searchModel->findPlaneExecSeats(Yii::$app->request->get('AviaoID'));

        return $this->render('detalhestrajeto', [
            'vooSearch' =>$searchModel,
            'dataProvider' => $dataProvider,
            'lugarSearch2' =>$Lugares_searchModel,
            'dataProviderLugarEco' => $dataProvider_lugaresEco,
            'dataProviderLugarExec' => $dataProvider_lugaresExec
        ]);
    }

    public function actionEscolherlugar(){
        $searchModel = new LugarSearch();
        $dataProvider = $searchModel->findPlaneSeats(Yii::$app->request->get('AviaoID'));

        return $this->render('escolherlugar', [
            'lugarSearch' =>$searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPagamento($trajetoID, $lugarID){
        return $this->render("index");
    }

    public function actionEfetuarreserva(){

        $seatID = Yii::$app->request->post('seatID');
        $trajetoID = Yii::$app->request->post('trajetoID');
        $aviaoID = Yii::$app->request->post('aviaoID');

        //criar reserva para o user
        $reserva= new Reserva();
        $reserva->Utilizador_ID = Yii::$app->user->id;
        if(!$reserva->save()){
            return 0;
            exit();
        }else{
            //get last inserted id
            $reservaID = $reserva->ID;
        }

        //trajeto_resersa
        $trajeto_reserva= new TrajetoReserva();
        $trajeto_reserva->Trajeto_ID = $trajetoID;
        $trajeto_reserva->Reserva_ID = $reservaID;

        if(!$trajeto_reserva->save()){
            return 0;
            exit();
        }

       //lugar_reserva
        $lugar_reserva = new LugarReserva();
        $lugar_reserva->Reserva_Utilizador_ID = Yii::$app->user->id;
        $lugar_reserva->Reserva_ID = $reservaID;
        $lugar_reserva->Lugar_Aviao_ID = $aviaoID;
        $lugar_reserva->Lugar_ID = $seatID;

        if(!$lugar_reserva->save()){
            return 0;
            exit();
        }

        return $reservaID;
    }
}