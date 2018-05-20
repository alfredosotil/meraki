<?php

namespace app\models;

use Yii;
use \app\models\base\ProductHasSizes as BaseProductHasSizes;

/**
 * This is the model class for table "product_has_sizes".
 */
class ProductHasSizes extends BaseProductHasSizes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'sizes_id'], 'required'],
            [['product_id', 'sizes_id'], 'integer']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'sizes_id' => Yii::t('app', 'Sizes ID'),
        ];
    }
}
