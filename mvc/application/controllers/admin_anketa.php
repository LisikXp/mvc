<?php
class Admin_anketa extends Controller {
	public function __construct() {
		parent::__construct();
		$this->view->render('admin/admin_anketa');
	}
	public function index() {
		//echo 'INSIDE INDEX INDEX';
	}
}
?>