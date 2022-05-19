<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblInventario;

/**
 * InventarioSearch represents the model behind the search form of `app\models\TblInventario`.
 */
class InventarioSearch extends TblInventario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idCompra', 'idProducto', 'existencias', 'cant_original'], 'integer'],
            [['numero_entrada', 'fechacreacion'], 'safe'],
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
        $query = TblInventario::find();

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
            'idCompra' => $this->idCompra,
            'idProducto' => $this->idProducto,
            'existencias' => $this->existencias,
            'cant_original' => $this->cant_original,
            'fechacreacion' => $this->fechacreacion,
        ]);

        $query->andFilterWhere(['like', 'numero_entrada', $this->numero_entrada]);

        return $dataProvider;
    }
}
