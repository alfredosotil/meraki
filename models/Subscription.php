<?php

namespace app\models;

use Yii;
use \app\models\base\Subscription as BaseSubscription;

/**
 * This is the model class for table "subscription".
 */
class Subscription extends BaseSubscription
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['plan_id', 'user_id', 'uuid', 'starts_at', 'ends_at'], 'required'],
            [['plan_id', 'user_id', 'lunches_delivered', 'snacks_delivered', 'created_by', 'updated_by', 'subscription_state_id', 'is_active'], 'integer'],
            [['uuid', 'created_at', 'updated_at', 'starts_at', 'ends_at'], 'string', 'max' => 255]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'plan_id' => Yii::t('app', 'Plan ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'lunches_delivered' => Yii::t('app', 'Lunches Delivered'),
            'snacks_delivered' => Yii::t('app', 'Snacks Delivered'),
            'uuid' => Yii::t('app', 'Uuid'),
            'starts_at' => Yii::t('app', 'Starts At'),
            'ends_at' => Yii::t('app', 'Ends At'),
            'subscription_state_id' => Yii::t('app', 'Subscription State ID'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }
}
