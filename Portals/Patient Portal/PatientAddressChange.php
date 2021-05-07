<!DOCTYPE html>
  <html>
  <head>
    <title>Success!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand disabled" >Patient Portal</a>  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="/Project/PatientPortal/PatientLanding.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Project/PatientPortal/PatientInfoChange.php">Change Account Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Project/PatientPortal/PatientMedRecords.php">View Medical Records </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Project/PatientPortal/PatientAppointment.php">Make an Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/Project/PatientPortal/CurrentInsurance.php">Current Insurance Information</a>
      </li>
        <a class="nav-link" href="/Project/PatientPortal/PatientInsurance.php">Pick Insurance Company</a>
      </li>
    </ul>
  </div>
 </nav>
<?php
session_start();
error_reporting(0);

include '../../includes/dbconn.php';
include '/patientLanding.php';

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

$PID = $_SESSION["PID"];
$password = $_SESSION['psw'];
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$city = mysqli_real_escape_string($conn, $_POST["city"]);
$state = mysqli_real_escape_string($conn, $_POST["state"]);
$zCode = mysqli_real_escape_string($conn, $_POST["zCode"]);
$password3 = mysqli_real_escape_string($conn, $_POST["password3"]);

$infoCheck=mysqli_query($conn,"SELECT * FROM Patients WHERE Password='$password3' and PatientID='$PID'");
if (mysqli_num_rows($infoCheck)!=1)
{
  echo "PID or Password Incorrect.";
  return 0;
}

$sql = "UPDATE db1.Patients SET Address = '$address' WHERE Patients.PatientID='$PID'";

if($conn->query($sql) === TRUE)
{
  $last_id = $conn->insert_id;
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE db1.Patients SET City = '$city' WHERE Patients.PatientID='$PID'";

if($conn->query($sql) === TRUE)
{
  $last_id = $conn->insert_id;
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE db1.Patients SET State = '$state' WHERE Patients.PatientID='$PID'";

if($conn->query($sql) === TRUE)
{
  $last_id = $conn->insert_id;
}
else
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "UPDATE db1.Patients SET ZipCode = '$zCode' WHERE Patients.PatientID='$PID'";

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
    <title>Change of Information!</title>
  </head>
  <body>
    <h1>Address Changed Successfully.</h1>
  </form>
  </body>
</html>