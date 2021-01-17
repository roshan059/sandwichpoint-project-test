<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Orders;

/**
 * OrderSerach represents the model behind the search form of `common\models\Orders`.
 */
class OrderSerach extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'meal_id', 'bread_id', 'sandwich_taste_id', 'vegetable_id', 'sauce_id'], 'integer'],
            [['bread_size', 'is_baked', 'extra', 'status', 'location', 'order_at'], 'safe'],
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
        $query = Orders::find();

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
            'user_id' => $this->user_id,
            'meal_id' => $this->meal_id,
            'bread_id' => $this->bread_id,
            'sandwich_taste_id' => $this->sandwich_taste_id,
            'vegetable_id' => $this->vegetable_id,
            'sauce_id' => $this->sauce_id,
            'order_at' => $this->order_at,
        ]);

        $query->andFilterWhere(['like', 'bread_size', $this->bread_size])
            ->andFilterWhere(['like', 'is_baked', $this->is_baked])
            ->andFilterWhere(['like', 'extra', $this->extra])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'location', $this->location]);

        return $dataProvider;
    }
}
