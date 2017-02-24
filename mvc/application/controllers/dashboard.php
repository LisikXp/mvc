<?php
class Dashboard extends Controller {
	public function __construct() {
		parent::__construct();
		$this->view->render('admin/dashboard');
	}
	public function index() {
		//echo 'INSIDE INDEX INDEX';
	}
}
?>