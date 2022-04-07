<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblEmpresa;

/**
 * EmpresaSearch represents the model behind the search form of `app\models\TblEmpresa`.
 */
class EmpresaSearch extends TblEmpresa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre', 'eslogan', 'telefono', 'celular', 'direccion', 'correo', 'razonsocial', 'nrc', 'nit', 'logo'], 'safe'],
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
        $query = TblEmpresa::find();

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
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'eslogan', $this->eslogan])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'razonsocial', $this->razonsocial])
            ->andFilterWhere(['like', 'nrc', $this->nrc])
            ->andFilterWhere(['like', 'nit', $this->nit])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}
