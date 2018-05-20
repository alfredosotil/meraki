<?php

namespace app\models;

use Yii;
use \app\models\base\User as BaseUser;

/**
 * This is the model class for table "user".
 */
class User extends BaseUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'history_id'], 'required'],
            [['status', 'created_at', 'updated_at', 'last_login', 'total_points', 'history_id'], 'integer'],
            [['deleted_at', 'deleted_by'], 'safe'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'birthday'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['uuid', 'name', 'last_name', 'phone_number'], 'string', 'max' => 45],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ]);
    }
	
    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'last_login' => Yii::t('app', 'Last Login'),
            'uuid' => Yii::t('app', 'Uuid'),
            'name' => Yii::t('app', 'Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'birthday' => Yii::t('app', 'Birthday'),
            'total_points' => Yii::t('app', 'Total Points'),
            'history_id' => Yii::t('app', 'History ID'),
        ];
    }
}
