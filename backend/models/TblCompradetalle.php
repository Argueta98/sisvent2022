<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compradetalle".
 *
 * @property int $id
 * @property int|null $idCompra
 * @property int|null $idProducto
 * @property float $cantidad
 * @property float|null $precio_unitario
 *
 * @property Compra $idCompra0
 * @property Producto $idProducto0
 */
class TblCompradetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compradetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCompra', 'idProducto'], 'integer'],
            [['cantidad'], 'required'],
            [['cantidad','precio_unitario'], 'number'],
            [['idCompra'], 'exist', 'skipOnError' => true, 'targetClass' => TblCompra::className(), 'targetAttribute' => ['idCompra' => 'id']],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => TblProducto::className(), 'targetAttribute' => ['idProducto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idCompra' => Yii::t('app', 'N° Comprobante'),
            'idProducto' => Yii::t('app', 'Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precio_unitario' => Yii::t('app', 'Costo'),
            
        ];
    }

    /**
     * Gets query for [[IdCompra0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompra()
    {
        return $this->hasOne(TblCompra::class, ['id' => 'idCompra']);
    }

    /**
     * Gets query for [[IdProducto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(TblProducto::class, ['id' => 'idProducto']);
    }

  /*  public static function getMulti()
    {
        foreach ($results as $result){
            $total = $result->cantidad * $result->precio_unitario;
        }
        return $total;
    }*/
}
