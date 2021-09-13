<?php

namespace app\controllers;

use yii\web\Controller;

class AdminController extends Controller {


    public function getAllArticles() {

    }

    public function actionDashboard () {
        if(\Yii::$app->user->can('admin')) {

            return $this->render('dashboard');
        } else {
            return $this->goHome();
        }
    }
}