<div class="text-center">
	<strong><?=$model['name']?></strong><br />
	<barcode code="<?=$model['barcode']?>" type="c93" size="0.8" height="2.0"/><br />
	<?=$model['barcode']?><br />
	<?=number_format($model['price'], 2)?> บาท
</div>
