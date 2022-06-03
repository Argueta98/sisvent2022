<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property int $id
 * @property int $codigo
 * @property string $nombres
 * @property string $apellidos
 * @property string $correo
 * @property string $direccion
 * @property int|null $idUser
 *
 * @property User $idUser0
 * @property Venta[] $ventas
 */
class TblEmpleado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nombres', 'apellidos', 'correo', 'direccion','codigo'], 'required'],
            [[ 'idUser'], 'integer'],
            [['nombres', 'apellidos', 'correo','codigo'], 'string', 'max' => 50],
            [['direccion'], 'string', 'max' => 200],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => TblUser::className(), 'targetAttribute' => ['idUser' => 'id']],
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
            'nombres' => Yii::t('app', 'Nombres'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'correo' => Yii::t('app', 'Correo'),
            'direccion' => Yii::t('app', 'Direccion'),
            'idUser' => Yii::t('app', 'Id User'),
        ];
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(TblUser::class, ['id' => 'idUser']);
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVenta()
    {
        return $this->hasMany(TblVenta::class, ['idEmpleado' => 'id']);
    }
}
