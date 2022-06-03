<?php

namespace backend\controllers;

use app\models\TblCompra;
use app\models\TblInventario;
use app\models\TblCompradetalle;
use app\models\CompraDetalleSearch;
use app\models\CompraSearch;
use app\models\TblComprobante;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraController implements the CRUD actions for TblCompra model.
 */
class CompraController extends Controller
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
     * Lists all TblCompra models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblCompra model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new CompraDetalleSearch();
        $searchModel->idCompra = $id;
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new TblCompra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblCompra();

        if ($model->load($this->request->post())) {
           // $model->fecha_compra = date('Y-m-d H:i:s');
            $model->fecha_creacion = date('Y-m-d H:i:s');
            $model->numero_compra = $this->CreateCode1();
           // $model->id_user = 1;
            
            if (!$model->save()){
               print_r($model->getErrors());
               die(); 
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    function CreateCode1()
    {
        $compra = TblCompra::find()->orderBy(['id' => SORT_DESC])->one();
        if (empty($compra->numero_compra)) $codigo = 0;
        else $codigo = $compra->numero_compra;

        $int = intval(preg_replace('/[^0-9]+/', '', $codigo), 10);
        $id = $int + 1;

        $numero = $id;
        $tmp = "";
        if ($id < 10) {
            $tmp .= "000";
            $tmp .= $id;
        } elseif ($id >= 10 && $id < 100) {
            $tmp .= "00";
            $tmp .= $id;
        } elseif ($id >= 100 && $id < 1000) {
            $tmp .= "0";
            $tmp .= $id;
        } else {
            $tmp .= $id;
        }
        $result = str_replace($id, $tmp, $numero);
        return "CB-" . $result;
    }


    public function actionInventario($idCompra)
    {
        $detCompra = TblCompradetalle::find()->where('idCompra = '. $idCompra)->all();
        try{
            foreach ($detCompra as $det){

                $modelInventario = new TblInventario();
    
                $modelInventario->idCompra = $idCompra;
                $modelInventario->idProducto = $det->idProducto;
                $modelInventario->existencias = $det->cantidad;
                $modelInventario->cant_original = $det->cantidad;
                $modelInventario->numero_entrada = $this->CreateCode();
                $modelInventario->fechacreacion = date('Y-m-d H:i:s');
                $modelInventario->save();

        }
    
        } catch( Exception $e)
        {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }

         return $this->redirect(['view', 'id' => $idCompra]);
    }

    function CreateCode()
    {
        $inventario = TblInventario::find()->orderBy(['id' => SORT_DESC])->one();
        if (empty($inventario->numero_entrada)) $codigo = 0;
        else $codigo = $inventario->numero_entrada;

        $int = intval(preg_replace('/[^0-9]+/', '', $codigo), 10);
        $id = $int + 1;

        $numero = $id;
        $tmp = "";
        if ($id < 10) {
            $tmp .= "000";
            $tmp .= $id;
        } elseif ($id >= 10 && $id < 100) {
            $tmp .= "00";
            $tmp .= $id;
        } elseif ($id >= 100 && $id < 1000) {
            $tmp .= "0";
            $tmp .= $id;
        } else {
            $tmp .= $id;
        }
        $result = str_replace($id, $tmp, $numero);
        return "INV-" . $result;
    }


       /*echo '<pre>';
        echo print_r($detCompra);
        echo '</pre>';
        die();*/
    /**
     * Updates an existing TblCompra model.
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
     * Deletes an existing TblCompra model.
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
     * Finds the TblCompra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TblCompra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblCompra::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
