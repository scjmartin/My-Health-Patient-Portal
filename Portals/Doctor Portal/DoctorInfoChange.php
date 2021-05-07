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
    <title>Change Doctor Information</title>
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

    <form action="/Portal/DoctorEmailChange.php" method="post">
     <div class="container">
      <h3>Change Doctor Information</h3>
     </div>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="password"><strong>Confirm Password: </strong></label>
        <input type="password" placeholder="Enter Password" name="password3" required>
        <br>
        <label for="email"><strong>New Email Address: </strong></label>
        <input type="text" placeholder="Enter New Email Address" name="email" required>
      <input type="Submit">
            </div>

      <br>
    </form>
    <form action="/Portal/DoctorPhoneChange.php" method="post">
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="password"><strong>Confirm Password: </strong></label>
        <input type="password" placeholder="Enter Password" name="password3" required>
        <br>
        <label for="phone"><strong>New Phone Number: </strong></label>
        <input type="text" placeholder="Ex. xxxxxxxxxx" name="phone" required>

      <input type="Submit">
            </div>

      <br>
    </form>
    <form action="/Portal/DoctorAddressChange.php" method="post">
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
      <input type="Submit">
      </div>
      <br>
    </form>
    <form action="/Portal/DoctorPasswordChange.php" method="post">
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
      <input type="Submit">
        </div>
      <br>
    </form>    
  </body>
</html>