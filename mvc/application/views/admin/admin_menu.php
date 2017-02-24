<?php

if($_SESSION['role'] == 'Super Admin'){ ?>

<ul class="main_right_menu">
	<li><a href="dashboard">
		<div class="menu-padding">
			<span class="icon icon-icon-dashboard">
			</span>
			<span class="icon-text">Дашборд</span>
		</div>
	</a>
</li>
<li>
	<a href="agent">
		<div class="menu-padding">
			<span class="icon icon-icon-agents">
			</span>
			<span class="icon-text">Агенти</span>
		</div>
	</a>
</li>
<li>
	<a href="admin_anketa">
		<div class="menu-padding">
			<span class="icon icon-icon-people">
			</span>
			<span class="icon-text">Анкети</span>
		</div>
	</a>
</li>
<li>
	<a href="#">
		<div class="menu-padding">
			<span class="icon icon-icon-vacancy">
			</span>
			<span class="icon-text">Вакансії</span>
		</div>
	</a>
</li>
<li><a href="#">
	<div class="menu-padding">
		<span class="icon icon-icon-customers">
		</span>

		<span class="icon-text">Клієнти</span>
	</div>
</a>
</li>
<li><a href="#">
	<div class="menu-padding">
		<span class="icon icon-icon-stats">
		</span>
		<span class="icon-text">Статистика</span>
	</div>
</a>
</li>
</ul>

<?php } else{ ?>
<ul class="main_right_menu">
	<li>
		<a href="agent">
			<div class="menu-padding">
				<span class="icon icon-icon-agents">
				</span>
				<span class="icon-text">Агенти</span>
			</div>
		</a>
	</li>
	<li>
		<a href="admin_anketa">
			<div class="menu-padding">
				<span class="icon icon-icon-people">
				</span>
				<span class="icon-text">Анкети</span>
			</div>
		</a>
	</li>
</ul>

<?php } ?>

