<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detail;

/**
 * DetailSearch represents the model behind the search form about `app\models\Detail`.
 */
class DetailSearch extends Detail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'order_id', 'is_active', 'qty'], 'integer'],
            [['uuid', 'created_at', 'updated_at', 'description', 'price_per_unit', 'price', 'tax', 'vat'], 'safe'],
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
        $query = Detail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'product_id' => $this->product_id,
            'order_id' => $this->order_id,
            'is_active' => $this->is_active,
            'qty' => $this->qty,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'price_per_unit', $this->price_per_unit])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'tax', $this->tax])
            ->andFilterWhere(['like', 'vat', $this->vat]);

        return $dataProvider;
    }
}
