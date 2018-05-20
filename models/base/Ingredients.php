<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\components\UUIDBehavior;

/**
 * This is the base model class for table "ingredients".
 *
 * @property integer $id
 * @property integer $group_food_id
 * @property integer $type_ingredient_id
 * @property string $name
 * @property string $description
 * @property double $protein_per_gram
 * @property string $color
 * @property string $type
 *
 * @property \app\models\GroupFood $groupFood
 * @property \app\models\TypeIngredient $typeIngredient
 * @property \app\models\ProductHasIngredients[] $productHasIngredients
 * @property \app\models\Product[] $products
 */
class Ingredients extends \yii\db\ActiveRecord
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
            'groupFood',
            'typeIngredient',
            'productHasIngredients',
            'products'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['group_food_id', 'type_ingredient_id', 'name', 'description', 'protein_per_gram', 'color'], 'required'],
            [['group_food_id', 'type_ingredient_id'], 'integer'],
            [['protein_per_gram'], 'number'],
            [['name', 'description', 'color', 'type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ingredients';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'group_food_id' => Yii::t('app', 'Group Food ID'),
            'type_ingredient_id' => Yii::t('app', 'Type Ingredient ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'protein_per_gram' => Yii::t('app', 'Protein Per Gram'),
            'color' => Yii::t('app', 'Color'),
            'type' => Yii::t('app', 'Type'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupFood()
    {
        return $this->hasOne(\app\models\GroupFood::className(), ['id' => 'group_food_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypeIngredient()
    {
        return $this->hasOne(\app\models\TypeIngredient::className(), ['id' => 'type_ingredient_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductHasIngredients()
    {
        return $this->hasMany(\app\models\ProductHasIngredients::className(), ['ingredients_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(\app\models\Product::className(), ['id' => 'product_id'])->viaTable('product_has_ingredients', ['ingredients_id' => 'id']);
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
     * @return \app\models\IngredientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\IngredientsQuery(get_called_class());
        return $query;
    }
}
