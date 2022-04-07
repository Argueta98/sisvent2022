<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property string $nombre
 * @property string $eslogan
 * @property string $telefono
 * @property string $celular
 * @property string $direccion
 * @property string $correo
 * @property string $razonsocial
 * @property string $nrc
 * @property string $nit
 * @property string $logo
 */
class TblEmpresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'eslogan', 'telefono', 'celular', 'direccion', 'correo', 'razonsocial', 'nrc', 'nit', 'logo'], 'required'],
            [['nombre', 'razonsocial'], 'string', 'max' => 100],
            [['eslogan', 'direccion', 'correo', 'logo'], 'string', 'max' => 200],
            [['telefono', 'celular'], 'string', 'max' => 13],
            [['nrc', 'nit'], 'string', 'max' => 25],
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
            'eslogan' => Yii::t('app', 'Eslogan'),
            'telefono' => Yii::t('app', 'Telefono'),
            'celular' => Yii::t('app', 'Celular'),
            'direccion' => Yii::t('app', 'Direccion'),
            'correo' => Yii::t('app', 'Correo'),
            'razonsocial' => Yii::t('app', 'Razonsocial'),
            'nrc' => Yii::t('app', 'Nrc'),
            'nit' => Yii::t('app', 'Nit'),
            'logo' => Yii::t('app', 'Logo'),
        ];
    }
}
