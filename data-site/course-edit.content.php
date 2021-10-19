<?php
$db = new Database();

if (!isset($_GET['course'])) {
	echo "<p>Error: No course selected</p>";
	return;
}
if (!is_numeric($_GET['course'])) {
	echo "<p>Error: The course must be numeric.</p>";
	return;
} else {
	$getId = $_GET['course'];
}

$postError = "<p>Error: course submission was incomplete.</p>\n";

if (isset($_POST['course'])) {

	if (!is_numeric($_POST['id'])) {
		echo '<p>Error: the posted id was not numeric.</p>';
		return;
	} else {
		$postId = $_POST['course'];
	}
	$postLevel = $_POST['level'];
	$postDescription = $_POST['description'];
	$postProfessor = $_POST['professor'];

	//echo 'post';
	if (!isset($_POST['title']) || !isset($_POST['level']) || !isset($_POST['description']) || !isset($_POST['professor'])) { 
		echo $postError;
		return;
	}
	$updateSql = "UPDATE `courses` SET `level` = \"{$postLevel}\", `description` = \"{$postDescription}\", `professor` = \"{$postProfessor}\" WHERE `course` = " . $_GET['title'];
	$update = $db->query($updateSql);
	$sql = 'SELECT * FROM `courses` WHERE `title` = ' . $_POST['title'];
	$user = $db->object('Course', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$user = $user[0];

	$success = "<h2>Course Updated</h2>\n";
	$success .= "<p>Level: " . $course->level . "</p>\n";
	$success .= "<p>Description: {$course->description}</p>\n";
	$success .= "<p>Professor: {$course->professor}</p>\n";
	$success .= "<p><a href=\"courses.php\" class=\"button\">Back to course list</a></p>";
	echo $success;
	return;

} 

$sql = 'SELECT * FROM `courses` WHERE `title` = ' . $_GET['title'];

$user = $db->object('Course', $sql);

$formStart = "<form action=\"course-edit.php?id={$getId}\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" course=\"submit\"></p>\n</form>\n";
$form = '';

$data = $user[0];

$form .= "<input type=\"hidden\" name=\"course\" course=\"course\" value=\"{$data->course}\">";
$form .= "<p><label for=\"level\">Level</label> <input type=\"text\" name=\"level\" course=\"level\" value=\"{$data->level}\"></p>";
$form .= "<p><label for=\"description\">Description</label> <input type=\"text\" name=\"description\" course=\"description\" value=\"{$data->description}\"></p>";
$form .= "<p><label for=\"professor\">Professor</label> <input type=\"text\" name=\"professor\" course=\"professor\" value=\"{$data->professor}\"></p>";


echo $formStart . $form . $formEnd;
