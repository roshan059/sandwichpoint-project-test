<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MealOpeningDays;

/**
 * MealOpeningDaySearch represents the model behind the search form of `common\models\MealOpeningDays`.
 */
class MealOpeningDaySearch extends MealOpeningDays
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'meal_id'], 'integer'],
            [['day_name', 'start_time', 'end_time', 'created_at'], 'safe'],
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
        $query = MealOpeningDays::find();

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
            'meal_id' => $this->meal_id,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'day_name', $this->day_name]);

        return $dataProvider;
    }
}
