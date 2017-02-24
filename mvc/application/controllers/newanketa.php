<?php
class Newanketa extends Controller {
	public function __construct() {
		parent::__construct();
		$this->view->render('anketa');
	}
	public function index() {
		//echo 'INSIDE INDEX INDEX';
	}
}
?>