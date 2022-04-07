<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblPerecedero;

/**
 * PerecederoSearch represents the model behind the search form of `app\models\TblPerecedero`.
 */
class PerecederoSearch extends TblPerecedero
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha_vencimiento'], 'safe'],
            [['cantidad_percedero'], 'number'],
            [['idproducto', 'estado'], 'integer'],
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
        $query = TblPerecedero::find();

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
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'cantidad_percedero' => $this->cantidad_percedero,
            'idproducto' => $this->idproducto,
            'estado' => $this->estado,
        ]);

        return $dataProvider;
    }
}
