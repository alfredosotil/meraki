<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Detail]].
 *
 * @see Detail
 */
class DetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Detail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Detail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
