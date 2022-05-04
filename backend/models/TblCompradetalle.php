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
            [['cantidad', 'precio_unitario'], 'number'],
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
            'idCompra' => Yii::t('app', ' N° Compra'),
            'idProducto' => Yii::t('app', 'Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precio_unitario' => Yii::t('app', 'Precio Unitario'),
        ];
    }

    /**
     * Gets query for [[IdCompra0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCompra0()
    {
        return $this->hasOne(Compra::className(), ['id' => 'idCompra']);
    }

    /**
     * Gets query for [[IdProducto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto0()
    {
        return $this->hasOne(Producto::className(), ['id' => 'idProducto']);
    }

}
