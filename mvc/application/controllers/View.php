<?php
class View {
 public function __construct() {
  //echo 'Это вид';
  //$this->view->render('enter');
}

public function render($name) {
  require $_SERVER['DOCUMENT_ROOT']. '/application/views/'.$name.'.php';
}
}
?>