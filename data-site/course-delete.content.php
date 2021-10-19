<?php
$db = new Database();

if (!isset($_GET['title'])) {
	echo "<p>Error: No course selected</p>";
	return;
}
if (!is_numeric($_GET['title'])) {
	echo "<p>Error: The title must be numeric.</p>";
	return;
} else {
	$getId = $_GET['title'];
}

$postError = "<p>Error: title was incomplete.</p>\n";

if (isset($_POST['title'])) {

	if (!is_numeric($_POST['id'])) {
		echo '<p>Error: the posted title was not numeric.</p>';
		return;
	} else {
		$postId = $_POST['title'];
	}
	$postLevel = $_POST['level'];
	$postDescription = $_POST['description'];
	$postProfessor = $_POST['professor'];

	if (!isset($_POST['title']) || !isset($_POST['level']) || !isset($_POST['description']) || !isset($_POST['professor'])) { 
		echo $postError;
		return;
	}
	$deleteSql = "Delete FROM `courses` WHERE `title` = " . $_GET['title'];
	$delete = $db->query($deleteSql);

	$success = "<h2>Course Deleted</h2>\n";
	$success .= "<p>{$postLevel} {$postDescription} ({$postProfessor)</p>\n";
	$success .= "<p><a href=\"courses.php\" class=\"button\">Back to course list</a></p>";
	echo $success;
	return;

} 

$sql = 'SELECT * FROM `courses` WHERE `title` = ' . $_GET['title'];

$user = $db->object('Course', $sql);

$userData = '';

$data = $user[0];


$formStart = "<form action=\"user-delete.php?id={$getId}\" method=\"post\">\n";
$userData .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">\n";
$userData .= "<input type=\"hidden\" name=\"firstname\" id=\"firstname\" value=\"{$data->firstname}\">\n";
$userData .= "<input type=\"hidden\" name=\"lastname\" id=\"lastname\" value=\"{$data->lastname}\">\n";
$userData .= "<input type=\"hidden\" name=\"email\" id=\"email\" value=\"{$data->email}\">\n";
$userData .= "<p>Are you sure you want to delete {$data->firstname} {$data->lastname} ({$data->email})?</p>\n";
$confirm = "<p><a href=\"\"><input type=\"submit\" value=\"Delete\"> <a href=\"users.php\">Back to user list</a></p>\n";
$formEnd = "</form>";

echo $formStart . $userData . $confirm . $formEnd;
