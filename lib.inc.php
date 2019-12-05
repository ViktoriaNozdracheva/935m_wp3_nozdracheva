<?php
	function getMenu($menu, $vertical=true)
	{	
		echo '<ul>';
			foreach ($menu as $link=>$href)
			{
				echo "<li><a href=\"$href\">", $link, '</a></li>';
			}		
		echo '</ul>';
	}
	
	
	function userSort($arr){	
		echo "<b>Исходный массив:</b><br>";
		// выводим исходный массив
		foreach ($arr as $key => $val) { 
			echo "arr[" . $key . "] = " . $val . "<br>";
		}
	    
		// сортируем массив
		$array_length = sizeof($arr);
		for($x = 0; $x < $array_length; $x++) { 
			for($y = 0; $y < $array_length; $y++) {  
				if(strcasecmp($arr[$x],$arr[$y])<0) {   
					$hold = $arr[$x];
					$arr[$x] = $arr[$y];
					$arr[$y] = $hold;
				}
			}
		 }
		echo "<br>";
		echo "<b>Массив после сортировки:</b><br>";
		// выводим отсортированный пользовательской функцией массив
		foreach ($arr as $key => $val) { 		
			echo "arr[" . $key . "] = " . $val . "<br>";
		}
	}
	
	
	function clearData($data)
	{
		return trim(strip_tags($data));
	}
	
	function loadImage(){ 
		if ($_FILES['img']['type'] != 'image/jpeg') {
			echo '<font color="red" align="center" >Не верный тип изображения!</font>';
			return "";
		}		
		else
		{
			if ($_FILES['img']['size'] > 100000) {
				echo '<font color="red" align="center" >Превышен максимальный размер файла! (макс.=100кб.)</font>';
				return "";
			}
			else
			{
				$Image = imagecreatefromjpeg($_FILES['img']['tmp_name']); 
				$Size = getimagesize($_FILES['img']['tmp_name']); 
				$Tmp = imagecreatetruecolor(300, 300);
				imagecopyresampled($Tmp, $Image, 0, 0, 0, 0, 300, 300, $Size[0], $Size[1]);
				if (isset($_POST["add"]))
					$img = 'images/catalog/'.count($_SESSION['catalog']);
				else 
					$img = $_SESSION['catalog'][$_GET['id']]['image'];
				if (strpos($img,"default")>0) $img = 'images/catalog/'.$_GET['id'];
				imagejpeg($Tmp, $img.'.jpg'); // сохраняем 
				imagedestroy($Image);
				imagedestroy($Tmp);
			}		
		}
		return $img;
	}
	
?>