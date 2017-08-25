<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\User as BaseUser;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property integer $role_id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Profile[] $profiles
 * @property Role $role
 */
class User extends BaseUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
    	return ArrayHelper::merge(
    		parent::rules(),
    		[
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['role_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
            ]
            );
    }

    /**
     * @inheritdoc
     * @return \frontend\models\query\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\UserQuery(get_called_class());
    }
    public static function getMailList()
    {
        return ArrayHelper::map(static::find()->all(), 'email',function($model){
            return $model->profile->name.' : '.$model->email; }
            ,'profile.rank');
    }
}
