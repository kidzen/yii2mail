<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class LeaveForm extends Model
{
    public $type;
    public $mailto;
    public $start_date;
    public $end_date;
    public $description;
    public $content;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
        [['type', 'mailto', 'start_date', 'end_date','description','content'], 'required'],
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
        $mailset['title'] = 'Permohonan '.$model->type.'('.$model->description.'): '.Yii::$app->user->name.' pada '.date('d M Y H:i\H',strtotime($model->start_date));
        // $mailset['content'] = 'Permohonan '.$model->type.' '.Yii::$app->user->name.' pada '.$model->start_date. ' sehingga ' .$model->end_date.' bertujuan '.$model->description.'. '. $model->content; 
        return Yii::$app->mailer->compose(
            ['html' => 'leaveRequest-html', 'text' => 'leaveRequest-text'],
            ['model' => $model]
            )
        ->setTo($model->mailto)
        ->setFrom($model->mailto)
        ->setSubject($mailset['title'])
        // ->setTextBody($mailset['content'])
        ->send();
    }
}
