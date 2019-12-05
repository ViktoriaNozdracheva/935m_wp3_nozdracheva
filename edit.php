<?php
	$id = clearData($_GET['id']);	
?>

<div class="index-text-1">Редактирование товара</div>		
<div class="article">
	<form method='POST' action='index.php?page=edit&id=<?php echo $id; ?>' ENCTYPE='multipart/form-data'>	
		<table style="text-align:left;" class="content">
			<tr>
				<th>Наименование:</th>
				<td><input type='text' name='name' value='<?=$_SESSION['catalog'][$id]['name']?>' size="79"></td>
			</tr>
			<tr>
				<th>Категория:</th> 
				<td>				
					<select size="3" name="category">		
						<option value="Одежда" <?php if ($_SESSION['catalog'][$id]['category'] == "Одежда") echo "selected" ?>>Одежда</option>
						<option value="Аксессуары" <?php if ($_SESSION['catalog'][$id]['category'] == "Аксессуары") echo "selected" ?>>Аксессуары</option>
						<option value="Товары для интерьера" <?php if ($_SESSION['catalog'][$id]['category'] == "Товары для интерьера") echo "selected" ?>>Товары для интерьера</option>
					</select>
				</td>
			</tr>			 			
			<tr>
				<th>Цена:</th>
				<td><input type='number' name='price'  min="0" step="0.01" value='<?=$_SESSION['catalog'][$id]['price']?>'>&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' cols='60' ><?=$_SESSION['catalog'][$id]['description']?></textarea>
			</tr>	
			<tr>
				<th>Изображение:</th>
				<td align="center"><input type="file" name="img" accept="image/jpeg"></td>
			</tr>			
			<rt>			
				<td colspan="2" align="right"><input type="submit" value="Сохранить" name="edit"></td>
			</tr>
		</table>			
	</form>
	<?php   
		if (isset($_POST['edit']))
		{ 
			if (!empty($_POST['name']) && !empty($_POST['category']) && !empty($_POST['price']) && !empty($_POST['description']))
			{	
				$img = $_SESSION['catalog'][$id]['image'];
				if ($_FILES['img']['tmp_name'])
					$img = loadImage(); // грузим картинку
				if ($img != ""){
						$_SESSION['catalog'][$id] = array("name"=>clearData($_POST['name']),
														  "category"=>clearData($_POST['category']),
														  "price"=>clearData($_POST['price']),
														  "description"=>clearData($_POST['description']),
														  "image"=>$img);			
						header("Location: index.php?page=catalog");
						exit;
				}
			}
			else 
				echo '<font color="red">Заполните все поля!</font>';	
		}
	?>
</div>
