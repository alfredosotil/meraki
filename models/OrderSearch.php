<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'shipped', 'is_paid', 'is_active'], 'integer'],
            [['uuid', 'created_at', 'updated_at', 'deleted_at', 'amount', 'shipp_name', 'shipp_address', 'departament', 'province', 'district', 'country', 'phone_number', 'email', 'shipping', 'tax', 'tracking_number', 'type_payment', 'notes'], 'safe'],
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
        $query = Order::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'shipped' => $this->shipped,
            'is_paid' => $this->is_paid,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'deleted_at', $this->deleted_at])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'shipp_name', $this->shipp_name])
            ->andFilterWhere(['like', 'shipp_address', $this->shipp_address])
            ->andFilterWhere(['like', 'departament', $this->departament])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'shipping', $this->shipping])
            ->andFilterWhere(['like', 'tax', $this->tax])
            ->andFilterWhere(['like', 'tracking_number', $this->tracking_number])
            ->andFilterWhere(['like', 'type_payment', $this->type_payment])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
