﻿<div class="article">
	<p><b>1)</b>Написать скрипт, "переворачивающий" заданную строку.Встроенную функцию strrev использовать нельзя.</p>
	<?php			
		$stroka = "Мама мыла раму";
		mb_internal_encoding("UTF-8");            // для того чтобы нормально выводило русские символы
		$len = mb_strlen($stroka);                // получаем длинну строки
		echo "<b>Исходная строка:</b> ".$stroka;
		echo "<br>";
		echo "<b>Перевернутая строка:</b> ";
		while ($len>=0){   // посимвольно выводим строку начиная с конца
			echo mb_substr ($stroka , $len,1);
			$len--; 
		}				
	?>
	<hr>
	<br>
	<p><b>2)</b>Описать функцию, имитирующую встроенную php-функцию Sort. Параметры: обрабатываемая переменная.</p>
	<?php 
		$arr = array("lemon", "orange", "banana", "apple"); // исходный массив
		userSort($arr);
	?>
</div>
