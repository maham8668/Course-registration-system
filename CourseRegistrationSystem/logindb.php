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

if(isset($_POST['login']))
{
  
  $registrationno = $_POST['registrationno']; //user providing
  $password       = $_POST['password'];

  $sql    = "SELECT * FROM students WHERE registrationno ='$registrationno'";
  $result = $conn->query($sql); 

  if ($result->num_rows > 0) 
  {
    while($row = $result->fetch_assoc())
    {
      $db_student_registration_no = $row['registrationno'];//checking in db
      $db_password                = $row['password'];

      echo $db_student_registration_no;

      

      if($registrationno == $db_student_registration_no && $password == $db_password)
      {
        header("location:studentdashboard.php");
      }
      else
      {
        header("location:login.php");
      }
      $_SESSION["student_id"] = $row['student_id']; //session used for storing values
      $_SESSION["studentname"] = $row['studentname'];
      $_SESSION["registrationno"] = $row['registrationno'];
    }
  }
}
?>