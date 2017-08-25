<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Role as BaseRole;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User[] $users
 */
class Role extends BaseRole
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
    	return ArrayHelper::merge(
    		parent::rules(),
    		[
    			[['created_at', 'updated_at'], 'required'],
    		]       
    		);
    }

    /**
     * @inheritdoc
     * @return \frontend\models\query\RoleQuery the active query used by this AR class.
     */
    public static function find()
    {
    	return new \frontend\models\query\RoleQuery(get_called_class());
    }
}
