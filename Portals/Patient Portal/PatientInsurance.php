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
    </ul>
  </div>
 </nav>
<?php
session_start();
error_reporting(0);

include '../../includes/dbconn.php';

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
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
} 

$PID = mysqli_real_escape_string($conn, $_POST["PID"]);
$PID = $_SESSION["PID"];
$password = $_SESSION['psw'];

?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Insurance</title>
  </head>
  <body>
    <div class="p-5">
    <form action="/Project/PatientPortal/InsuranceSuccess.php" method="post">
      <h1 class="mb-3">Pick Insurance Provider</h1>
    </div>
    <div class="container">
    <div class="form-group">
        <label for="PlanID"><strong>Insurance ID: </strong></label>
        <input type="text" placeholder="Enter Insurance ID" name="PlanID" required>
    </div> 
      <div class="form-group">
        <input type="submit">
      </div>
      </form>
  </body>
  </html>

      
<?php


$sql = "SELECT PlanID, Provider, Premium, Deductible, MaxCoverage
        FROM Insurance";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1>Insurance Options</h1>";             
    while($row = $result->fetch_assoc()) {
        echo "Insurance ID: " . $row["PlanID"];
        echo "</br> Insurance Provider: " . $row["Provider"];
        echo "</br> Yearly Premium: $" . $row["Premium"];
        echo "</br> Deductible: $". $row["Deductible"];
        echo "</br> Maximum Coverage: $". $row["MaxCoverage"];
        echo "</br>";
        echo "</br>";
      }
    }
   echo "</div>";

?>


