<?php

namespace app\models;

use Yii;
use \app\models\base\Plan as BasePlan;

/**
 * This is the model class for table "plan".
 */
class Plan extends BasePlan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uuid', 'duration'], 'required'],
            [['is_active', 'duration', 'points_per_week', 'points_per_month', 'lunch_per_week', 'lunch_per_month', 'snack_per_week', 'snack_per_month'], 'integer'],
            [['price_per_week', 'price_per_month'], 'number'],
            [['uuid', 'created_at', 'updated_at'], 'string', 'max' => 255]
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
            'is_active' => Yii::t('app', 'Is Active'),
            'duration' => Yii::t('app', 'Duration'),
            'price_per_week' => Yii::t('app', 'Price Per Week'),
            'price_per_month' => Yii::t('app', 'Price Per Month'),
            'points_per_week' => Yii::t('app', 'Points Per Week'),
            'points_per_month' => Yii::t('app', 'Points Per Month'),
            'lunch_per_week' => Yii::t('app', 'Lunch Per Week'),
            'lunch_per_month' => Yii::t('app', 'Lunch Per Month'),
            'snack_per_week' => Yii::t('app', 'Snack Per Week'),
            'snack_per_month' => Yii::t('app', 'Snack Per Month'),
        ];
    }
}
