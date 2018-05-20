<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\components\UUIDBehavior;

/**
 * This is the base model class for table "subscription".
 *
 * @property integer $id
 * @property integer $plan_id
 * @property integer $user_id
 * @property integer $lunches_delivered
 * @property integer $snacks_delivered
 * @property string $uuid
 * @property string $created_at
 * @property string $updated_at
 * @property string $starts_at
 * @property string $ends_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $subscription_state_id
 * @property integer $is_active
 *
 * @property \app\models\Plan $plan
 * @property \app\models\User $user
 */
class Subscription extends \yii\db\ActiveRecord
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
            'plan',
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plan_id', 'user_id', 'uuid', 'starts_at', 'ends_at'], 'required'],
            [['plan_id', 'user_id', 'lunches_delivered', 'snacks_delivered', 'created_by', 'updated_by', 'subscription_state_id', 'is_active'], 'integer'],
            [['uuid', 'created_at', 'updated_at', 'starts_at', 'ends_at'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscription';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(\app\models\Plan::className(), ['id' => 'plan_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
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
     * @return \app\models\SubscriptionQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\SubscriptionQuery(get_called_class());
        return $query;
    }
}
