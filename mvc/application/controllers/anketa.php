<?php
class Anketa extends Controller{

	public function __construct() {
		//echo "Мы в контроллере anketa";
		parent::__construct();
		$this->view->render('anketa');

	}
}
?>