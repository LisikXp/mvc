(function($){				
	jQuery.fn.lightTabs = function(options){
		
		var createTabs = function(){
			tabs = this;
			i = 0;
			
			showPage = function(i){
				$(tabs).children("div").children("div").hide();
				$(tabs).children("div").children("div").eq(i).show();
				$(tabs).children("ul").children("li").removeClass("tabs_active");
				$(tabs).children("ul").children("li").eq(i).addClass("tabs_active");
			}
			
			showPage(0);				
			
			$(tabs).children("ul").children("li").each(function(index, element){
				$(element).attr("data-page", i);
				i++;                        
			});
			
			$(tabs).children("ul").children("li").click(function(){
				showPage(parseInt($(this).attr("data-page")));
			});				
		};		
		return this.each(createTabs);
	};	
})(jQuery);

$(document).ready(function() {
	$(".tabs").lightTabs();
	//динамическое добавление и удаление для учебы
var countOfFields = 1; // Текущее число полей
var curFieldNameId = 1; // Уникальное значение для атрибута name
var maxFieldLimit = 10; // Максимальное число возможных полей
function deleteField(a) {
 // Получаем доступ к ДИВу, содержащему поле
 var contDiv = a.parentNode;
 // Удаляем этот ДИВ из DOM-дерева
 contDiv.parentNode.removeChild(contDiv);
 // Уменьшаем значение текущего числа полей
 countOfFields--;
 // Возвращаем false, чтобы не было перехода по сслыке
 if (countOfFields = 1) {
 	$('#education_delete_first').css('display','none');
 	$('#education_delete:eq(-0)').css('display','none');
 }
 return false;
}
function addField() {
 // Проверяем, не достигло ли число полей максимума
 if (countOfFields >= maxFieldLimit) {
 	alert("Число полей достигло своего максимума = " + maxFieldLimit);
 	return false;
 }

 if (countOfFields = 2) {
 	$('#education_delete_first').css('display','block');
 	$('#education_delete:eq(-0)').css('display','block');
 } 
 // Увеличиваем текущее значение числа полей
 countOfFields++;
 // Увеличиваем ID
 curFieldNameId++;
 // Создаем элемент ДИВ
 var div = document.createElement('div');
 div.setAttribute('id', 'education['+ curFieldNameId + ']');
 div.setAttribute('class', 'education')
 div.innerHTML = "<div class=\"dig_row\"><label>Навчальний заклад</label>\
 <br>\
 <input type=\"text\" name=\"vyz["+ curFieldNameId + "]\" placeholder=\"Назва навчального закладу\">\
 </div>\
 <div class=\"dig_row\">\
 <label>Факультет</label>\
 <br>\
 <input type=\"text\" name=\"faculty["+ curFieldNameId + "]\" placeholder=\"Факультет\">\
 </div>\
 <div class=\"second_row\">\
 <label>Форма навчання</label>\
 <br>\
 <div class=\"select-field\">\
 <select name=\"form_training["+ curFieldNameId + "]\">\
 <option value=\"Не обрано\">Не обрано</option>\
 <option value=\"Очна\">Очна</option>\
 <option value=\"Очно-заочна\">Очно-заочна</option>\
 <option value=\"Заочна\">Заочна</option>\
 <option value=\"Екстернат\">Екстернат</option>\
 <option value=\"Дистанційна\">Дистанційна</option>\
 </select>\
 </div>\
 </div>\
 <div class=\"second_row\">\
 <label>Статус</label>\
 <br>\
 <div class=\"select-field\">\
 <select name=\"status["+ curFieldNameId + "]\">\
 <option value=\"Не обрано\">Не обрано</option>\
 <option value=\"Абітурієнт\">Абітурієнт</option>\
 <option value=\"Студент (спеціаліст)\">Студент (спеціаліст)</option>\
 <option value=\"Студент (бакалавр)\">Студент (бакалавр)</option>\
 <option value=\"Студент (магістр)\">Студент (магістр)</option>\
 <option value=\"Випускник (спеціаліст)\">Випускник (спеціаліст)</option>\
 <option value=\"Випускник (бакалавр)\">Випускник (бакалавр)</option>\
 <option value=\"Випускник (магістр)\">Випускник (магістр)</option>\
 </select>\
 </div>\
 </div>\
 <div class=\"second_row\">\
 <label>Рік випуску</label>\
 <br>\
 <input type=\"text\" name=\"release_year["+ curFieldNameId + "]\" placeholder=\"Не вказано\">\
 </div><span id=\"education_delete\">Видалити</span>"
 // Добавляем новый узел в конец списка полей
 document.getElementById("education").appendChild(div);
 
 

 
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
$(document).on('click','#education_add', function() {
	addField();
});
$(document).on('click','#education_delete','#education_delete_first', function() {
	deleteField(this);
});
$(document).on('click','#education_delete_first', function() {
	deleteField(this);
});

//динамическое добавление и удаление для работы
var jobOfFields = 1; // Текущее число полей
var curjobdNameId = 1; // Уникальное значение для атрибута name
var maxjobFieldLimit = 10; // Максимальное число возможных полей
function deletejobField(a) {
 // Получаем доступ к ДИВу, содержащему поле
 var jobDiv = a.parentNode;
 // Удаляем этот ДИВ из DOM-дерева
 jobDiv.parentNode.removeChild(jobDiv);
 // Уменьшаем значение текущего числа полей
 jobOfFields--;
 if (jobOfFields = 1) {
 	$('#job_delete_first').css('display','none');
 	$('#job_delete_first:eq(-0)').css('display','none');
 }

 return false;
}
function addjobField() {
 // Проверяем, не достигло ли число полей максимума
 if (jobOfFields >= maxjobFieldLimit) {
 	alert("Число полей достигло своего максимума = " + maxjobFieldLimit);
 	return false;
 }

 if (jobOfFields = 2) {
 	$('#job_delete_first').css('display','block');
 	$('#job_delete_first:eq(-0)').css('display','block');
 }

 // Увеличиваем текущее значение числа полей
 jobOfFields++;
 curjobdNameId++;
 // Увеличиваем ID
 // Создаем элемент ДИВ
 var div = document.createElement('div');
 div.setAttribute('id', 'job['+ curjobdNameId + ']');
 div.setAttribute('class', 'job')
 div.innerHTML = "<div class=\"dig_row\">\
 <label>Місце роботи</label>\
 <br>\
 <input type=\"text\" name=\"workplace["+ curjobdNameId + "]\" placeholder=\"Місце роботи\">\
 </div>\
 <div class=\"dig_row\">\
 <label>Посада</label>\
 <br>\
 <input type=\"text\" name=\"thepost["+ curjobdNameId + "]\" placeholder=\"Посада\">\
 </div>\
 <div class=\"second_row\">\
 <label>Місто</label>\
 <br>\
 <input type=\"text\" name=\"workcity["+ curjobdNameId + "]\" placeholder=\"Місто\">\
 </div>\
 <div class=\"second_row\">\
 <label>Рік початку роботи</label>\
 <br>\
 <input type=\"text\" name=\"year_start_working["+ curjobdNameId + "]\" placeholder=\"Рік початку роботи\">\
 </div>\
 <div class=\"second_row\">\
 <label>Рік закінчення роботи</label>\
 <br>\
 <input type=\"text\" name=\"year_graduation_work["+ curjobdNameId + "]\" placeholder=\"Рік закінення роботи\">\
 </div>\
 <span id=\"job_delete\">Видалити</span>";
 // Добавляем новый узел в конец списка полей
/* var del_div = document.getElementById('education[1]');
del_div.innerHTML += '<a id = "education_delete" onclick= "return deleteField(this)" href=#>Видалити</a>';*/
document.getElementById("job").appendChild(div);
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
$(document).on('click','#job_add', function() {
	addjobField();
});
$(document).on('click','#job_delete', function() {
	deletejobField(this);
});
$(document).on('click','#job_delete_first', function() {
	deletejobField(this);
});

var drop = 0;

$(document).on('click','.dropdown', function() {
	if (drop ==0) {
		$('.dropdown-content').css('display','block');
		drop = 1;
	} else{
		$('.dropdown-content').css('display','none');
		drop = 0;
	}

});


	//Таймер обратного отсчета
	//Документация: http://keith-wood.name/countdown.html
	//<div class="countdown" date-time="2015-01-07"></div>
	/*var austDay = new Date($(".countdown").attr("date-time"));
	$(".countdown").countdown({until: austDay, format: 'yowdHMS'});

	//Попап менеджер FancyBox
	//Документация: http://fancybox.net/howto
	//<a class="fancybox"><img src="image.jpg" /></a>
	//<a class="fancybox" data-fancybox-group="group"><img src="image.jpg" /></a>
	$(".fancybox").fancybox();

	//Навигация по Landing Page
	//$(".top_mnu") - это верхняя панель со ссылками.
	//Ссылки вида <a href="#contacts">Контакты</a>
	$(".top_mnu").navigation();

	//Добавляет классы дочерним блокам .block для анимации
	//Документация: http://imakewebthings.com/jquery-waypoints/
	$(".block").waypoint(function(direction) {
		if (direction === "down") {
			$(".class").addClass("active");
		} else if (direction === "up") {
			$(".class").removeClass("deactive");
		};
	}, {offset: 100});

	//Плавный скролл до блока .div по клику на .scroll
	//Документация: https://github.com/flesler/jquery.scrollTo
	$("a.scroll").click(function() {
		$.scrollTo($(".div"), 800, {
			offset: -90
		});
	});

	//Каруселька
	//Документация: http://owlgraphic.com/owlcarousel/
	var owl = $(".carousel");
	owl.owlCarousel({
		items : 4
	});
	owl.on("mousewheel", ".owl-wrapper", function (e) {
		if (e.deltaY > 0) {
			owl.trigger("owl.prev");
		} else {
			owl.trigger("owl.next");
		}
		e.preventDefault();
	});
	$(".next_button").click(function(){
		owl.trigger("owl.next");
	});
	$(".prev_button").click(function(){
		owl.trigger("owl.prev");
	});

	//Кнопка "Наверх"
	//Документация:
	//http://api.jquery.com/scrolltop/
	//http://api.jquery.com/animate/
	$("#top").click(function () {
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});*/
	
	//Аякс отправка форм ----"https://s1.manybot.io/webhook/307345294/1f4635a777"
	//Документация: http://api.jquery.com/jquery.ajax/------Math.floor((Math.random() * 50000) + 45);


	$(document).on('click','#telid', function() {

		$.ajax({
			type: 'POST',
			url: 'https://api.telegram.org/bot307345294:AAEWQByNNjfc89I9_Wo_zmDq_nVduasLYHc/getUpdates',
			data: {

			},
			dataType: 'json',
			success: function(json) {
				var ind = ((json.result.length)-1);
				$('.box').html(json.result[ind].message.text);
				var chat_id = json.result[ind].message.chat.id;
				var ran_id = Math.floor((Math.random() * 50000) + 45);

				$.ajax({
					type: 'POST',
					url: 'https://api.telegram.org/bot307345294:AAEWQByNNjfc89I9_Wo_zmDq_nVduasLYHc/sendMessage?chat_id='+ chat_id +'&text='+ ran_id +'',
					data: {

					},
					dataType: 'json',
					success: function(json) {
						var ind = ((json.result.length)-1);
						$('.box').html(json.result[ind].message.chat.id);


					}
				});


			}
		});
	});
	

});