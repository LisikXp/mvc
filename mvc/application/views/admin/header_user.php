					<?php
					if(isset($_POST['exit'])){
						loguot();
					}
					$name = $_SESSION['name'];
					$role = $_SESSION['role'];

					$user_educ = explode(' ', $name);
					$mini_name = $user_educ[0][0] . $user_educ[1][0];

					?>
					<div class="top_user_info">
						<div class="serch"><i class="fa fa-search" aria-hidden="true"></i>
						</div>
						<div class="bell"><i class="fa fa-bell-o" aria-hidden="true"></i>
						</div>
						<div class="dropdown">
							<div class="user">
								<label class="user_name"><?php echo $name; ?></label>
								<label class="user_role"><?php echo $role; ?></label>
							</div>
							<div class="user_initials"><?php echo $mini_name; ?></div>
							<div class="down_mnu"><i class="fa fa-caret-down" aria-hidden="true"></i>
							</div>
							<div class="dropdown-content">
								<form action="" method="post">
									<input type="submit" name="exit" value="Вихід">
								</form>
							</div>
						</div>
					</div>