<?php

namespace app\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use app\components\UUIDBehavior;

/**
 * This is the base model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $uuid
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property double $amount
 * @property string $shipp_name
 * @property string $shipp_address
 * @property string $departament
 * @property string $province
 * @property string $district
 * @property string $country
 * @property string $phone_number
 * @property string $email
 * @property double $shipping
 * @property double $tax
 * @property integer $shipped
 * @property string $tracking_number
 * @property integer $is_paid
 * @property string $type_payment
 * @property string $notes
 * @property integer $is_active
 *
 * @property \app\models\Detail[] $details
 * @property \app\models\User $user
 */
class Order extends \yii\db\ActiveRecord
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
            'user'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'uuid', 'amount', 'shipp_name', 'shipp_address', 'departament', 'province', 'district', 'country', 'phone_number', 'email', 'tracking_number', 'type_payment'], 'required'],
            [['user_id', 'shipped', 'is_paid', 'is_active'], 'integer'],
            [['amount', 'shipping', 'tax'], 'number'],
            [['uuid', 'created_at', 'updated_at', 'deleted_at', 'shipp_name', 'shipp_address', 'departament', 'province', 'district', 'country', 'phone_number', 'email', 'tracking_number', 'type_payment', 'notes'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetails()
    {
        return $this->hasMany(\app\models\Detail::className(), ['order_id' => 'id']);
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
     * @return \app\models\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        $query = new \app\models\OrderQuery(get_called_class());
        return $query;
    }
}
