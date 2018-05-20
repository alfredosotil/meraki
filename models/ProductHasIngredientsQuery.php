<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductHasIngredients]].
 *
 * @see ProductHasIngredients
 */
class ProductHasIngredientsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ProductHasIngredients[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductHasIngredients|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
