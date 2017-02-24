<?php require_once "header_admin.php"; ?>

<body>

	<header>
		<div class="wrapper">
			<div class="container-fluid">
				<div class="top_logo col-lg-2">
					Датабейс
				</div>
				<div class="top_header col-lg-10">
					<div class="admin_logo_info">
						<span class="iconlg icon-icon-people"></span>
						<label>Анкети</label>
						<button onclick="document.location = 'anketa';" class="add_anketa add_button"><i class="fa fa-plus" aria-hidden="true"></i>Додати</button>
					</div>
					<!-- добавляем пользователя в header -->
					<?php require_once "header_user.php"; ?>

				</div>
			</div>
		</div>
	</header>
	<section>
		<div class="wrapper">
			<div class="container-fluid">
				<div class="right_menu col-lg-2">

					<!-- добавляем меню -->

					<?php require_once "admin_menu.php";?>
					
				</div>
				<div class="main_info col-lg-10">
					<?php 	
					if($_SESSION['role'] == 'Super Admin'){
						$sql_res = mysql_query("SELECT * FROM anketa") or die(mysql_error());
					}else{
						$agent_name = $_SESSION['name'];
						$sql_res = mysql_query("SELECT * FROM anketa WHERE agent ='$agent_name'") or die(mysql_error());
					}
					$pub = '123456';
					$result = mysql_num_rows($sql_res); ?>
					<div class="tabs">
						<ul>
							<li>Усі анкети (<?=$result;?>)</li>
							<li>У черзі</li>
							<li>Відправлені</li>
							<li>Не активні</li>
						</ul>
						<div>

							<div class="main_table">
								<table> 
									<tr>
										<th></th>
										<th></th>
										<th>Ім'я</th>
										<th>Статус</th>
										<th>Вік</th>
										<th>Місто</th>
										<th>Телефон</th>
										<th>Пошта</th>
										<th>Агент</th>
									</tr>
									<?php

									for ($j=0; $j < $result ; $j++) { 
										$arr = mysql_fetch_assoc($sql_res);
										$user_info = unserialize(decode($arr['main_info'], $pub));
										$user_educat_bd = explode('.', $user_info['birthday']);
										$user_year = (date("Y") - $user_educat_bd['2']);
										$user_other = unserialize(decode($arr['other'], $pub));
										if ($user_other['gender'] == "Чоловіча") {
											$user_img = "img/icon-user-man.png";
										}
										else{
											$user_img = "img/icon-user-woman.png";
										}
										?>
										<tr onclick="document.location = 'anketasave?user=<?php echo $user_info['email'];?>';">
											<td>
												<label>
													<input class="chek_table" type="checkbox" name="chek_table" hidden>
													<span>
													</span>
												</label>
											</td>
											<td><img class="users_ava" src="<?php echo $user_img ; ?>"></td>
											<td><?php echo $user_info['last_name'] .' '. $user_info['first_name'] .' '. $user_info['second_name'];?></td>
											<td id="name"><?php echo $arr['status']; ?></td>
											<td id="name"><?php echo $user_year ;?></td>
											<td id="posit"><?php echo $user_info['city'] .', '. $user_info['country']; ?></td>
											<td><?php echo $user_info['phone'];?></td>
											<td id="skills"><?php echo $user_info['email'];?></td>
											<td id="skills"><?php echo $arr['agent']; ?></td>
										</tr>
										<?php } ?>

									</table>
								</div>
								<div class="main_table">

								</div>

								<div class="main_table">

								</div>

							</div>
						</div>

					</div>
				</div>
			</div>
		</section>


	<!--[if lt IE 9]>
	<script src="libs/html5shiv/es5-shim.min.js"></script>
	<script src="libs/html5shiv/html5shiv.min.js"></script>
	<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
	<script src="libs/respond/respond.min.js"></script>
	<![endif]-->
	
	<!--<script src="libs/jquery-mousewheel/jquery.mousewheel.min.js"></script>
	<script src="libs/fancybox/jquery.fancybox.pack.js"></script>
	<script src="libs/waypoints/waypoints-1.6.2.min.js"></script>
	<script src="libs/scrollto/jquery.scrollTo.min.js"></script>
	<script src="libs/owl-carousel/owl.carousel.min.js"></script>
	<script src="libs/countdown/jquery.plugin.js"></script>
	<script src="libs/countdown/jquery.countdown.min.js"></script>
	<script src="libs/countdown/jquery.countdown-ru.js"></script>
	<script src="libs/landing-nav/navigation.js"></script>-->
	<script src="js/common.js"></script>
	
	<!-- Yandex.Metrika counter --><!-- /Yandex.Metrika counter -->
	<!-- Google Analytics counter --><!-- /Google Analytics counter -->
</body>
</html>