<?php

require_once $_SERVER['DOCUMENT_ROOT']. "/application/views/config/functions.php";
if(isset($_SESSION['id'])){header('location:'.userfile);} 
// Если авторизирован - выполняем переход
// Заранее инициализируем переменную авторизации, присвоив ей ложное значение
$auth = false;

//telegram - webhook
/*$botToken = "333264543:AAGvZpLbpsmBO6OtK1inqHTE3zGMI-SVuos";
$website = "https://api.telegram.org/bot".$botToken;

$update = file_get_contents("php://input");
$updates = json_decode($update, TRUE);
$text = $updates["message"]["text"];
$chat_id = $updates["message"]["chat"]["id"];
sendMessage($chat_id, $text);
function sendMessage($chatID, $message){
	$url = "https://api.telegram.org/bot333264543:AAGvZpLbpsmBO6OtK1inqHTE3zGMI-SVuos/sendMessage?chat_id=".$chat_id."&text=".$message;
	file_get_contents($url);
}
*/
// telegram bot
/*$update = file_get_contents("https://api.telegram.org/bot333264543:AAGvZpLbpsmBO6OtK1inqHTE3zGMI-SVuos/getUpdates");
$updates = json_decode($update, TRUE);
//print_r($updates);
$ind = count($updates['result']);
$text = $updates['result'][$ind-1]["message"]["text"];
$chat_id = $updates['result'][$ind-1]["message"]["chat"]["id"];

file_get_contents("https://api.telegram.org/bot333264543:AAGvZpLbpsmBO6OtK1inqHTE3zGMI-SVuos/sendMessage?chat_id=".$chat_id."&text=".$text);*/


// Если была нажата кнопка авторизации
if(isset($_POST['submit'])) {
	// Делаем массив сообщений об ошибках пустым
	$errors['email'] = $errors['password'] = $errors['password_again'] = '';
	
	// С помощью стандартной функции trim() удалим лишние пробелы
	// из введенных пользователем данных
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	// Авторизуем пользователя
	// Вызываем функцию регистрации, её результат записываем в переменную
	$auth = authorization($email, $password);
	
	// Если авторизация прошла успешно, сообщаем об этом пользователю
	// И создаем заголовок страницы, который выполнит переадресацию на защищенную
	// от общего доступа страницу
	if($auth === true) {
		$id = $_SESSION['id']; //  id Пользователя
		//header('location:/Admin/'. userfile);
	}
	// Иначе сообщаем пользователю об ошибке
	else {
		$errors['full_error'] = $auth;
	}
}

?>
<html>
<head>
	<title>Авторизация пользователей</title>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type" />

	<script src="/libs/jquery/jquery-3.1.1.min.js"></script>

	<script src="/js/common.js"></script>
	<script>
		window.onload = function() {
			document.getElementById('email').ontextInput = function() {
				alert(this.data);
			},
			focus = function() {
				alert("ok");
			}
			;
		};
	</script>
</head>
<body>
	<?
// Если запущен процесс авторизации, но она не была успешной,
// или же авторизация еще не запущена, отображаем форму авторизации
	if($auth !== true) {
		?>
		<!-- Блок для вывода сообщений об ошибках -->
		<div id="full_error" class="error" style="display:
		<?
		echo $errors['full_error'] ? 'inline-block' : 'none';
		?>
		;">
		<?
	// Выводим сообщение об ошибке, если оно есть
		echo $errors['full_error'] ? $errors['full_error'] : '';
		?>
	</div>
	<form action="" method="post">
		<div class="row">
			<label for="login">Ваш логин:</label>
			<input type="email" class="text" name="email" id="email" />
		</div>
		<div class="row">
			<label for="password">Ваш пароль:</label>
			<input type="password" class="text" name="password" id="password" />
		</div>
		<div class="row">
			<input type="submit" name="submit" id="btn-submit" value="Авторизоваться" />
		</div>
	</form>
	<button id="telid" name="telid">telegram</button>
	<div class="box">hh</div>
	<?
}	// Закрывающая фигурная скобка условного оператора проверки успешной авторизации
// Иначе выводим сообщение об успешной авторизации
else {
	print $message;
}

/**
  * Если всё правильно, будет выведено сообщение об успешной авторизации,
  * пользователь будет переадресован на защищенную страницу
  */
?>
</body>
</html>
