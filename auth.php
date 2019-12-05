<?php
	if (isset($_POST['login']) && isset($_POST['password']))
	{	 
		if (!empty($_POST['login']) && !empty($_POST['password']))
		{
			$login = clearData($_POST['login']);
			$password = clearData($_POST['password']);    	
			$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
			$_SESSION['login'] = $login;
			$_SESSION['catalog'] = array(array());
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			exit;
		}
		else echo "<font color=red>Заполните все поля!</font>";
	}
?>
<div class="index-text-1">Вход в систему</div>		
<div class="article">
	<form method="POST">
		<p>Логин:<input type="text" name="login" style="margin-left:20px;"></p>
		<p>Пароль:<input type="password" name="password" style="margin-left:10px;"></p>
		<p><input type="submit" value="Авторизоваться" id="submit"></p>
	</form>
</div>
