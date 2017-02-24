
<?php
class Database{

	function connectToDb(){
	$db = mysql_connect("romatorb.mysql.ukraine.com.ua", "romatorb_uphtest", "huhk7j68"); // root - логин, 1234 - пароль к базе данных
mysql_select_db("romatorb_uphtest", $db); // test - имя базы данных
mysql_query("SET character_set_results = 'utf8', 
	character_set_client = 'utf8', 
	character_set_connection = 'utf8',
	character_set_database = 'utf8', 
	character_set_server = 'utf8'", $db);
}

function closeconnect(){
	msql_close();
}

}

?>