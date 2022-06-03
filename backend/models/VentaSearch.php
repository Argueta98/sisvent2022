<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblVenta;

/**
 * VentaSearch represents the model behind the search form of `app\models\TblVenta`.
 */
class VentaSearch extends TblVenta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',  'idCliente', 'idEmpleado', 'idUsuario', 'estado'], 'integer'],
            [['num_venta', 'fecha'], 'safe'],
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
        $query = TblVenta::find();

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
            'idCliente' => $this->idCliente,
            'idEmpleado' => $this->idEmpleado,
            'fecha' => $this->fecha,
            'idUsuario' => $this->idUsuario,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'num_venta', $this->num_venta]);
            

        return $dataProvider;
    }
}
