<?php

namespace app\models;

use Yii;
use \app\models\base\GroupFood as BaseGroupFood;

/**
 * This is the model class for table "group_food".
 */
class GroupFood extends BaseGroupFood
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'description'], 'required'],
            [['name', 'description'], 'string', 'max' => 255]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
