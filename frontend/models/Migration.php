<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\Migration as BaseMigration;

/**
 * This is the model class for table "migration".
 *
 * @property string $version
 * @property integer $apply_time
 */
class Migration extends BaseMigration
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
       return ArrayHelper::merge(
        parent::rules(),
        [
            [['version'], 'required'],
        ]
        );
    }

    /**
     * @inheritdoc
     * @return \frontend\models\query\MigrationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\MigrationQuery(get_called_class());
    }
}
