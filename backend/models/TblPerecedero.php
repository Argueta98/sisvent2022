<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perecedero".
 *
 * @property string $fecha_vencimiento
 * @property float $cantidad_percedero
 * @property int $idproducto
 * @property int $estado
 *
 * @property Producto $idproducto0
 */
class TblPerecedero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perecedero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_vencimiento', 'cantidad_percedero', 'idproducto'], 'required'],
            [['fecha_vencimiento'], 'safe'],
            [['cantidad_percedero'], 'number'],
            [['idproducto', 'estado'], 'integer'],
            [['idproducto'], 'unique'],
            [['idproducto'], 'exist', 'skipOnError' => true, 'targetClass' => TblProducto::className(), 'targetAttribute' => ['idproducto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fecha_vencimiento' => Yii::t('app', 'Fecha Vencimiento'),
            'cantidad_percedero' => Yii::t('app', 'Cantidad Percedero'),
            'idproducto' => Yii::t('app', 'Idproducto'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }

    /**
     * Gets query for [[Idproducto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdproducto0()
    {
        return $this->hasOne(Producto::className(), ['id' => 'idproducto']);
    }
}
