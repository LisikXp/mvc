<?php
require_once $_SERVER['DOCUMENT_ROOT']. "/application/views/config/functions.php";
$email = $_GET['user'];
$pub = '123456';
$sql_res = mysql_query("SELECT * FROM anketa WHERE email='$email'");
if(mysql_num_rows($sql_res) != 0 ){ // ==> Если пользователь с такими данными существует
	$arr = mysql_fetch_assoc($sql_res);
	//дешифруем нашу строку и конвертируем ее обратно в массив
	$user_info = unserialize(decode($arr['main_info'], $pub));
	$user_educat = unserialize(decode($arr['education'], $pub));
	print_r(decode($arr['education'], $pub));
	$user_job = unserialize(decode($arr['jobs'], $pub));
	$user_lang = unserialize(decode($arr['lang'], $pub));
	$user_other = unserialize(decode($arr['other'],$pub));
	

	//print_r($user_other);
		// выводим наши массивы в строку, а затем обратно в массив для последовательного отображения индекса -> 0,1,2,3 если изначально они расположены в произвольном порядке!!!!!
	$user_new_educat = implode(",", $user_educat['vyz']);
	$user_educat_vyz = explode(',', $user_new_educat);

	$user_new_educat_faculty = implode(",", $user_educat['faculty']);
	$user_educat_faculty = explode(',', $user_new_educat_faculty);

	$user_new_educat_training = implode(",", $user_educat['form_training']);
	$user_educat_form_training = explode(',', $user_new_educat_training);

	$user_new_educat_status = implode(",", $user_educat['status']);
	$user_educat_status = explode(',', $user_new_educat_status);

	$user_new_educat_release = implode(",", $user_educat['release_year']);
	$user_educat_release = explode(',', $user_new_educat_release);

	//тоже самое только с работой
	$user_new_job = implode(",", $user_job['workplace']);
	$user_job_workplace = explode(',', $user_new_job);

	$user_new_job_thepost = implode(",", $user_job['thepost']);
	$user_job_thepost = explode(',', $user_new_job_thepost);

	$user_new_job_workcity = implode(",", $user_job['workcity']);
	$user_job_workcity = explode(',', $user_new_job_workcity);

	$user_new_job_start_working = implode(",", $user_job['year_start_working']);
	$user_job_start_working = explode(',', $user_new_job_start_working);

	$user_new_job_graduation_work = implode(",", $user_job['year_graduation_work']);
	$user_job_graduation_work = explode(',', $user_new_job_graduation_work);

}else{


}
mysql_close();

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
	<link rel="stylesheet" href="/libs/fancybox/jquery.fancybox.css" />
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
						<div class="anketa_send_logo">Дякуємо, анкета відправлена!</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="wrapper">
			<div class="container">
				<div class="row">
					<div class="anketa_send_main_form col-lg-12">

						<div class="anketa_name_form">Головна інформація</div>
						<div class="main_info">
							<div class="main_info_text"><?php echo $user_info['last_name'] .' '. $user_info['first_name'] .' '. $user_info['second_name'];  ?></div>
							<p>Дата народження: <?php echo $user_info['birthday'];  ?></p>
							<p><?php echo $user_info['country'] .', '. $user_info['city'];  ?></p>
							<p><?php echo $user_info['phone'];  ?></p>
							<p><?php echo $user_info['email'];  ?></p>
						</div>

						<div class="anketa_name_form">Освіта та спеціальність</div>
						<div class="main_info">
							<?php 
							$rows = count($user_educat_vyz);
							for ($j=0; $j < $rows; $j++) {
								?>
								<div class="main_info_text"><?php echo $user_educat_vyz[$j]; ?></div>
								<p><?php echo $user_educat_faculty[$j] .', '. $user_educat_form_training[$j] .', '. $user_educat_status[$j] .', '. $user_educat_release[$j]; ?></p>
								<?php }?>
							</div>

							<div class="anketa_name_form">Кар'єра</div>
							<div class="main_info">
								<?php 
								$row = count($user_job_workplace);
								for ($p=0; $p < $row; $p++) {
									?>
									<div class="main_info_text"><?php echo $user_job_workplace[$p] .', '. $user_job_thepost[$p]; ?></div>
									<p><?php echo $user_job_workcity[$p] .', '.  $user_job_start_working[$p] .', '. $user_job_graduation_work[$p];?></p>
									<?php } ?>
								</div>

								<div class="anketa_name_form">Іноземні мови</div>
								<div class="main_info">
									<div class="main_info_text">Польска мова</div>
									<p><?= $user_lang['pl_lang'];?></p>
									<div class="main_info_text">Англійська мова</div>
									<p><?= $user_lang['en_lang'];?></p>
								</div>

								<div class="anketa_name_form">Інше</div>
								<div class="main_info col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="main_info_text">Стать:</div>
									<p><?= $user_other['gender'];?></p>
								</div>
								<div class="main_info col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="main_info_text">Сімейний стан:</div>
									<p><?= $user_other['family_status'];?></p>
								</div>
								<div class="main_info col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="main_info_text">Віза категоріі D:</div>
									<p><?= $user_other['polviza'];?></p>
								</div>
								<div class="main_info col-xs-12 col-sm-6 col-md-3 col-lg-3">
									<div class="main_info_text">Посвідчення водія:</div>
									<p><?= $user_other['vodicka_ID'];?></p>
								</div>
								<div class="main_info col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="main_info_text">Побажання щодо роботи:</div>
									<p class="alltext"><?= $user_other['alltext'];?></p>
								</div>
								<div class="main_info col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="main_info_text">Повідомлення</div>
									<p class="alltext"><?= $user_other['messeg'];?></p>
								</div>

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
