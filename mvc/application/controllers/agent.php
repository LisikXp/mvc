<?php
class Agent extends Controller {
	public function __construct() {
		parent::__construct();
		$this->view->render('admin/agent');
	}
	public function index() {
		//echo 'INSIDE INDEX INDEX';
	}
}
?>