<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Subscription;

/**
 * SubscriptionSearch represents the model behind the search form about `app\models\Subscription`.
 */
class SubscriptionSearch extends Subscription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'plan_id', 'user_id', 'lunches_delivered', 'snacks_delivered', 'created_by', 'updated_by', 'subscription_state_id', 'is_active'], 'integer'],
            [['uuid', 'created_at', 'updated_at', 'starts_at', 'ends_at'], 'safe'],
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
        $query = Subscription::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'plan_id' => $this->plan_id,
            'user_id' => $this->user_id,
            'lunches_delivered' => $this->lunches_delivered,
            'snacks_delivered' => $this->snacks_delivered,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'subscription_state_id' => $this->subscription_state_id,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'starts_at', $this->starts_at])
            ->andFilterWhere(['like', 'ends_at', $this->ends_at]);

        return $dataProvider;
    }
}
