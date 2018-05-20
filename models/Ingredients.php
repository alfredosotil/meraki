<?php

namespace app\models;

use Yii;
use \app\models\base\Ingredients as BaseIngredients;

/**
 * This is the model class for table "ingredients".
 */
class Ingredients extends BaseIngredients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['group_food_id', 'type_ingredient_id', 'name', 'description', 'protein_per_gram', 'color'], 'required'],
            [['group_food_id', 'type_ingredient_id'], 'integer'],
            [['protein_per_gram'], 'number'],
            [['name', 'description', 'color', 'type'], 'string', 'max' => 255]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'group_food_id' => Yii::t('app', 'Group Food ID'),
            'type_ingredient_id' => Yii::t('app', 'Type Ingredient ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'protein_per_gram' => Yii::t('app', 'Protein Per Gram'),
            'color' => Yii::t('app', 'Color'),
            'type' => Yii::t('app', 'Type'),
        ];
    }
}
