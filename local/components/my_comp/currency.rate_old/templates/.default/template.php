<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult['CURRENCY_RATES'])):?>

	<table cellspacing="0">
		<tr>
			<th>Код</th>
			<th>Единиц</th>
			<th>Валюта</th>
			<th>Курс ЦБ РФ</th>
		</tr>
		<?foreach ($arResult['CURRENCY_RATES'] as $rate) :?>
			<tr>
				<td><?=$rate["CODE"]?></td>
				<td><?=$rate["NOMINAL"]?></td>
				<td><?=$rate["NAME"]?></td>
				<td><?=$rate["VALUE"]?></td>		
			</tr>
		<?endforeach?>

	</table>
<?else: ?>
<?= "Для указанных кодов курсов валют не найдено"?>
<?endif?>