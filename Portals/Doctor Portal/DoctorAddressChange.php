<?php
session_start();
error_reporting(0);

include '../includes/dbconn.php';
include '/Home.php';

//========== Global Parameters ==========

$msgIndex = 0;

$targetDB = '';
$querytype = 'sql';
$inputQuery = '';

$tableName = '';
$selection = '';

$search_result = null;
$errorMsg = array('');
$successMsg = array('');
$defaultTables = ['information_schema'];

// create new connection
$conn = new mysqli($servername, $username, "", "db1", $sqlport, $socket);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$DID = $_SESSION["DID"];
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$city = mysqli_real_escape_string($conn, $_POST["city"]);
$state = mysqli_real_escape_string($conn, $_POST["state"]);
$zCode = mysqli_real_escape_string($conn, $_POST["zCode"]);
$password3 = mysqli_real_escape_string($conn, $_POST["password3"]);

$infoCheck=mysqli_query($conn,"SELECT * FROM Doctors WHERE Password='$password3' and DoctorID='$DID'");
if (mysqli_num_rows($infoCheck)!=1)
{
  echo "DID or Password Incorrect.";
  return 0;
}

$sql = "UPDATE db1.Doctors SET Address = '$address' WHERE Doctors.DoctorID='$DID'";

if($conn->query($sql) === TRUE)
{
  $last_id = $conn->insert_id;
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE db1.Doctors SET City = '$city' WHERE Doctors.DoctorID='$DID'";

if($conn->query($sql) === TRUE)
{
  $last_id = $conn->insert_id;
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE db1.Doctors SET State = '$state' WHERE Doctors.DoctorID='$PID'";

if($conn->query($sql) === TRUE)
{
  $last_id = $conn->insert_id;
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE db1.Doctors SET ZipCode = '$zCode' WHERE Doctors.DoctorID='$PID'";

if($conn->query($sql) === TRUE)
{
  $last_id = $conn->insert_id;
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Change of Information!</title>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" >Doctor Portal</a>  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/Portal/DoctorInfoChange.php">Change Account Information </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Portal/DoctorAddRecord.php">Add New Record </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Portal/DoctorViewRecords.php">View Records </a>
      </li>
        <a class="nav-link" href="/Portal/DoctorViewAppointments.php">View Appointments </a>
      </li>
    </ul>
  </div>
 </nav>
  </head>
  <body>
    <div class="container">
    <h3>Address Changed Successfully.</h3>
  </div>
  </form>
  </body>
</html>