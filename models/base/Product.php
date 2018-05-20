<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\components\UUIDBehavior;

/**
 * This is the base model class for table "product".
 *
 * @property integer $id
 * @property string $uuid
 * @property double $price
 * @property string $short_description
 * @property string $description
 * @property string $thumbnail
 * @property string $image
 * @property string $type_nutrition
 * @property string $created_at
 * @property string $updated_at
 * @property integer $stock
 * @property integer $is_active
 *
 * @property \app\models\Detail[] $details
 * @property \app\models\ProductHasIngredients[] $productHasIngredients
 * @property \app\models\Ingredients[] $ingredients
 * @property \app\models\ProductHasSizes[] $productHasSizes
 * @property \app\models\Sizes[] $sizes
 */
class Product extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    private $_rt_softdelete;
    private $_rt_softrestore;

    public function __construct(){
        parent::__construct();
        $this->_rt_softdelete = [
            'deleted_by' => \Yii::$app->user->id,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
        $this->_rt_softrestore = [
            'deleted_by' => 0,
            'deleted_at' => date('Y-m-d H:i:s'),
        ];
    }

    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'details',
            'productHasIngredients',
            'ingredients',
            'productHasSizes',
            'sizes'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid', 'short_description', 'description', 'thumbnail', 'image', 'type_nutrition'], 'required'],
            [['price'], 'number'],
            [['stock', 'is_active'], 'integer'],
            [['uuid', 'short_description', 'description', 'thumbnail', 'image', 'type_nutrition', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasMany(\app\models\Detail::className(), ['product_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasIngredients()
    {
        return $this->hasMany(\app\models\ProductHasIngredients::className(), ['product_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(\app\models\Ingredients::className(), ['id' => 'ingredients_id'])->viaTable('product_has_ingredients', ['product_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasSizes()
    {
        return $this->hasMany(\app\models\ProductHasSizes::className(), ['product_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSizes()
    {
        return $this->hasMany(\app\models\Sizes::className(), ['id' => 'sizes_id'])->viaTable('product_has_sizes', ['product_id' => 'id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            /*'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],*/
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'uuid',
            ],
        ];
    }

    /**
     * The following code shows how to apply a default condition for all queries:
     *
     * ```php
     * class Customer extends ActiveRecord
     * {
     *     public static function find()
     *     {
     *         return parent::find()->where(['deleted' => false]);
     *     }
     * }
     *
     * // Use andWhere()/orWhere() to apply the default condition
     * // SELECT FROM customer WHERE `deleted`=:deleted AND age>30
     * $customers = Customer::find()->andWhere('age>30')->all();
     *
     * // Use where() to ignore the default condition
     * // SELECT FROM customer WHERE age>30
     * $customers = Customer::find()->where('age>30')->all();
     * ```
     */

    /**
     * @inheritdoc
     * @return \app\models\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\ProductQuery(get_called_class());
        return $query;
    }
}
