<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use kartik\widgets\DateTimePicker;
use kartik\widgets\Select2;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\models\User;

$this->title = 'Leave Request';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-leave-request">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Please fill out the following form to with corresponding details. Thank you.
    </p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'leave-form']); ?>

            <?= $form->field($model, 'type')->dropdownList([
                'CUTI TAHUN'=>'CUTI TAHUN',
                'CUTI KURSUS'=>'CUTI KURSUS',
                'CUTI PANGKAT'=>'CUTI PANGKAT'
                ],['autofocus' => true]) ?>

                <?= $form->field($model, 'start_date')->widget(DateTimePicker::classname()) ?>

                <?= $form->field($model, 'end_date')->widget(DateTimePicker::classname()) ?>

                <?= $form->field($model, 'mailto')->widget(Select2::classname(),[
                    'data' => User::getMailList(),
                    'options' => ['placeholder' => 'Select target ...'],
                    'pluginOptions' => [
                    'allowClear' => false
                    ],
                    ]) ?>

                    <?= $form->field($model, 'description') ?>

                    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>

            </div>
