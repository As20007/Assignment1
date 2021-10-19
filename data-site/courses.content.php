<?php
$db = new Database();

$sql = 'SELECT `title` FROM `courses`;';

$courses = $db->object('Course');

$tableStart = "<table>\n<caption>Courses</caption>\n<tr>\n";
$tableStart .= "<th scope=\"col\">Title</th>\n";
$tableStart .= "<th scope=\"col\">Level</th>\n";
$tableStart .= "<th scope=\"col\">Description</th>\n";
$tableStart .= "<th scope=\"col\">Professor</th>\n";
$tableStart .= "</tr>\n";

$tableEnd = "</table>\n";

$tableData = '';

foreach ($courses as $course) {
	$tableData .= "<tr>\n";
	$tableData .= "<td>{$user->title}</td>\n";
	$tableData .= "<td>{$user->level}</td>\n";
	$tableData .= "<td>{$user->description}</td>\n";
	$tableData .= "<td>{$user->professor}</td>\n";
	$tableData .= "<td><a href=\"courses-edit.php?id={$course->title}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
	$tableData .= "<a href=\"course-delete.php?id={$user->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
	$tableData .= "</tr>\n";
}

$addCourse = "<p><a href=\"course-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add course</a></p>";

echo $tableStart . $tableData . $tableEnd . $addUser;