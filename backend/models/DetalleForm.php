<?php
namespace app\models;
use app\models\Venta;
use app\models\Producto;
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;

class VentaForm extends Model
{
    private $_venta; //Atributo donde se guardará la venta
    private $_productos; //Atributo donde se guardará la lista de productos

    public function rules()
    {
        return [
            [['Venta'], 'required'],
            [['Productos'], 'safe'],
        ];
    }


    public function save()
    {
      //Validar venta
       if(!$this->venta->validate()) {
            return false;
        }
        //Iniciar transacción
        $transaction = Yii::$app->db->beginTransaction();
        //Guardar venta
        if (!$this->venta->save()) {
            $transaction->rollBack();
            return false;
        }
        //Guardar lista de productos
        if (!$this->saveProductos()) {
            $transaction->rollBack();
            return false;
        }
        //Finalizar transacción
        $transaction->commit();
        return true;
    }

    public function saveProductos()
    {
        //Arreglo con los productos que ya estan en la db y deben mantenerse
        //Al actualizar la venta actualiza los productos que han sido modificado y elimina aquellos que han sido removidos
        $mantener = [];
        //Recorrer los productos
        foreach ($this->productos as $producto) {
            //Asignar el id de venta
            $producto->ventaId = $this->venta->ventaId;
            //Guardar producto
            if (!$producto->save()) {
              return false;
            }
            //Agregar id del producto a lista
            $mantener[] = $producto->productoId;
        }
        //Buscar todos los productos asociados a la venta
        $query = Producto::find()->andWhere(['ventaId' => $this->venta->ventaId]);
        if ($mantener) {
            //Filtrar por los productos que no estan en la lista de mantener
            $query->andWhere(['not in', 'productoId', $mantener]);
        }
        //Eliminar los productos que no estan en la lista
        foreach ($query->all() as $producto) {
            $producto->delete();
        }
        return true;
    }

    public function delete()
    {
        //Iniciar transacción
        $transaction = Yii::$app->db->beginTransaction();
        //Eliminar productos
        if (!$this->deleteProductos()) {
            $transaction->rollBack();
            return false;
        }
        //Eliminar venta
        if (!$this->venta->delete()) {
            $transaction->rollBack();
            return false;
        }
        //Finalizar transacción
        $transaction->commit();
        return true;
    }

    public function deleteProductos()
    {
        //Recoorrer los productos
        foreach ($this->productos as $producto) {
          //Eliminar producto
           if (!$producto->delete()) {
                return false;
            }
        }
        return true;
    }

    public function getVenta()
    {
        return $this->_venta;
    }

    public function setVenta($venta)
    {
        if ($venta instanceof Venta) {
            $this->_venta = $venta;
        } else if (is_array($venta)) {
            $this->_venta->setAttributes($venta);
        }
    }

    public function getProductos()
    {
        if ($this->_productos=== null) {
            $this->_productos = $this->venta->isNewRecord ? [] : $this->venta->productos;
        }
        return $this->_productos;
    }

    private function getProducto($key)
    {
        $producto = $key && strpos($key, 'nuevo') === false ? Producto::findOne($key) : false;
        if (!$producto) {
            $producto = new Producto();
            $producto->loadDefaultValues();
        }
        return $producto;
    }

    public function setProductos($productos)
    {
        unset($productos['__id__']); // Elimina el producto vacío usado para crear formularios
        $this->_productos = [];
        //Recorrer productos
        foreach ($productos as $key => $producto) {
          //Obtiene producto por clave y lo agrega al atributo productos
            if (is_array($producto)) {
                $this->_productos[$key] = $this->getProducto($key);
                $this->_productos[$key]->setAttributes($producto);
            } elseif ($productos instanceof Producto) {
                $this->_productos[$producto->id] = $producto;
            }
        }
    }

}