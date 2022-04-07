<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblCompra;

/**
 * CompraSearch represents the model behind the search form of `app\models\TblCompra`.
 */
class CompraSearch extends TblCompra
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idProveedor'], 'integer'],
            [['serie', 'numero_compra', 'fecha_compra', 'fecha_creacion'], 'safe'],
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
        $query = TblCompra::find();

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
            'idProveedor' => $this->idProveedor,
            'fecha_compra' => $this->fecha_compra,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'numero_compra', $this->numero_compra]);

        return $dataProvider;
    }
}
