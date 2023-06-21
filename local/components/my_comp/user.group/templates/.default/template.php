<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?if(!empty($arResult['USER_GROUPS'])):?>

	<table cellspacing="0">
		<tr>
			<th>ID</th>
			<th>Название группы</th>
			<th>Описание Группы</th>
		</tr>
		<?foreach ($arResult['USER_GROUPS'] as $group) :?>
			<tr>
				<td><?=$group["ID"]?></td>
				<td><?=$group["NAME"]?></td>
				<td><?=$group["DESCRIPTION"]?></td>
			</tr>
		<?endforeach?>

	</table>

<?endif?>