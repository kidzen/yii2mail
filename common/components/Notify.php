<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace common\components;

use Yii;

class Notify {

    public $message;
    public $duration;

    public function fail($message, $duration = 8000) {
        return Yii::$app->session->setFlash('error', [
                    'type' => 'danger',
                    'duration' => $duration,
                    'icon' => 'glyphicon glyphicon-remove-sign',
                    'title' => ' Fail.',
                    'message' => $message
        ]);
    }

    public function success($message, $duration = 3000) {
        return Yii::$app->session->setFlash('success', [
                    'type' => 'success',
                    'duration' => $duration,
                    'icon' => 'glyphicon glyphicon-check-sign',
                    'title' => ' Success.',
                    'message' => $message
        ]);
    }

    public function info($message, $duration = 3000) {
        return Yii::$app->session->setFlash('info', [
                    'type' => 'info',
                    'duration' => $duration,
                    'icon' => 'glyphicon glyphicon-info-sign',
                    'title' => ' Info.',
                    'message' => $message
        ]);
    }

    public function warning($message, $duration = 3000) {
        return Yii::$app->session->setFlash('warning', [
                    'type' => 'warning',
                    'duration' => $duration,
                    'icon' => 'glyphicon glyphicon-exclamation-mark',
                    'title' => ' Warning.',
                    'message' => $message
        ]);
    }

}
