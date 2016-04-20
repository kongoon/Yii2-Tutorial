<?php

namespace frontend\controllers;

class PaypalController extends \yii\web\Controller
{
    public function actionCancel()
    {
        return $this->render('cancel');
    }

    public function actionError()
    {
        return $this->render('error');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionPay()
    {
        return $this->render('pay');
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

}
