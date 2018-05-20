<?php

namespace app\models;

use Yii;
use \app\models\base\Order as BaseOrder;

/**
 * This is the model class for table "order".
 */
class Order extends BaseOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'uuid', 'amount', 'shipp_name', 'shipp_address', 'departament', 'province', 'district', 'country', 'phone_number', 'email', 'tracking_number', 'type_payment'], 'required'],
            [['user_id', 'shipped', 'is_paid', 'is_active'], 'integer'],
            [['amount', 'shipping', 'tax'], 'number'],
            [['uuid', 'created_at', 'updated_at', 'deleted_at', 'shipp_name', 'shipp_address', 'departament', 'province', 'district', 'country', 'phone_number', 'email', 'tracking_number', 'type_payment', 'notes'], 'string', 'max' => 255]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'uuid' => Yii::t('app', 'Uuid'),
            'amount' => Yii::t('app', 'Amount'),
            'shipp_name' => Yii::t('app', 'Shipp Name'),
            'shipp_address' => Yii::t('app', 'Shipp Address'),
            'departament' => Yii::t('app', 'Departament'),
            'province' => Yii::t('app', 'Province'),
            'district' => Yii::t('app', 'District'),
            'country' => Yii::t('app', 'Country'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'email' => Yii::t('app', 'Email'),
            'shipping' => Yii::t('app', 'Shipping'),
            'tax' => Yii::t('app', 'Tax'),
            'shipped' => Yii::t('app', 'Shipped'),
            'tracking_number' => Yii::t('app', 'Tracking Number'),
            'is_paid' => Yii::t('app', 'Is Paid'),
            'type_payment' => Yii::t('app', 'Type Payment'),
            'notes' => Yii::t('app', 'Notes'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }
}
