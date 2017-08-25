<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RankForm extends Model
{
    public $type;
    public $mailto;
    public $requirement;
    public $content;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
        [['type', 'mailto','requirement','content'], 'required'],
            // email has to be a valid email address
        ['mailto', 'email'],
            // verifyCode needs to be entered correctly
        ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($model)
    {
        $mailset['title'] = 'Permohonan PANGKAT ('.$model->type.'): '.Yii::$app->user->name;
        // $mailset['content'] = 'Permohonan '.$model->type.' '.Yii::$app->user->name.' bertujuan '.$model->description.'. '. $model->content; 
        return Yii::$app->mailer->compose(
            ['html' => 'rankRequest-html', 'text' => 'rankRequest-text'],
            ['model' => $model]
            )
        ->setTo($model->mailto)
        ->setFrom($model->mailto)
        ->setSubject($mailset['title'])
        // ->setTextBody($mailset['content'])
        ->send();
    }
}
