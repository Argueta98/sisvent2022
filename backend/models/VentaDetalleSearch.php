<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblVentadetalle;

/**
 * VentaDetalleSearch represents the model behind the search form of `app\models\TblVentadetalle`.
 */
class VentaDetalleSearch extends TblVentadetalle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idProducto', 'idVenta'], 'integer'],
            [['cantidad', 'precioventa', 'iva', 'exento', 'descuento', 'retenido', 'sumas', 'total', 'cambio'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblVentadetalle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idProducto' => $this->idProducto,
            'idVenta' => $this->idVenta,
            'cantidad' => $this->cantidad,
            'precioventa' => $this->precioventa,
            'iva' => $this->iva,
            'exento' => $this->exento,
            'descuento' => $this->descuento,
            'retenido' => $this->retenido,
            'sumas' => $this->sumas,
            'total' => $this->total,
            'cambio' => $this->cambio,
        ]);

        return $dataProvider;
    }
}
