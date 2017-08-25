<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CourseForm extends Model
{
    public $type;
    public $course_name;
    public $venue;
    public $requirement;
    public $mailto;
    public $start_date;
    public $end_date;
    public $content;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
        [['type','course_name','venue','mailto', 'start_date', 'end_date','requirement','content'], 'required'],
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
        $mailset['title'] = 'Permohonan '.$model->type.'('.$model->course_name.'): '.Yii::$app->user->name.' pada '.date('d M Y H:i\H',strtotime($model->start_date));
        $mailset['content'] = 'Permohonan '.$model->type.' '.Yii::$app->user->name.' pada '.$model->start_date. ' sehingga ' .$model->end_date.' bertujuan kursus '.$model->course_name.'. '. $model->content.'. Keperluan : '.$model->requirement; 
        return Yii::$app->mailer->compose(
            ['html' => 'courseRequest-html', 'text' => 'courseRequest-text'],
            ['model' => $model]
            )
        ->setTo($model->mailto)
        ->setFrom(Yii::$app->user->email)
        ->setSubject($mailset['title'])
        // ->setTextBody($mailset['content'])
        ->send();
    }
}
