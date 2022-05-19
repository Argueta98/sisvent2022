<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property int $id
 * @property int $idCompra
 * @property string $numero_entrada
 * @property int|null $idProducto
 * @property float $existencias
 * @property float $cant_original
 * @property string|null $fechacreacion
 *
 * @property Compra $idCompra0
 * @property Producto $idProducto0
 */
class TblInventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCompra', 'numero_entrada', 'existencias', 'cant_original'], 'required'],
            [['idCompra', 'idProducto','existencias', 'cant_original'], 'integer'],
            [['fechacreacion'], 'safe'],
            [['numero_entrada'], 'string', 'max' => 255],
            [['idProducto'], 'exist', 'skipOnError' => true, 'targetClass' => TblProducto::className(), 'targetAttribute' => ['idProducto' => 'id']],
            [['idCompra'], 'exist', 'skipOnError' => true, 'targetClass' => TblCompra::className(), 'targetAttribute' => ['idCompra' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idCompra' => Yii::t('app', 'Numero Comprobante'),
            'numero_entrada' => Yii::t('app', 'Numero Entrada'),
            'idProducto' => Yii::t('app', 'Producto'),
            'existencias' => Yii::t('app', 'Existencias'),
            'cant_original' => Yii::t('app', 'Cantidad Original'),
            'fechacreacion' => Yii::t('app', 'Fechacreacion'),
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
}
