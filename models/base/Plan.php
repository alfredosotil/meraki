<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\components\UUIDBehavior;

/**
 * This is the base model class for table "plan".
 *
 * @property integer $id
 * @property string $uuid
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_active
 * @property integer $duration
 * @property double $price_per_week
 * @property double $price_per_month
 * @property integer $points_per_week
 * @property integer $points_per_month
 * @property integer $lunch_per_week
 * @property integer $lunch_per_month
 * @property integer $snack_per_week
 * @property integer $snack_per_month
 *
 * @property \app\models\Subscription[] $subscriptions
 */
class Plan extends \yii\db\ActiveRecord
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
            'subscriptions'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uuid', 'duration'], 'required'],
            [['is_active', 'duration', 'points_per_week', 'points_per_month', 'lunch_per_week', 'lunch_per_month', 'snack_per_week', 'snack_per_month'], 'integer'],
            [['price_per_week', 'price_per_month'], 'number'],
            [['uuid', 'created_at', 'updated_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubscriptions()
    {
        return $this->hasMany(\app\models\Subscription::className(), ['plan_id' => 'id']);
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
     * @return \app\models\PlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\PlanQuery(get_called_class());
        return $query;
    }
}
