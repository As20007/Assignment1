<?php
$db = new Database();

$postError = "<p>Error: You were unable to add your course.</p>\n";

if (isset($_POST['Level'])) {

	$postLevel= $_POST['Level'];
	$postDescription = $_POST['Description'];
	$postProfessor = $_POST['Professor'];

	if (!isset($_POST['level']) || !isset($_POST['description']) || !isset($_POST['professor'])) { 
		echo $postError;
		return;
	}
	$insertSql = "INSERT INTO `users` (`level`, `description`, `professor`) ";
	$insertSql .= " VALUES (\"{$postLevel}\", \"{$postDescription}\", \"{$postProfessor}\");";
	$insertTitle = $db->insert($insertSql);
	
	$sql = 'SELECT * FROM `courses` WHERE `title` = ' . $insertTitle;
	$user = $db->object('Course', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$course = $course[0];

	$success = "<h2>Course Created</h2>\n";
	$success .= "<p>Title: {$user->title}</p>\n";
	$success .= "<p>Level: {$user->level}</p>\n";
	$success .= "<p>Professor: {$user->professor}</p>\n";
	$success .= "<p><a href=\"courses.php\" class=\"button\">Back to course list</a></p>";
	echo $success;
	return;
} 

$formStart = "<form action=\"course-add.php\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" title=\"submit\"></p>\n</form>\n";
$form = '';

$form .= "<p><label for=\"firstname\">First name</label> <input type=\"text\" name=\"firstname\" id=\"firstname\" value=\"\"></p>";
$form .= "<p><label for=\"lastname\">Last name</label> <input type=\"text\" name=\"lastname\" id=\"lastname\" value=\"\"></p>";
$form .= "<p><label for=\"email\">Email</label> <input type=\"text\" name=\"email\" id=\"email\" value=\"\"></p>";


echo $formStart . $form . $formEnd;
