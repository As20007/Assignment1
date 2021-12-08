<?php
include 'init/init.php';

$values->title = 'Table 1';
$values->heading = 'Table 1';
//$values->header = Base::renderExternalFile(TEMPLATE_PATH . 'secondary.header.template.php');

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);