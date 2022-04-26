<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "caja".
 *
 * @property int $id
 * @property string|null $fecha_apertura
 * @property float|null $monto_apertura
 * @property float|null $monto_cierre
 * @property string|null $fecha_cierre
 * @property int|null $estado
 */
class TblCaja extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caja';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_apertura', 'fecha_cierre'], 'safe'],
            [['monto_apertura', 'monto_cierre'], 'number'],
            [['estado'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fecha_apertura' => Yii::t('app', 'Fecha Apertura'),
            'monto_apertura' => Yii::t('app', 'Monto Apertura'),
            'monto_cierre' => Yii::t('app', 'Monto Cierre'),
            'fecha_cierre' => Yii::t('app', 'Fecha Cierre'),
            'estado' => Yii::t('app', 'Estado'),
        ];
    }
}
