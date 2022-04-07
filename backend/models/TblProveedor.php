<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property int $id
 * @property string $codigo
 * @property string $nit
 * @property string $nombre
 * @property string $direccion
 * @property string $razonsocial
 * @property string $telefono
 * @property string $correo
 *
 * @property Compra[] $compras
 */
class TblProveedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nit', 'nombre', 'direccion', 'razonsocial', 'telefono', 'correo'], 'required'],
            [['codigo'], 'string', 'max' => 25],
            [['nit'], 'string', 'max' => 17],
            [['nombre'], 'string', 'max' => 200],
            [['direccion', 'correo'], 'string', 'max' => 100],
            [['razonsocial'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'codigo' => Yii::t('app', 'Codigo'),
            'nit' => Yii::t('app', 'Nit'),
            'nombre' => Yii::t('app', 'Nombre'),
            'direccion' => Yii::t('app', 'Direccion'),
            'razonsocial' => Yii::t('app', 'Razonsocial'),
            'telefono' => Yii::t('app', 'Telefono'),
            'correo' => Yii::t('app', 'Correo'),
        ];
    }

    /**
     * Gets query for [[Compras]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompras()
    {
        return $this->hasMany(Compra::className(), ['idProveedor' => 'id']);
    }
}
