<?php

namespace app\controllers;

use app\models\Cargos;
use app\models\CargosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CargosController implements the CRUD actions for Cargos model.
 */
class CargosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Cargos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CargosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cargos model.
     * @param int $idcargos Idcargos
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idcargos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idcargos),
        ]);
    }

    /**
     * Creates a new Cargos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cargos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idcargos' => $model->idcargos]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cargos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idcargos Idcargos
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idcargos)
    {
        $model = $this->findModel($idcargos);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idcargos' => $model->idcargos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cargos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idcargos Idcargos
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idcargos)
    {
        $this->findModel($idcargos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cargos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idcargos Idcargos
     * @return Cargos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idcargos)
    {
        if (($model = Cargos::findOne(['idcargos' => $idcargos])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
