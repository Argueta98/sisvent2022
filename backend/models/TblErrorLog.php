<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_error_log".
 *
 * @property int $id_error_log
 * @property string $controller
 * @property string $mensaje
 * @property int $us_id
 * @property string $fecha
 *
 * @property User $us
 */
class TblErrorLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_error_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['controller', 'mensaje', 'us_id', 'fecha'], 'required'],
            [['mensaje'], 'string'],
            [['us_id'], 'integer'],
            [['fecha'], 'safe'],
            [['controller'], 'string', 'max' => 50],
            [['us_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['us_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_error_log' => Yii::t('backend', 'Id Error Log'),
            'controller' => Yii::t('backend', 'Controller'),
            'mensaje' => Yii::t('backend', 'Mensaje'),
            'us_id' => Yii::t('backend', 'Us ID'),
            'fecha' => Yii::t('backend', 'Fecha'),
        ];
    }

    /**
     * Gets query for [[Us]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUs()
    {
        return $this->hasOne(User::className(), ['id' => 'us_id']);
    }
}
