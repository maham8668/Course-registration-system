<?php
session_start();
if (isset($_SESSION['student_id'])){
	if ($_SESSION['student_id'] != NULL)
	{
		$student_id = $_SESSION['student_id'];
	}
}

if (isset($_SESSION['studentname'])){
	if ($_SESSION['studentname'] != NULL)
	{
		$studentname = $_SESSION['studentname'];
	}
}

if (isset($_SESSION['registrationno'])){
	if ($_SESSION['registrationno'] != NULL)
	{
		$studentregistration = $_SESSION['registrationno'];
	}
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursesystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
  die("Connection failed: ". $conn->connect_error);
}

$sql = "SELECT * FROM course";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Courses</title>

	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<!-- jQuery library -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<!-- Latest compiled JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" type="text/css" href="style.css">
  	<script type="text/javascript" src="javascript.js"></script>

</head>
<body>

	<div class="container">
		<h3><b>Avaliable Courses</b></h3>

		<div class="panel panel-primary">
      		<div class="panel-heading">Courses</div>
      		<div class="panel-body">
      			
      			<table class="table table-bordered">
      				<thead>
      					<th>Course Id</th>
      					<th>Course Name</th>
      					<th>Course Code</th>
      					<th>Course Credits</th>
      				</thead>

      				<tbody>
      				<?php
      				if ($result->num_rows > 0) 
      				{
      					while($row = $result->fetch_assoc())
      					{
      				?>
      					<tr id="coursedata">
      						<td><?php echo $row['course_id']; ?></td>
      						<td><?php echo $row['coursename']; ?></td>
      						<td><?php echo $row['coursecode']; ?></td>
      						<td><?php echo $row['coursecredits']; ?></td>
      					</tr>
      				<?php }} ?>
      				</tbody>
      			</table>

      			<form action="coursedb.php" method="POST">
      				<input type="text" name="selected-course-id" id="selected-course-id">
      				<input type="text" name="student-id" id="student-id" value="<?php echo $student_id; ?>">
      				<button type="submit" class="btn btn-success" id="enrollment-course" name="enrollment">Register Course</button>
      			</form>
      		</div>
    	</div>
    </div>

</body>
</html>