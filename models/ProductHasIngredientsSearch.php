<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProductHasIngredients;

/**
 * ProductHasIngredientsSearch represents the model behind the search form about `app\models\ProductHasIngredients`.
 */
class ProductHasIngredientsSearch extends ProductHasIngredients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'ingredients_id'], 'integer'],
            [['grams_per_ingredient'], 'safe'],
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
        $query = ProductHasIngredients::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'ingredients_id' => $this->ingredients_id,
        ]);

        $query->andFilterWhere(['like', 'grams_per_ingredient', $this->grams_per_ingredient]);

        return $dataProvider;
    }
}
