<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblCaja;

/**
 * CajaSearch represents the model behind the search form of `app\models\TblCaja`.
 */
class CajaSearch extends TblCaja
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'estado'], 'integer'],
            [['fecha_apertura', 'fecha_cierre'], 'safe'],
            [['monto_apertura', 'monto_cierre'], 'number'],
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
        $query = TblCaja::find();

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
            'fecha_apertura' => $this->fecha_apertura,
            'monto_apertura' => $this->monto_apertura,
            'monto_cierre' => $this->monto_cierre,
            'fecha_cierre' => $this->fecha_cierre,
            'estado' => $this->estado,
        ]);

        return $dataProvider;
    }
}
