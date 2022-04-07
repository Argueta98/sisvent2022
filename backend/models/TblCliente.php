<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $direccion
 * @property string $telefono
 * @property string $correo
 *
 * @property Venta[] $ventas
 */
class TblCliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'direccion', 'telefono', 'correo'], 'required'],
            [['nombre', 'apellido', 'correo'], 'string', 'max' => 100],
            [['direccion'], 'string', 'max' => 200],
            [['telefono'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'correo' => Yii::t('app', 'Correo'),
        ];
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Venta::className(), ['idCliente' => 'id']);
    }
}
