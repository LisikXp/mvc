<?php 
require_once $_SERVER['DOCUMENT_ROOT']. "/application/views/config/functions.php";
if(!isset($_SESSION['id'])){header('location:login');} 
$data = new Select();
$agent_name = $_SESSION['name'];
$res = $data -> getAllData();
/*
echo $A = gmp_pow("5", 6985)% 238696135 . "<br/>";

$str = 'This is an encoded string';
echo $F = base64_encode($str);
echo base64_decode($F);*/
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
	<link rel="stylesheet" href="/css_admin/fonts.css" />
	<link rel="stylesheet" href="/css_admin/main.css" />
	<link rel="stylesheet" href="/css_admin/media.css" />
	<script src="/libs/jquery/jquery-3.1.1.min.js"></script>
	<script src="/js/common.js"></script>
</head>
<script>
	//Добавляем класс для кнопок Case и ALL, чтобы показать что они активны  
	$(function () {                                      
		$('.main_right_menu li a').each(function () {             
			var location = window.location.href; 
			var link = this.href;                
			if(location == link) {               
				$(this).addClass('right_menu_active'); 
				var ind = $(this).parent().index(); 
				$('.menu-padding:eq('+(ind)+')').addClass('menu_padd_active');  
				console.log($(this).parent().index());
			}

		});
	});	
</script>