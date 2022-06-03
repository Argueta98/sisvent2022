<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "venta".
 *
 * @property int $id
 * @property string|null $num_venta
 * @property int|null $tipo_pago
 * @property int|null $idCliente
 * @property int|null $idEmpleado
 * @property string $serie
 * @property string $fecha
 * @property int|null $idUsuario
 * @property int|null $estado
 *
 * @property Ventadetalle $id0
 * @property Cliente $idCliente0
 * @property Empleado $idEmpleado0
 * @property User $idUsuario0
 * @property Ventadetalle $ventadetalle
 */
class TblVenta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'venta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'idCliente', 'idEmpleado', 'idUsuario', 'estado'], 'integer'],
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
            [['num_venta'], 'string', 'max' => 50],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => TblCliente::className(), 'targetAttribute' => ['idCliente' => 'id']],
            [['idEmpleado'], 'exist', 'skipOnError' => true, 'targetClass' => TblEmpleado::className(), 'targetAttribute' => ['idEmpleado' => 'id']],
            [['idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => TblUser::className(), 'targetAttribute' => ['idUsuario' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => TblVentadetalle::className(), 'targetAttribute' => ['id' => 'idVenta']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'num_venta' => Yii::t('app', 'Venta #'),
            'idCliente' => Yii::t('app', 'Cliente'),
            'idEmpleado' => Yii::t('app', 'Empleado'),
            'fecha' => Yii::t('app', 'Fecha'),
            'idUsuario' => Yii::t('app', 'Id Usuario'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVentaDetalle()
    {
        return $this->hasOne(TblVentadetalle::class, ['idVenta' => 'id']);
    }

    /**
     * Gets query for [[IdCliente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(TblCliente::class, ['id' => 'idCliente']);
    }

    /**
     * Gets query for [[IdEmpleado0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(TblEmpleado::class, ['id' => 'idEmpleado']);
    }

    /**
     * Gets query for [[IdUsuario0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(TblUser::class, ['id' => 'idUsuario']);
    }

    /**
     * Gets query for [[Ventadetalle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVentadetalle1()
    {
        return $this->hasOne(TblVentadetalle::class, ['idVenta' => 'id']);
    }
}
