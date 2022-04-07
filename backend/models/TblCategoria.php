<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property string $fecha_actualizar
 *
 * @property Producto[] $productos
 */
class TblCategoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'fecha_creacion', 'fecha_actualizar'], 'required'],
            [['fecha_creacion', 'fecha_actualizar'], 'safe'],
            [['nombre'], 'string', 'max' => 50],
            [['descripcion'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [ //label de tablas 
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripción'),
            'fecha_creacion' => Yii::t('app', 'Fecha Creación'),
            'fecha_actualizar' => Yii::t('app', 'Fecha Actualizar'),
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(TblCategoria::class, ['idCategoria' => 'id']);
    }
}
