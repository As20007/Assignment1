<?php
include 'init/init.php';

$values->title = 'ICU Admissions';
$values->heading = 'ICU Admissions';
//$values->header = Base::renderExternalFile(TEMPLATE_PATH . 'secondary.header.template.php');

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);