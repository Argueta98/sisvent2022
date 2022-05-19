<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TblProducto;

/**
 * ProductoSearch represents the model behind the search form of `app\models\TblProducto`.
 */
class ProductoSearch extends TblProducto
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idCategoria', 'idPresentacion'], 'integer'],
            [['codigo', 'nombre','precio_compra' ,'precio_venta','stock_min', 'fecha_creacion'], 'safe'],
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
        $query = TblProducto::find();

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
            'idCategoria' => $this->idCategoria,
            'idPresentacion' => $this->idPresentacion,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'precio_compra', $this->precio_compra])
            ->andFilterWhere(['like', 'precio_venta', $this->precio_venta])
            ->andFilterWhere(['like', 'stock_min', $this->stock_min]);
          

        return $dataProvider;
    }
}
