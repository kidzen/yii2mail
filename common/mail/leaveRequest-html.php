<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="leave-request">
	<p>Hello <?= Html::encode($model->mailto) ?>,</p><br>
	<p>Daripada : <?= Html::encode(Yii::$app->user->email) ?></p>
	<p>Nama Pegawai : <?= Html::encode(Yii::$app->user->name) ?></p>
	<p>Subjek : Permohonan <?= Html::encode($model->type) ?></p>
	<?php 
	$from = new DateTime(Html::encode($model->start_date));
	$to = new DateTime(Html::encode($model->end_date));
	$fromdate = new DateTime(Html::encode(date('Y-m-d',strtotime($model->start_date))));
	$todate = new DateTime(Html::encode(date('Y-m-d',strtotime($model->end_date))));
	$duration = $fromdate->diff($todate);
	?>
	<p>Tempoh : Bermula <?= Html::encode($from->format('d M Y H:i\H (l)')) ?> hingga <?= Html::encode($to->format('d M Y H:i\H (l)')) ?> ( <?= $duration->format('%a Hari') ?> )</p>
	<p>Sebab : <?= Html::encode($model->description) ?></p>
	<p>Nota : <?= Html::encode($model->content) ?></p>

</div>


