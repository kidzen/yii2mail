<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $user common\models\User */

?>

Hello <?= Html::encode($model->mailto) ?>,
Daripada : <?= Html::encode(Yii::$app->user->email) ?>
Nama Pegawai : <?= Html::encode(Yii::$app->user->name) ?>
Subjek : Permohonan <?= Html::encode($model->type) ?>
	<?php 
	$from = new DateTime(Html::encode($model->start_date));
	$to = new DateTime(Html::encode($model->end_date));
	$fromdate = new DateTime(Html::encode(date('Y-m-d',strtotime($model->start_date))));
	$todate = new DateTime(Html::encode(date('Y-m-d',strtotime($model->end_date))));
	$duration = $fromdate->diff($todate);
	?>
Tempoh : Bermula <?= Html::encode($from->format('d M Y H:i\H (l)')) ?> hingga <?= Html::encode($to->format('d M Y H:i\H (l)')) ?> ( <?= $duration->format('%a Hari') ?> )
Sebab : <?= Html::encode($model->description) ?>
Nota : <?= Html::encode($model->content) ?>

