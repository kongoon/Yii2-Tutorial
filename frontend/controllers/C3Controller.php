<?php

namespace frontend\controllers;


class C3Controller extends \yii\web\Controller
{
    public function actionChart1()
    {
        return $this->render('chart1');
    }

    public function actionChart2()
    {
        return $this->render('chart2');
    }

    public function actionChart3()
    {
        return $this->render('chart3');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
