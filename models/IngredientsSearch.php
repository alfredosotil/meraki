<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ingredients;

/**
 * IngredientsSearch represents the model behind the search form about `app\models\Ingredients`.
 */
class IngredientsSearch extends Ingredients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'group_food_id', 'type_ingredient_id'], 'integer'],
            [['uuid', 'name', 'description', 'protein_per_gram', 'color', 'type'], 'safe'],
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
        $query = Ingredients::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'group_food_id' => $this->group_food_id,
            'type_ingredient_id' => $this->type_ingredient_id,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'protein_per_gram', $this->protein_per_gram])
            ->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
