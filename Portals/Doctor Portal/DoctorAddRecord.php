<?php
session_start();
error_reporting(0);

include '../includes/dbconn.php';

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

$DID = $_SESSION["DID"];
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Add New Record</title>
  </head>
  <body>
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
    <div class="container">
    <form action="/Portal/DoctorRecordSuccess.php" method="post">
      <h3>Add New Record</h3>
      <div class="form-group">
         <label for="PID"><strong>Patient ID: </strong></label>
        <input type="text" placeholder="Enter Patient ID" name="PID" required>
      </div>
        <div class="form-group">
        <label for="DID"><strong>Doctor ID: </strong></label>
        <input type="text" placeholder="Enter Doctor ID" name="DID" required>
        </div>
        <div class="form-group">
        <label for="Diagnosis"><strong>Diagnosis: </strong></label>
        <input type="text" placeholder="Enter Diagnosis" name="Diagnosis" required>
        </div>
        <div class="form-group">
        <label for="Prescription"><strong>Prescription: </strong></label>
        <input type="text" placeholder="Enter Prescription" name="Prescription" required>
        </div>
        <div class="form-group">
        <label for="Price"><strong>Price: </strong></label>
        <input type="text" placeholder="Enter Price" name="Price" required>
        </div>
        <div class="form-group">
        <label for="Date"><strong>Date: </strong></label>
        <input type="date" placeholder="Enter Date" name="Date" required>
      <div class="form-group">
        <input type="submit">
      </div>
    </form>
        </div>
  </body>
</html>