<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property string $descripcion
 * @property int|null $idCategoria
 * @property float $existencias
 * @property int|null $idPresentacion
 * @property string $fecha_creacion
 *
 * @property Compradetalle[] $compradetalles
 * @property Categoria $idCategoria0
 * @property Presentacion $idPresentacion0
 * @property Inventario[] $inventarios
 * @property Perecedero $perecedero
 * @property Precio[] $precios
 * @property Ventadetalle[] $ventadetalles
 */
class TblProducto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'descripcion', 'existencias', 'fecha_creacion'], 'required'],
            [['idCategoria', 'idPresentacion'], 'integer'],
            [['existencias'], 'number'],
            [['fecha_creacion'], 'safe'],
            [['codigo'], 'string', 'max' => 50],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 200],
            [['idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => TblCategoria::class, 'targetAttribute' => ['idCategoria' => 'id']],
            [['idPresentacion'], 'exist', 'skipOnError' => true, 'targetClass' => TblPresentacion::class, 'targetAttribute' => ['idPresentacion' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'codigo' => Yii::t('app', 'Codigo/Barra'),
            'nombre' => Yii::t('app', 'Producto'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'idCategoria' => Yii::t('app', 'Categoria'),
            'existencias' => Yii::t('app', 'Existencias'),
            'idPresentacion' => Yii::t('app', 'Presentacion'),
           'fecha_creacion' => Yii::t('app', 'Fecha Creacion'),
        ];
    }

    /**
     * Gets query for [[Compradetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompradetalles()
    {
        return $this->hasMany(Compradetalle::className(), ['idProducto' => 'id']);
    }

    /**
     * Gets query for [[IdCategoria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria()
    {
        return $this->hasOne(Categoria::className(), ['idCategoria' => 'id']);
    }

    /**
     * Gets query for [[IdPresentacion0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPresentacion0()
    {
        return $this->hasOne(Presentacion::className(), ['id' => 'idPresentacion']);
    }

    /**
     * Gets query for [[Inventarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventarios()
    {
        return $this->hasMany(Inventario::className(), ['idProducto' => 'id']);
    }

    /**
     * Gets query for [[Perecedero]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerecedero()
    {
        return $this->hasOne(Perecedero::className(), ['idproducto' => 'id']);
    }

    /**
     * Gets query for [[Precios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrecios()
    {
        return $this->hasMany(Precio::className(), ['idProducto' => 'id']);
    }

    /**
     * Gets query for [[Ventadetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVentadetalles()
    {
        return $this->hasMany(Ventadetalle::className(), ['idProducto' => 'id']);
    }
}
