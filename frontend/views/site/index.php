<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>5 Rejimen Artileri DiRaja</h1>

        <p class="lead">Sistem e-Borang 5 RAD.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Permohonan Cuti</h2>

                <p>Borang permohonan cuti. Email akan dihantar kepada penerima berdasarkan info yang diberikan. </p>

                <p><?= Html::a('Permohonan Cuti &raquo;',['/request/leave-request'],['class'=>'btn btn-primary']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Kursus</h2>

                <p>Borang permohonan kursus. Email akan dihantar kepada penerima berdasarkan info yang diberikan. </p>

                <p><?= Html::a('Kursus &raquo;',['/request/course-request'],['class'=>'btn btn-primary']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Pangkat</h2>

                <p>Borang pangkat. Email akan dihantar kepada penerima berdasarkan info yang diberikan. </p>

                <p><?= Html::a('Pangkat &raquo;',['/request/rank-request'],['class'=>'btn btn-primary']) ?></p>
            </div>
        </div>

    </div>
</div>
