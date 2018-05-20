<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Plan;

/**
 * PlanSearch represents the model behind the search form about `app\models\Plan`.
 */
class PlanSearch extends Plan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'is_active', 'duration', 'points_per_week', 'points_per_month', 'lunch_per_week', 'lunch_per_month', 'snack_per_week', 'snack_per_month'], 'integer'],
            [['uuid', 'created_at', 'updated_at', 'price_per_week', 'price_per_month'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Plan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'is_active' => $this->is_active,
            'duration' => $this->duration,
            'points_per_week' => $this->points_per_week,
            'points_per_month' => $this->points_per_month,
            'lunch_per_week' => $this->lunch_per_week,
            'lunch_per_month' => $this->lunch_per_month,
            'snack_per_week' => $this->snack_per_week,
            'snack_per_month' => $this->snack_per_month,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'price_per_week', $this->price_per_week])
            ->andFilterWhere(['like', 'price_per_month', $this->price_per_month]);

        return $dataProvider;
    }
}
