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

$sql = "SELECT * FROM course INNER JOIN enrollment ON course.course_id = enrollment.course_id WHERE enrollment.student_id = '$student_id'";

$result = $conn->query($sql); 

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<!-- jQuery library -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<!-- Latest compiled JavaScript -->
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
	<br/>
	
	<div class="form-inline">
		<a href="course.php" class="btn btn-success">Course Catalog</a>
		<a href="login.php" class="btn btn-primary">Log out</a>
	</div>
	<br/>

	<div class="panel panel-primary"> 
      	<div class="panel-heading"><b>Student</b></div>
  		<div class="panel-body">
			<h5><b>Name: </b><?php echo $studentname; ?></h5> 
			<h5><b>Registration No: </b><?php echo $studentregistration; ?></h5>
		</div>
	</div> 

	<div class="panel panel-primary">
      	<div class="panel-heading"><b>Enrolled Courses</b></div>
      		<div class="panel-body">	
				
				<table class="table table-bordered">
					<thead>
						<th class="hidden">Course_id</th>
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
						<tr id="enrollment">
						
							<td class="hidden"><?php echo $row['course_id']; ?></td>
							<td><?php echo $row['coursename']; ?></td>
							<td><?php echo $row['coursecode']; ?></td>
							<td><?php echo $row['coursecredits']; ?></td>
							
						</tr>
						<?php }} ?>
					</tbody>
				</table>
				<form action="coursesummary.php" method="post">
					<input type="text" name="selectedenrollmentid" id="selected-enrollment-course-id">
					<input type="text" name="loggedinstudentid" id="logged-in-student-id" value="<?php echo $student_id; ?>"> 
					<button type="submit" name="viewcoursesummary" class="btn btn-success">View Assessment</button>
				</form>
		 	</div>
	</div>
</div>
	<script type="text/javascript" src="javascript.js"></script>
</body>
</html>