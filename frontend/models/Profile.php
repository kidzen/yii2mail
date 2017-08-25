<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Profile as BaseProfile;

/**
 * This is the model class for table "profile".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $rank
 * @property string $department
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property User $user
 */
class Profile extends BaseProfile
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
        [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ]
        );
 }

    /**
     * @inheritdoc
     * @return \frontend\models\query\ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\ProfileQuery(get_called_class());
    }
}
