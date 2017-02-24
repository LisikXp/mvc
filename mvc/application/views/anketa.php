<?php
require_once $_SERVER['DOCUMENT_ROOT']. "/application/views/config/functions.php";

if(isset($_POST['send'])){
	$user_main['last_name'] = $_POST['last_name'];
	$user_main['first_name'] = $_POST['first_name'];
	$user_main['second_name'] = $_POST['second_name'];
	$user_main['birthday'] = $_POST['birthday'];
	$user_main['city'] = $_POST['city'];
	$user_main['country'] = $_POST['country'];
	$user_main['phone'] = $_POST['phone'];
	$user_main['email'] = $_POST['email'];
/*	echo "<pre>";
	print_r($user_main);
	echo "</pre>";*/
	$user_educat['vyz'] = $_POST['vyz'];
	$user_educat['faculty'] = $_POST['faculty'];
	$user_educat['form_training'] = $_POST['form_training'];
	$user_educat['status'] = $_POST['status'];
	$user_educat['release_year'] = $_POST['release_year'];
	/*echo "<pre>";
	print_r($user_educat);
	echo "</pre>";*/
	$user_job['workplace'] = $_POST['workplace'];
	$user_job['thepost'] = $_POST['thepost'];
	$user_job['workcity'] = $_POST['workcity'];
	$user_job['year_start_working'] = $_POST['year_start_working'];
	$user_job['year_graduation_work'] = $_POST['year_graduation_work'];
/*	echo "<pre>";
	print_r($user_job);
	echo "</pre>";*/
	$user_lang['pl_lang'] = $_POST['pl_lang'];
	$user_lang['en_lang'] = $_POST['en_lang'];
/*	echo "<pre>";
	print_r($user_lang);
	echo "</pre>";*/
	$user_other['gender'] = $_POST['gender'];
	$user_other['family_status'] = $_POST['family_status'];
	$user_other['polviza'] = $_POST['radio-test'];
	$user_other['vodicka_ID'] = $_POST['vodicka_ID'];
	$user_other['alltext'] = $_POST['alltext'];
	$user_other['messeg'] = $_POST['messeg'];
	$user_email = $_POST['email'];
/*	echo "<pre>";
	print_r($user_other);
	echo "</pre>";*/

	$pub = '123456';
	//конвертируем массив в строку
	$user_main_serial = serialize($user_main);
	$user_educat_serial = serialize($user_educat);
	$user_job_serial = serialize($user_job);
	$user_lang_serial = serialize($user_lang);
	$user_other_serial = serialize($user_other);
	// шифруем строку
	$user_main_tab = encode($user_main_serial, $pub);
	$user_educat_tab = encode($user_educat_serial, $pub);
	$user_job_tab = encode($user_job_serial, $pub);
	$user_lang_tab = encode($user_lang_serial, $pub);
	$user_other_tab = encode($user_other_serial, $pub);


	$sql_res = mysql_query("SELECT * FROM anketa WHERE email='$user_email'");
			 if(mysql_num_rows($sql_res) != 0 ){ // ==> Если пользователь с такими данными существует
			 	//echo  "Пользователь с такой почтой уже существует!";
			 	?>
			 	<script type="text/javascript">
			 		alert("Пользователь с такой почтой уже существует!");
			 	</script>
			 	<?php 
			 	

			 }else{
			 	mysql_query("INSERT INTO anketa SET main_info ='$user_main_tab', 
			 		education = '$user_educat_tab', 
			 		jobs = '$user_job_tab', 
			 		lang = '$user_lang_tab', 
			 		other = '$user_other_tab',
			 		status = 'inline',
			 		agent = 'Albert Einstein',
                            email = '$user_email'"); // => Делаем запись в таблицу
			 	header('location: anketasave?user='.$user_email); exit;

			 }

			 mysql_close();
			}

			?>

			<!DOCTYPE html>
			<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
			<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
			<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
			<!--[if gt IE 8]><!-->
			<html lang="ru">
			<!--<![endif]-->
			<head>
				<meta charset="utf-8" />
				<title>Анкета для працевлаштування у Польщі</title>
				<meta name="description" content="" />
				<meta http-equiv="X-UA-Compatible" content="IE=edge" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<link rel="shortcut icon" href="favicon.png" />
				<link rel="stylesheet" href="/libs/bootstrap/bootstrap-grid-3.3.1.min.css" />
				<link rel="stylesheet" href="/libs/font-awesome-4.2.0/css/font-awesome.min.css" />
				<link rel="stylesheet" href="/libs/owl-carousel/owl.carousel.css" />
				<link rel="stylesheet" href="/libs/countdown/jquery.countdown.css" />
				<link rel="stylesheet" href="/css/fonts.css" />
				<link rel="stylesheet" href="/css/main.css" />
				<link rel="stylesheet" href="/css/media.css" />
			</head>
			<body>
				<header class="header">
					<div class="wrapper mask">
						<div class="container">
							<div class="row">
								<div class="anketa_logo col-md-12 col-lg-12">
									<h1>LOGO</h1>
								</div>
								<div class="anketa_info col-md-12 col-lg-12">
									<div class="anketa_info_first">Анкета для працевлаштування у Польщі</div>
									<div class="anketa_info_second">Заповніть анкету та ми знайдемо Вам роботу для душі!</div>
								</div>
							</div>
						</div>
					</div>
				</header>
				<section>
					<div class="wrapper">
						<div class="container">
							<div class="row">
								<div class="anketa_main_form col-lg-12">
									<form id="main_form" action="" method="POST">
										<div class="anketa_name_form">Головна інформація</div>
										<div>
											<div class="first_row">
												<label>Призвище<b>*</b></label>
												<br>
												<input type="text" name="last_name" required placeholder="Призвище">
											</div>
											<div class="first_row">
												<label>Ім'я<b>*</b></label>
												<br>
												<input type="text" name="first_name" required placeholder="Ім'я">
											</div>
											<div class="first_row">
												<label>По батькові<b>*</b></label>
												<br>
												<input type="text" name="second_name" required placeholder="По батькові">
											</div>
											<div class="first_row">
												<label>Дата народження<b>*</b></label>
												<br>
												<input type="text" name="birthday" required placeholder="Наприклад 01.01.2000">
											</div>
											<div class="second_row">
												<label>Місто проживання<b>*</b></label>
												<br>
												<input type="text" name="city" required placeholder="Місто">
											</div>
											<div class="second_row">
												<label>Країна проживання<b>*</b></label>
												<br>
												<input type="text" name="country" required placeholder="Країна">
											</div>
											<div class="second_row">
												<label>Контактний телефон<b>*</b></label>
												<br>
												<input type="text" name="phone" required placeholder="Номер телефону">
											</div>
										</div>
										<div class="anketa_name_form">Освіта та спеціальність</div>
										<div id="education">
											<div id="education[1]">
												<div class="dig_row">
													<label>Навчальний заклад</label>
													<br>
													<input type="text" name="vyz[1]" placeholder="Назва навчального закладу">
												</div>
												<div class="dig_row">
													<label>Факультет</label>
													<br>
													<input type="text" name="faculty[1]" placeholder="Факультет">
												</div>
												<div class="second_row">
													<label>Форма навчання</label>
													<br>
													<div class="select-field">
														<select name="form_training[1]">
															<option value="Не обрано">Не обрано</option>
															<option value="Очна">Очна</option>
															<option value="Очно-заочна">Очно-заочна</option>
															<option value="Заочна">Заочна</option>
															<option value="Екстернат">Екстернат</option>
															<option value="Дистанційна">Дистанційна</option>
														</select>
													</div>
												</div>
												<div class="second_row">
													<label>Статус</label>
													<br>
													<div class="select-field">
														<select name="status[1]">
															<option value="Не обрано">Не обрано</option>
															<option value="Абітурієнт">Абітурієнт</option>
															<option value="Студент (спеціаліст)">Студент (спеціаліст)</option>
															<option value="Студент (бакалавр)">Студент (бакалавр)</option>
															<option value="Студент (магістр)">Студент (магістр)</option>
															<option value="Випускник (спеціаліст)">Випускник (спеціаліст)</option>
															<option value="Випускник (бакалавр)">Випускник (бакалавр)</option>
															<option value="Випускник (магістр)">Випускник (магістр)</option>
														</select>
													</div>
												</div>
												<div class="second_row">
													<label>Рік випуску</label>
													<br>
													<input type="text" name="release_year[1]" placeholder="Не вказано">
												</div>
												<span id = "education_delete_first">Видалити</span>
											</div>
										</div>
										<span id="education_add"><i class="fa fa-plus" aria-hidden="true"></i>
											Додати ще один навчальний заклад</span>

											<div class="anketa_name_form">Кар'єра </div>
											<div id="job">
												<div id="job[1]">
													<div class="dig_row">
														<label>Місце роботи</label>
														<br>
														<input type="text" name="workplace[1]" placeholder="Місце роботи">
													</div>
													<div class="dig_row">
														<label>Посада</label>
														<br>
														<input type="text" name="thepost[1]" placeholder="Посада">
													</div>
													<div class="second_row">
														<label>Місто</label>
														<br>
														<input type="text" name="workcity[1]" placeholder="Місто">
													</div>
													<div class="second_row">
														<label>Рік початку роботи</label>
														<br>
														<input type="text" name="year_start_working[1]" placeholder="Рік початку роботи">
													</div>
													<div class="second_row">
														<label>Рік закінчення роботи</label>
														<br>
														<input type="text" name="year_graduation_work[1]" placeholder="Рік закінення роботи">
													</div>
													<span id="job_delete_first">Видалити</span>
												</div>
											</div>
											<span id="job_add"><i class="fa fa-plus" aria-hidden="true"></i>
												Додати ще одне місце роботи</span>
												<div class="anketa_name_form">Іноземні мови</div>
												<div id="lang">
													<div class="langpl">
														<h4>Рівень знання польскої мови<b>*</b></h4>
														<label class="rad">
															<input type="radio" name="pl_lang" required value="Не знаю">
															<span class="radio-custom"></span>
															<span class="label">Не знаю</span>
														</label><br>
														<label class="rad">
															<input type="radio" name="pl_lang" required value="Початковий(базовий)"><span class="radio-custom"></span>
															<span class="label">Початковий (базовий)</span>
														</label><br>
														<label class="rad">
															<input type="radio" name="pl_lang" required value="Середній">
															<span class="radio-custom"></span>
															<span class="label">Середній</span>
														</label><br>
														<label class="rad">
															<input type="radio" name="pl_lang" required value="Добрий">
															<span class="radio-custom"></span>
															<span class="label">Добрий</span>
														</label><br>
														<label class="rad">
															<input type="radio" name="pl_lang" required value="Вільно володію"><span class="radio-custom"></span>
															<span class="label">Вільно володію</span>
														</label><br>
													</div>
													<div class="langen">
														<h4>Рівень знання англійскої мови<b>*</b></h4>
														<label class="rad">
															<input type="radio" name="en_lang" required value="Не знаю">
															<span class="radio-custom"></span>
															<span class="label">Не знаю</span>
														</label><br>
														<label class="rad">
															<input type="radio" name="en_lang" required value="Початковий(базовий)"><span class="radio-custom"></span>
															<span class="label">Початковий (базовий)</span>
														</label><br>
														<label class="rad">
															<input type="radio" name="en_lang" required value="Середній">
															<span class="radio-custom"></span>
															<span class="label">Середній</span>
														</label><br>
														<label class="rad">
															<input type="radio" name="en_lang" required value="Добрий">
															<span class="radio-custom"></span>
															<span class="label">Добрий</span>
														</label><br>
														<label class="rad">
															<input type="radio" name="en_lang" required value="Вільно володію"><span class="radio-custom"></span>
															<span class="label">Вільно володію</span>
														</label><br>
													</div>
												</div>
												<div class="anketa_name_form">Інше</div>
												<div class="dig_row">
													<label>Стать<b>*</b></label>
													<br>
													<div class="select-gender">
														<select name="gender" required>
															<option value="Не обрано">Не обрано</option>
															<option value="Чоловіча">Чоловіча</option>
															<option value="Жіноча">Жіноча</option>
														</select>
													</div>
												</div>
												<div class="dig_row">
													<label>Сімейний стан</label>
													<br>
													<input type="text" name="family_status" placeholder="Не обрано">
												</div>
												<div class="dig_row">
													<label>Чи є у Вас відкрита польска віза категорії D?</label>
													<br>
													<div class="radbox">
														<label class="rad">
															<input class="radio" type="radio" name="radio-test" value="Так">
															<span class="radio-custom"></span>
															<span class="label">Так</span>
														</label><br>
														<label class="rad">
															<input class="radio" type="radio" name="radio-test" value="Ні">
															<span class="radio-custom"></span>
															<span class="label">Ні</span>
														</label>
													</div>
												</div>
												<div class="dig_row">
													<label>Наявність водійского посвідчення(Категорії)</label>
													<br>
													<input type="text" name="vodicka_ID" placeholder="Наприклад:B">
												</div>

												<div class="dig_row">
													<label>Побажання щодо роботи</label>
													<br>
													<textarea name="alltext" placeholder="Вільний текст"></textarea>
													
												</div>
												<div class="dig_row">
													<label>Повідомлення</label>
													<br>
													<textarea name="messeg" placeholder="Вільний текст"></textarea>
													
												</div>
												<hr>
												<div class="send" id="send">
													<input type="email" name="email" placeholder="Ваша адреса електронної пошти">
													<input type="submit" name="send" value="Надіслати"> 

												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</section>
						<footer>
							<div class="footer col-lg-12">Footer</div>
						</footer>


	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
	<script src="/libs/jquery/jquery-3.1.1.min.js"></script>

	<script src="/js/common.js"></script>


	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>