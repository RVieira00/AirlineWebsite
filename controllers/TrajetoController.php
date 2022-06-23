<?php

namespace app\controllers;

use Yii;
use app\models\Trajeto;
use app\models\search\TrajetoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrajetoController implements the CRUD actions for Trajeto model.
 */
class TrajetoController extends Controller
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
     * Lists all Trajeto models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrajetoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trajeto model.
     * @param integer $ID
     * @param integer $Aviao_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ID, $Aviao_ID)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $Aviao_ID),
        ]);
    }

    /**
     * Creates a new Trajeto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trajeto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'Aviao_ID' => $model->Aviao_ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trajeto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $Aviao_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ID, $Aviao_ID)
    {
        $model = $this->findModel($ID, $Aviao_ID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'Aviao_ID' => $model->Aviao_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trajeto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $Aviao_ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ID, $Aviao_ID)
    {
        $this->findModel($ID, $Aviao_ID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trajeto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $Aviao_ID
     * @return Trajeto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $Aviao_ID)
    {
        if (($model = Trajeto::findOne(['ID' => $ID, 'Aviao_ID' => $Aviao_ID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
