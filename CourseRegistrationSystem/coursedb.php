<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursesystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
  die("Connection failed: ". $conn->connect_error);
}

if (isset($_POST['enrollment'])) { //form action perfrom kr rha aur values check ho rahen

	$student_id = $_POST['student-id'];
	$selected_course_id = $_POST['selected-course-id'];

	$sql = "INSERT INTO enrollment (student_id, course_id) VALUES ('$student_id', '$selected_course_id')";
	$conn->query($sql);
	$conn->close();

	header("location:studentdashboard.php");
}
?>