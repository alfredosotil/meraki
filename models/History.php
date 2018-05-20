<?php

namespace app\models;

use Yii;
use \app\models\base\History as BaseHistory;

/**
 * This is the model class for table "history".
 */
class History extends BaseHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uuid', 'description'], 'required'],
            [['is_alergic', 'is_active'], 'integer'],
            [['uuid', 'description', 'indications', 'type_nutrition', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uuid' => Yii::t('app', 'Uuid'),
            'is_alergic' => Yii::t('app', 'Is Alergic'),
            'description' => Yii::t('app', 'Description'),
            'indications' => Yii::t('app', 'Indications'),
            'type_nutrition' => Yii::t('app', 'Type Nutrition'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }
}
