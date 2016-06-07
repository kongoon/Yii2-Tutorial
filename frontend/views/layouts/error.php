<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            body{
                margin-top:100px;
            }
        </style>
    </head>
    <?php $this->beginBody() ?>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="text-center">
                            เกิดข้อผิดพลาด
                        <hr />

                         <?= $content; ?>
                        </div>
                        <div class="form-group">

                            <?= Html::a('กลับ', isset(Yii::$app->request->referrer) ? Yii::$app->request->referrer : Yii::$app->homeUrl, ['class' => 'btn btn-success btn-block']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end .row -->
        <div class="row">
            <div class="col-md-12 text-center">
                <small>
                    <?=Yii::$app->name?>
                    <br />&copy;2011-<?=date('Y')?> All rights reserved.</small>
            </div>
        </div>
    </div><!-- end .container -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
