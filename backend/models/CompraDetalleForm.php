<?php

namespace app\models;
use app\models\TblCompra;
use app\models\TblCompradetalle;
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;



class CompraDetalleForm extends Model
{
    private $_compra; //Atributo donde se guardará la compra
    private $_compradetalle; //Atributo donde se guardará la compra detalle

    public function rules()
    {
        return [
            [['Compra'], 'required'], //Verificar si son los nombres de los modales principales
            [['CompraDetalle'], 'safe'],
        ];
    }


    public function save()
    {
      //Validar venta
       if(!$this->compra->validate()) {
            return false;
        }
        //Iniciar transacción
        $transaction = Yii::$app->db->beginTransaction();
        //Guardar venta
        if (!$this->compra->save()) {
            $transaction->rollBack();
            return false;
        }
        //Guardar lista de productos
        if (!$this->saveDetalle()) {
            $transaction->rollBack();
            return false;
        }
        //Finalizar transacción
        $transaction->commit();
        return true;
    }

    public function saveDetalle()
    {
        //Arreglo con los productos que ya estan en la db y deben mantenerse
        //Al actualizar la venta actualiza los productos que han sido modificado y elimina aquellos que han sido removidos
        $mantener = [];
        //Recorrer los productos
        foreach ($this->compradetalle as $compradetalle) {
            //Asignar el id de venta
            $compradetalle->idCompra = $this->compra->id;
            //Guardar producto
            if (!$compradetalle->save()) {
              return false;
            }
            //Agregar id del producto a lista
            $mantener[] = $compradetalle->id;
        }
        //Buscar todos los productos asociados a la venta
        $query = TblCompraDetalle::find()->andWhere(['idCompra' => $this->compra->id]);
        if ($mantener) {
            //Filtrar por los productos que no estan en la lista de mantener
            $query->andWhere(['not in', 'id', $mantener]);
        }
        //Eliminar los productos que no estan en la lista
        foreach ($query->all() as $compradetalle) {
            $compradetalle->delete();
        }
        return true;
    }

    public function delete()
    {
        //Iniciar transacción
        $transaction = Yii::$app->db->beginTransaction();
        //Eliminar productos
        if (!$this->deleteDetalle()) {
            $transaction->rollBack();
            return false;
        }
        //Eliminar venta
        if (!$this->compra->delete()) {
            $transaction->rollBack();
            return false;
        }
        //Finalizar transacción
        $transaction->commit();
        return true;
    }

    public function deleteDetalle()
    {
        //Recoorrer los productos
        foreach ($this->compradetalle as $compradetalle) {
          //Eliminar producto
           if (!$compradetalle->delete()) {
                return false;
            }
        }
        return true;
    }

    public function getCompra()
    {
        return $this->_compra;
    }

    public function setCompra($compra)
    {
        if ($compra instanceof TblCompra) {
            $this->_compra = $compra;
        } else if (is_array($compra)) {
            $this->_compra->setAttributes($compra);
        }
    }

    public function getCompraDetalles()
    {
        if ($this->_compradetalle=== null) {
            $this->_compradetalle = $this->compra->isNewRecord ? [] : $this->compra->compradetalle;
        }
        return $this->_compradetalle;
    }

    private function getCompraDetalle($key)
    {
        $compradetalle = $key && strpos($key, 'nuevo') === false ? TblCompradetalle::findOne($key) : false;
        if (!$compradetalle) {
            $compradetalle = new TblCompradetalle();
            $compradetalle->loadDefaultValues();
        }
        return $producto;
    }

    public function setCompraDetalles($compradetalle)
    {
        unset($compradetalle['__id__']); // Elimina el producto vacío usado para crear formularios
        $this->_compradetalle = [];
        //Recorrer productos
        foreach ($compradetalle as $key => $compradetalle) {
          //Obtiene producto por clave y lo agrega al atributo productos
            if (is_array($compradetalle)) {
                $this->_compradetalle[$key] = $this->getCompraDetalle($key);
                $this->_compradetalle[$key]->setAttributes($compradetalle );
            } elseif ($compradetalle  instanceof TblCompradetalle) {
                $this->_compradetalle[$compradetalle ->id] = $compradetalle ;
            }
        }
    }

}








