<?php

namespace app\models;

use Yii;
use \app\models\base\ProductHasIngredients as BaseProductHasIngredients;

/**
 * This is the model class for table "product_has_ingredients".
 */
class ProductHasIngredients extends BaseProductHasIngredients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'ingredients_id'], 'required'],
            [['product_id', 'ingredients_id'], 'integer'],
            [['grams_per_ingredient'], 'number']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'ingredients_id' => Yii::t('app', 'Ingredients ID'),
            'grams_per_ingredient' => Yii::t('app', 'Grams Per Ingredient'),
        ];
    }
}
