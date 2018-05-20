<?php

namespace app\models;

use Yii;
use \app\models\base\Detail as BaseDetail;

/**
 * This is the model class for table "detail".
 */
class Detail extends BaseDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'order_id', 'uuid', 'description'], 'required'],
            [['product_id', 'order_id', 'is_active', 'qty'], 'integer'],
            [['price_per_unit', 'price', 'tax', 'vat'], 'number'],
            [['uuid', 'created_at', 'updated_at', 'description'], 'string', 'max' => 255]
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'uuid' => Yii::t('app', 'Uuid'),
            'is_active' => Yii::t('app', 'Is Active'),
            'description' => Yii::t('app', 'Description'),
            'price_per_unit' => Yii::t('app', 'Price Per Unit'),
            'price' => Yii::t('app', 'Price'),
            'tax' => Yii::t('app', 'Tax'),
            'vat' => Yii::t('app', 'Vat'),
            'qty' => Yii::t('app', 'Qty'),
        ];
    }
}
