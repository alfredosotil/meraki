<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductHasSizes]].
 *
 * @see ProductHasSizes
 */
class ProductHasSizesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ProductHasSizes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductHasSizes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
