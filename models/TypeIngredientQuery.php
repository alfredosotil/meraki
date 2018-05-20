<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TypeIngredient]].
 *
 * @see TypeIngredient
 */
class TypeIngredientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TypeIngredient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TypeIngredient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
