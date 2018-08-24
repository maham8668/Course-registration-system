<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursesystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
  die("Connection failed: ". $conn->connect_error);
}

if (isset($_SESSION['student_id'])){             //check
  if ($_SESSION['student_id'] != NULL)
  {
    $student_id = $_SESSION['student_id'];
  }
}

if (isset($_POST['viewcoursesummary'])) {
  $course_id = $_POST['selectedenrollmentid'];
  $student_id = $_POST['loggedinstudentid'];

  $sql_assignments= "SELECT * FROM assignments WHERE (student_id = '$student_id' AND course_id = '$course_id')";
  $result_assignments = $conn->query($sql_assignments);

  $sql_quiz = "SELECT * FROM quiz WHERE (student_id = '$student_id' AND course_id = '$course_id')";
  $result_quiz = $conn->query($sql_quiz);

  $sql_sessionals = "SELECT * FROM sessionals WHERE (student_id = '$student_id' AND course_id = '$course_id')";
  $result_sessionals = $conn->query($sql_sessionals);

  $sql_finals = "SELECT * FROM finals WHERE (student_id = '$student_id' AND course_id = '$course_id')";
  $result_finals = $conn->query($sql_finals);
}
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

  <h2>Assessment</h2><hr>
  
  <h5>Assignments</h5>
  <table class="table table-bordered">
    <thead>
      <th>Assignment No</th>
      <th>Attained Marks</th>
      <th>Total Marks</th>
    </thead>

    <tbody>
      <?php
        if ($result_assignments->num_rows > 0) 
        { $count = 1;
          while($row_assignments = $result_assignments->fetch_assoc())
          { 
      ?>
      <tr>
        <td><?php echo $count;?></td>
        <?php $count = $count + 1; ?>
        <td><?php echo $row_assignments['marks']; ?></td>
        <td>10</td>
      </tr>
      <?php }} ?>
    </tbody>
  </table>

  <h5>Quiz</h5>
  <table class="table table-bordered">
    <thead>
      <th>Quiz No</th>
      <th>AttainedMarks</th>
      <th>Total Marks</th>
    </thead>
    <tbody>
       <?php
        if ($result_quiz->num_rows > 0) 
        { $count = 1;
          while($row_quiz = $result_quiz->fetch_assoc())
          { 
      ?>
      <tr>
        <td><?php echo $count;?></td>
        <?php $count = $count + 1; ?>
        <td><?php echo $row_quiz['marks']; ?></td>
        <td>10</td>
      </tr>
      <?php }} ?>
    </tbody>
  </table>

  <h5>Sessionals</h5>
  <table class="table table-bordered">
    <thead>
      <th>Sessional No</th>
      <th>Attained Marks</th>
      <th>Total Marks</th>
    </thead>
    <tbody>
       <?php
        if ($result_sessionals->num_rows > 0) 
        { $count = 1;
          while($row_sessionals = $result_sessionals->fetch_assoc())
          { 
      ?>
      <tr>
        <td><?php echo $count;?></td>
        <?php $count = $count + 1; ?>
        <td><?php echo $row_sessionals['marks']; ?></td>
        <td>25</td>
      </tr>
      <?php }} ?>
    </tbody>
  </table>

  <h5>Finals</h5>
  <table class="table table-bordered">
    <thead>
      <th>Final Marks(Attained)</th>
      <th>Total Marks</th>
    </thead>
    <tbody>
       <?php
        if ($result_finals->num_rows > 0) 
        {
          while($row_finals = $result_finals->fetch_assoc())
          { 
      ?>
      <tr>
        <td><?php echo $row_finals['marks']; ?></td>
        <td>50</td>
      </tr>
      <?php }} ?>
    </tbody>
  </table>

  </div>
</body>
</html>