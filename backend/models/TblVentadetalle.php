<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventadetalle".
 *
 * @property int $id
 * @property int|null $idProducto
 * @property int|null $idVenta
 * @property float $cantidad
 * @property float $precioventa
 * @property float|null $iva
 * @property float|null $exento
 * @property float|null $descuento
 * @property float|null $retenido
 * @property float|null $sumas
 * @property float $total
 * @property float|null $cambio
 *
 * @property Producto $idProducto0
 * @property Venta $idVenta0
 * @property Venta $venta
 */
class TblVentadetalle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventadetalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProducto', 'idVenta'], 'integer'],
            [['cantidad', 'precioventa', 'total'], 'required'],
            [['cantidad', 'precioventa', 'iva', 'exento', 'descuento', 'retenido', 'sumas', 'total', 'cambio'], 'number'],
            [['idVenta'], 'unique'],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => TblProducto::className(), 'targetAttribute' => ['idProducto' => 'id']],
            [['idVenta'], 'exist', 'skipOnError' => true, 'targetClass' => TblVenta::className(), 'targetAttribute' => ['idVenta' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idProducto' => Yii::t('app', 'Id Producto'),
            'idVenta' => Yii::t('app', 'Id Venta'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precioventa' => Yii::t('app', 'Precioventa'),
            'iva' => Yii::t('app', 'Iva'),
            'exento' => Yii::t('app', 'Exento'),
            'descuento' => Yii::t('app', 'Descuento'),
            'retenido' => Yii::t('app', 'Retenido'),
            'sumas' => Yii::t('app', 'Sumas'),
            'total' => Yii::t('app', 'Total'),
            'cambio' => Yii::t('app', 'Cambio'),
        ];
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

    /**
     * Gets query for [[IdVenta0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasOne(TblVenta::class, ['id' => 'idVenta']);
    }

    /**
     * Gets query for [[Venta]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenta1()
    {
        return $this->hasOne(TblVenta::class, ['id' => 'idVenta']);
    }
}
