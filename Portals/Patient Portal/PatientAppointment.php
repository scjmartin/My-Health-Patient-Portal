<!DOCTYPE html>
  <html>
  <head>
    <title>Appointment</title>
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

$PID = $_SESSION["PID"];
$password = $_SESSION['psw'];


?>
  <body>
    <div class="p-5 text-center">
    <form action="/Project/PatientPortal/AppointmentSuccess.php" method="post">
      <h1 class="mb-3">Make New Appointment</h1>
    </div>
    <div class="text-center">
        <div class="form-group">
        <label for="FirstName"><strong>Doctor's First Name: </strong></label>
        <input type="text" placeholder="Enter Doctor's First Name" name="FirstName" required>
        </div>
        <div class="form-group">
        <label for="LastName"><strong>Doctor's Last Name: </strong></label>
        <input type="text" placeholder="Enter Doctor's Last Name" name="LastName" required>
        </div>
        <div class="form-group">
        <label for="Date"><strong>Date: </strong></label>
        <input type="date" placeholder="Enter Date" name="Date" required>
        </div>
        <div class="form-group">
        <label for="Time"><strong>Time: </strong></label>
        <input type="text" placeholder="Ex. 12:00 P.M." name="Time" required>
        </div>
        <div class="form-group">
        <label for="Reason"><strong>Reason: </strong></label>
        <input type="text" placeholder="Enter Reason" name="Reason" required>
      <div class="form-group">
        <input type="submit">
      </div>
      </div>
    </form>
  </body>
</html>