<?php

namespace backend\controllers;
use yii\helpers\Url;
use app\models\TblVentadetalle;
use app\models\VentaDetalleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VentaDetalleController implements the CRUD actions for TblVentadetalle model.
 */
class VentaDetalleController extends Controller
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
     * Lists all TblVentadetalle models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VentaDetalleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblVentadetalle model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblVentadetalle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $model = new TblVentadetalle();

        if ($model->load($this->request->post())) {

            $model->idVenta = $id;
            $model->precioventa = $model->producto->precio_venta;
            $model->exento = $model->producto->precio_venta * $model->cantidad;
            $model->sumas = $model->exento + $model->descuento;
           //  echo $id;
           //  die();
            
            if (!$model->save()){
               print_r($model->getErrors());
               die(); 
            }
           // return $this->redirect('index.php?r=venta%2Fview&id='.$model->venta->$id);
          // return $this->redirect('index.php?r=VentaController/view&id='.$model->venta->$id);
          // return $this->redirect(['venta/view', 'id' => $model->$id]);
            //return $this->redirect(['index']);
            $url = Url::to(['venta/view', 'id' => $id]);
            return $this->redirect($url);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }

   /*     if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);*/
    }

    /**
     * Updates an existing TblVentadetalle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblVentadetalle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblVentadetalle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TblVentadetalle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblVentadetalle::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
