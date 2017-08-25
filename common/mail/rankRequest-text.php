<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */
use yii\helpers\Html;

?>
Hello <?= Html::encode($model->mailto) ?>,

Daripada : <?= Html::encode(Yii::$app->user->email) ?>
Nama Pegawai : <?= Html::encode(Yii::$app->user->name) ?>
Perkara : Permohonan <?= Html::encode($model->type) ?>
Keperluan : <?= Html::encode($model->requirement) ?>
Nota : <?= Html::encode($model->content) ?>
