<?php 
require_once $_SERVER['DOCUMENT_ROOT']. "/application/views/config/functions.php";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Регистрация - Авторизация</title>
 
</head>

<body>
  <div style="text-align:center;
  margin-top:50px;">
  <?php 
  session_start();
  $id = $_SESSION['id'];
//if(isset($_SESSION['id'])){header('location:'.userfile);} // =====> Если авторизирован - выполняем переход
// => Cкрипт: Cообщения об ошибках
if(isset($_SESSION['msg'])){ //  Если есть ОШИБКА
    echo $_SESSION['msg']; // ВЫВОДИМ
    unset ($_SESSION['msg']);} 
// ======> Конец скрипта
// =======> ?>

<form action="" method="post">
  <button style="width:auto;
  padding:5px 15px 5px 15px;
  margin-left:50px;
  -moz-appearance:none;
  -webkit-appearance:none;
  -ms-appearance:none;
  appearance:none;
  background-color:#FFF;
  color:#666 !important;
  cursor:pointer;
  display:inline-block;
  font-size:24px;
  text-align:center;
  text-decoration:none;
  border:#999 1px solid;
  -moz-border-radius:5px 5px 5px 5px;
  -webkit-border-radius:5px 5px 5px 5px;
  -khtml-border-radius:5px 5px 5px 5px;
  border-radius:5px 5px 5px 5px;
  behavior:url(border-radius.htc);" name="avt" type="submit">Авторизация</button>
  <button style="width:auto;
  padding:5px 15px 5px 15px;
  margin-left:50px;
  -moz-appearance:none;
  -webkit-appearance:none;
  -ms-appearance:none;
  appearance:none;
  background-color:#FFF;
  color:#666 !important;
  cursor:pointer;
  display:inline-block;
  font-size:24px;
  text-align:center;
  text-decoration:none;
  border:#999 1px solid;
  -moz-border-radius:5px 5px 5px 5px;
  -webkit-border-radius:5px 5px 5px 5px;
  -khtml-border-radius:5px 5px 5px 5px;
  border-radius:5px 5px 5px 5px;
  behavior:url(border-radius.htc);" name="reg" type="submit">Регистрация</button>
</form>

<?php // <====
// =====> Cкрипт: Вывод форм РЕГИСТРАЦИЯ | АВТОРИЗАЦИЯ
if(isset($_POST['avt'])){header('location:login');} //  Если нажата АВТОРИЗАЦИЯ
if(isset($_POST['reg'])){include views. "registration";}  //  Если нажата РЕГИСТРАЦИЯ
?>
</div>
</body>
</html>