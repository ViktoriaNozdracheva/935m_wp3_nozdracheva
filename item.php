<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$id = clearData($_GET['id']);
	}
?>

<div class="article">	
<a href='index.php?page=catalog' style='margin-left:40px'>Назад</a>
<a href='index.php?page=edit&id=<? echo $id; ?>' style='margin-left:20px'>Редактировать</a>
<br/><br/>
<table  border="1" style="text-align:left;" class="content" >
	<tr>
		<th  bgcolor="#e7e7e7">Название</th>
		<td style="width:300px;" ><?= $_SESSION['catalog'][$id]['name'] ?></td>
		<td rowspan="4"><img src='<?php echo $_SESSION['catalog'][$id]['image'].'.jpg';?> '></td>
	</tr>
	<tr>
		<th bgcolor="#e7e7e7">Категория</th>
		<td><?= $_SESSION['catalog'][$id]['category']?></td>
	</tr>
	<tr>
		<th bgcolor="#e7e7e7">Цена</th>
		<td><?= $_SESSION['catalog'][$id]['price'] ?> руб.</td>
	</tr>
	<tr >
		<th  bgcolor="#e7e7e7">Описание</th>
		<td valign="top"><?= $_SESSION['catalog'][$id]['description'] ?></td>
	</tr>
</table>
</div>
