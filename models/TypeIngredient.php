<?php

namespace app\models;

use Yii;
use \app\models\base\TypeIngredient as BaseTypeIngredient;

/**
 * This is the model class for table "type_ingredient".
 */
class TypeIngredient extends BaseTypeIngredient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
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
        ];
    }
}
