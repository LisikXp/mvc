<?php 
define("userfile", "admin_anketa");
include_once "db.php"; // => Подключаемся к бае-данных
$object = new Database();
$object -> connectToDb();
session_start(); // ======> Запускаем сессию

function authorization($email, $password) {
    // Инициализируем переменную с возможным сообщением об ошибке
	$error = '';
    $email = $_POST['email']; // Значение формы [ login ]
    $password = $_POST['password']; // Значение формы [ password ]
    // Если отсутствует строка с логином, возвращаем сообщение об ошибке
    if(!$email) {
    	$error = 'Не указан логин';
    	return $error;
    } 
    elseif(!$password) {
    	$error = 'Не указан пароль';
    	return $error;
    }

    $sql_res = mysql_query("SELECT * FROM users WHERE email='$email'") or die(mysql_error()); // ===> Ищем в таблице
    // Если пользователя с такими данными нет, возвращаем сообщение об ошибке
    if(mysql_num_rows($sql_res) != 0 ){ // ===> Если запись есть
    	$arr = mysql_fetch_assoc($sql_res);
        if($arr['password'] === md5($password)){ // > Если пароль введён верный
            $_SESSION['id'] = $arr['id'];// ======> Записываем значение id в сессию
            $_SESSION['role'] = $arr['role'];
            $_SESSION['name'] = $arr['name']; 
            $id = $_SESSION['id']; // ======> Присваеваем в переменную $id
           /* if ($arr['role'] == 'Admin') { //проверяем права пользователей
                header('location:'. userfile);// если админ значит в админку
            }else{
                 header('location: portfolio?id='.$id);//если пользователь значит на страницу пользователя
             }*/
             header('location:'. userfile);
        }else{ // > Иначе
        	$error = "Неверный email и/или пароль!";  return $error;
        }
    } else{
    	$error = "Пользователь не найден!";
    	return $error;
           } // =======> Выводим сообщение

    // Не забываем закрывать соединение с базой данных
           $object -> closeconnect();

    // Возвращаем true для сообщения об успешной авторизации пользователя <?php  loguot();
           return true;
       }

       function loguot(){
        session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['role']);
        unset($_SESSION['name']);
        header('location:login');
        exit;
    }

    /**
    * 
    */
    class Select
    {

        function getRecordByAgent($agent_name){

            $sql_res = mysql_query("SELECT * FROM anketa WHERE agent ='$agent_name'");
            $data = mysql_fetch_array($sql_res);
            return $data;
        }

        function getAllData(){

            $sql_res = mysql_query("SELECT * FROM anketa");
            
            for($i=0; $i < mysql_num_rows($sql_res); $i++){
                $data[$i] = mysql_fetch_array($sql_res);
            }
            return $data;
        }

    }

    function encode($unencoded,$key){//Шифруем
$string=base64_encode($unencoded);//Переводим в base64

$arr=array();//Это массив
$x=0;
while ($x++< strlen($string)) {//Цикл
$arr[$x-1] = md5(md5($key.$string[$x-1]).$key);//Почти чистый md5
$newstr = $newstr.$arr[$x-1][3].$arr[$x-1][6].$arr[$x-1][1].$arr[$x-1][2];//Склеиваем символы
}
return $newstr;//Вертаем строку
}

function decode($encoded, $key){//расшифровываем
$strofsym='qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM=-+*%$^&#@?:.,.,;/|\{}[]<>()"';//Символы, с которых состоит base64-ключ
$x=0;
while ($x++<= strlen($strofsym)) {//Цикл
$tmp = md5(md5($key.$strofsym[$x-1]).$key);//Хеш, который соответствует символу, на который его заменят.
$encoded = str_replace($tmp[3].$tmp[6].$tmp[1].$tmp[2], $strofsym[$x-1], $encoded);//Заменяем №3,6,1,2 из хеша на символ
}
return base64_decode($encoded);//Вертаем расшифрованную строку
}



?>
