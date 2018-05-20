<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductHasSizes;

/**
 * ProductHasSizesSearch represents the model behind the search form about `app\models\ProductHasSizes`.
 */
class ProductHasSizesSearch extends ProductHasSizes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'sizes_id'], 'integer'],
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
        $query = ProductHasSizes::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'sizes_id' => $this->sizes_id,
        ]);

        return $dataProvider;
    }
}
