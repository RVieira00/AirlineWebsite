<?php

namespace app\controllers;

use Yii;
use app\models\Lugarreserva;
use app\models\search\LugarreservaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LugarreservaController implements the CRUD actions for Lugarreserva model.
 */
class LugarreservaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Lugarreserva models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LugarreservaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lugarreserva model.
     * @param integer $ID
     * @param integer $Lugar_ID
     * @param integer $Lugar_Aviao_ID
     * @param integer $Reserva_ID
     * @param integer $Reserva_Utilizador_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID, $Lugar_ID, $Lugar_Aviao_ID, $Reserva_ID, $Reserva_Utilizador_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $Lugar_ID, $Lugar_Aviao_ID, $Reserva_ID, $Reserva_Utilizador_ID),
        ]);
    }

    /**
     * Creates a new Lugarreserva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lugarreserva();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'Lugar_ID' => $model->Lugar_ID, 'Lugar_Aviao_ID' => $model->Lugar_Aviao_ID, 'Reserva_ID' => $model->Reserva_ID, 'Reserva_Utilizador_ID' => $model->Reserva_Utilizador_ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lugarreserva model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $Lugar_ID
     * @param integer $Lugar_Aviao_ID
     * @param integer $Reserva_ID
     * @param integer $Reserva_Utilizador_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID, $Lugar_ID, $Lugar_Aviao_ID, $Reserva_ID, $Reserva_Utilizador_ID)
    {
        $model = $this->findModel($ID, $Lugar_ID, $Lugar_Aviao_ID, $Reserva_ID, $Reserva_Utilizador_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'Lugar_ID' => $model->Lugar_ID, 'Lugar_Aviao_ID' => $model->Lugar_Aviao_ID, 'Reserva_ID' => $model->Reserva_ID, 'Reserva_Utilizador_ID' => $model->Reserva_Utilizador_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lugarreserva model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $Lugar_ID
     * @param integer $Lugar_Aviao_ID
     * @param integer $Reserva_ID
     * @param integer $Reserva_Utilizador_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID, $Lugar_ID, $Lugar_Aviao_ID, $Reserva_ID, $Reserva_Utilizador_ID)
    {
        $this->findModel($ID, $Lugar_ID, $Lugar_Aviao_ID, $Reserva_ID, $Reserva_Utilizador_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lugarreserva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $Lugar_ID
     * @param integer $Lugar_Aviao_ID
     * @param integer $Reserva_ID
     * @param integer $Reserva_Utilizador_ID
     * @return Lugarreserva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $Lugar_ID, $Lugar_Aviao_ID, $Reserva_ID, $Reserva_Utilizador_ID)
    {
        if (($model = Lugarreserva::findOne(['ID' => $ID, 'Lugar_ID' => $Lugar_ID, 'Lugar_Aviao_ID' => $Lugar_Aviao_ID, 'Reserva_ID' => $Reserva_ID, 'Reserva_Utilizador_ID' => $Reserva_Utilizador_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
