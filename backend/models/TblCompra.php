<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compra".
 *
 * @property int $id
 * @property int|null $idProveedor
 * @property string $serie
 * @property string $numero_compra
 * @property string $fecha_compra
 * @property string $fecha_creacion
 * @property int|null $idComprobante
 *
 * @property Compradetalle[] $compradetalles
 * @property Comprobante $idComprobante0
 * @property Proveedor $idProveedor0
 */
class TblCompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idProveedor', 'idComprobante'], 'integer'],
            [['serie', 'numero_compra', 'fecha_compra', 'fecha_creacion'], 'required'],
            [['fecha_compra', 'fecha_creacion'], 'safe'],
            [['serie', 'numero_compra'], 'string', 'max' => 50],
            [['idProveedor'], 'exist', 'skipOnError' => true, 'targetClass' => TblProveedor::className(), 'targetAttribute' => ['idProveedor' => 'id']],
            [['idComprobante'], 'exist', 'skipOnError' => true, 'targetClass' => TblComprobante::className(), 'targetAttribute' => ['idComprobante' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idProveedor' => Yii::t('app', 'Proveedor'),
            'serie' => Yii::t('app', 'Serie'),
            'numero_compra' => Yii::t('app', 'Numero Comprobante'),
            'fecha_compra' => Yii::t('app', 'Fecha Compra'),
            'fecha_creacion' => Yii::t('app', 'Fecha Creacion'),
            'idComprobante' => Yii::t('app', 'Tipo Comprobante'),
        ];
    }

    /**
     * Gets query for [[Compradetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompradetalles()
    {
        return $this->hasMany(Compradetalle::className(), ['idCompra' => 'id']);
    }

    /**
     * Gets query for [[IdComprobante0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdComprobante0()
    {
        return $this->hasOne(Comprobante::className(), ['id' => 'idComprobante']);
    }

    /**
     * Gets query for [[IdProveedor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProveedor0()
    {
        return $this->hasOne(Proveedor::className(), ['id' => 'idProveedor']);
    }
}
