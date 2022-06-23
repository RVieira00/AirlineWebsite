<?php

namespace app\controllers;

use Yii;
use app\models\Trajetoreserva;
use app\models\search\TrajetoreservaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrajetoreservaController implements the CRUD actions for Trajetoreserva model.
 */
class TrajetoreservaController extends Controller
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
     * Lists all Trajetoreserva models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrajetoreservaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trajetoreserva model.
     * @param integer $ID
     * @param integer $Reserva_ID
     * @param integer $Trajeto_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID, $Reserva_ID, $Trajeto_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $Reserva_ID, $Trajeto_ID),
        ]);
    }

    /**
     * Creates a new Trajetoreserva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trajetoreserva();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'Reserva_ID' => $model->Reserva_ID, 'Trajeto_ID' => $model->Trajeto_ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trajetoreserva model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $Reserva_ID
     * @param integer $Trajeto_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID, $Reserva_ID, $Trajeto_ID)
    {
        $model = $this->findModel($ID, $Reserva_ID, $Trajeto_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'Reserva_ID' => $model->Reserva_ID, 'Trajeto_ID' => $model->Trajeto_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trajetoreserva model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $Reserva_ID
     * @param integer $Trajeto_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID, $Reserva_ID, $Trajeto_ID)
    {
        $this->findModel($ID, $Reserva_ID, $Trajeto_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trajetoreserva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $Reserva_ID
     * @param integer $Trajeto_ID
     * @return Trajetoreserva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $Reserva_ID, $Trajeto_ID)
    {
        if (($model = Trajetoreserva::findOne(['ID' => $ID, 'Reserva_ID' => $Reserva_ID, 'Trajeto_ID' => $Trajeto_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
