<?php

namespace backend\controllers;

use app\models\TblPerecedero;
use app\models\PerecederoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerecederoController implements the CRUD actions for TblPerecedero model.
 */
class PerecederoController extends Controller
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
     * Lists all TblPerecedero models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PerecederoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblPerecedero model.
     * @param int $idproducto Idproducto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idproducto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idproducto),
        ]);
    }

    /**
     * Creates a new TblPerecedero model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblPerecedero();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idproducto' => $model->idproducto]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblPerecedero model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idproducto Idproducto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idproducto)
    {
        $model = $this->findModel($idproducto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idproducto' => $model->idproducto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblPerecedero model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idproducto Idproducto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idproducto)
    {
        $this->findModel($idproducto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblPerecedero model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idproducto Idproducto
     * @return TblPerecedero the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idproducto)
    {
        if (($model = TblPerecedero::findOne(['idproducto' => $idproducto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
