<?php

namespace app\models;

use Yii;
use \app\models\base\Product as BaseProduct;

/**
 * This is the model class for table "product".
 */
class Product extends BaseProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['uuid', 'short_description', 'description', 'thumbnail', 'image', 'type_nutrition'], 'required'],
            [['price'], 'number'],
            [['stock', 'is_active'], 'integer'],
            [['uuid', 'short_description', 'description', 'thumbnail', 'image', 'type_nutrition', 'created_at', 'updated_at'], 'string', 'max' => 255]
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
            'price' => Yii::t('app', 'Price'),
            'short_description' => Yii::t('app', 'Short Description'),
            'description' => Yii::t('app', 'Description'),
            'thumbnail' => Yii::t('app', 'Thumbnail'),
            'image' => Yii::t('app', 'Image'),
            'type_nutrition' => Yii::t('app', 'Type Nutrition'),
            'stock' => Yii::t('app', 'Stock'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }
}
