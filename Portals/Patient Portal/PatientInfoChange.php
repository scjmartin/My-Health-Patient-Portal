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

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Change Information</title>
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
  <body>
    <form action="/Project/PatientPortal/PatientEmailChange.php" method="post">
      <h1>Change Patient Information</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="password"><strong>Confirm Password: </strong></label>
        <input type="password" placeholder="Enter Password" name="password3" required>
        <br>
        <label for="email"><strong>New Email Address: </strong></label>
        <input type="text" placeholder="Enter New Email Address" name="email" required>
        <br>
      <input type="Submit">
      </div>     
      <br>
    </form>
    <form action="/Project/PatientPortal/PatientPhoneChange.php" method="post">
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="password"><strong>Confirm Password: </strong></label>
        <input type="password" placeholder="Enter Password" name="password3" required>
        <br>
        <label for="phone"><strong>New Phone Number: </strong></label>
        <input type="text" placeholder="Ex. xxxxxxxxxx" name="phone" required>
        <br>
      <input type="Submit">
      </div>
      <br>
    </form>
    <form action="/Project/PatientPortal/PatientAddressChange.php" method="post">
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="password"><strong>Confirm Password: </strong></label>
        <input type="password" placeholder="Enter Password" name="password3" required>
        <br>
        <label for="address"><strong>New Address: </strong></label>
        <input type="text" placeholder="Enter Address" name="address" required>
        <br>
        <label for="city"><strong>New City: </strong></label>
        <input type="text" placeholder="Enter City" name="city" required>
        <label for="state"><strong>New State: </strong></label>
        <input type="text" placeholder="Enter State" name="state" required>
        <br>
        <label for="zCode"><strong>New Zip Code: </strong></label>
        <input type="text" placeholder="Enter Zip Code" name="zCode" required>
        <br>
      <input type="Submit">
      </div>

    </form>
    <form action="/Project/PatientPortal/PatientPasswordChange.php" method="post">
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="password"><strong>Confirm Password: </strong></label>
        <input type="password" placeholder="Enter Password" name="password3" required>
        <br>
        <label for="password"><strong>New Password: </strong></label>
        <input type="password" placeholder="Enter Password" name="password1" required>
        <label for="password"><strong>Confirm New Password: </strong></label>
        <input type="password" placeholder="Confirm Password" name="password2" required>
        <br>     <input type="Submit">
      </div>
      <br>
    </form>    
  </body>
</html>