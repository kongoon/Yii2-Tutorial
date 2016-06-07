<?php
$this->title = 'Thai Formatter';
?>
<h1><?=$this->title?></h1>

<?php
$now = time();
echo Yii::$app->language . '<br />';
echo Yii::$app->thaiFormatter->locale . '<br />';
echo Yii::$app->thaiFormatter->asDate($now, 'short')."<br>";
echo Yii::$app->thaiFormatter->asDate($now, 'medium')."<br>";
echo Yii::$app->thaiFormatter->asDate($now, 'long')."<br>";
echo Yii::$app->thaiFormatter->asDate($now, 'full')."<br>";

echo Yii::$app->thaiFormatter->asDateTime($now, 'short')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($now, 'medium')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($now, 'long')."<br>";
echo Yii::$app->thaiFormatter->asDateTime($now, 'full')."<br>";

echo Yii::$app->thaiFormatter->asDate($now, 'php:Y-m-d') . '<br />';
echo Yii::$app->thaiFormatter->asDateTime($now, 'php:Y-m-d H:i:s');
