<?php

namespace frontend\controllers;
use kartik\mpdf\Pdf;

class BarcodeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = [
            'id' => 1,
            'barcode' => '8850944970202',
            'name' => 'ทดสอบสินค้า',
            'price' => '2990',
        ];
        $content = $this->renderPartial('index', [
            'model' => $model
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => [60, 30],//Pdf::FORMAT_A4,
            'marginLeft' => false,
            'marginRight' => false,
            'marginTop' => 1,
            'marginBottom' => false,
            'marginHeader' => false,
            'marginFooter' => false,

            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@frontend/web/css/kv-mpdf-bootstrap.css',
            // any css to be embedded if required
            'cssInline' => 'body{font-size:11px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Print Sticker', ],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>false,//['Krajee Report Header'],
                'SetFooter'=>false,//['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

}
