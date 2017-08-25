<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
?>
<div class="rank-request">
	<p>Hello <?= Html::encode($model->mailto) ?>,</p><br><br>
	<p>Daripada : <?= Html::encode(Yii::$app->user->email) ?></p>
	<p>Nama Pegawai : <?= Html::encode(Yii::$app->user->name) ?></p>
	<p>Perkara : Permohonan <?= Html::encode($model->type) ?></p>
	<p>Keperluan : <?= Html::encode($model->requirement) ?></p>
	<p>Nota : <?= Html::encode($model->content) ?></p>
</div>
