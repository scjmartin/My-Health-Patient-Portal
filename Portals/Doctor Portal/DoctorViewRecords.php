<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Medical Records</title>
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
  <h3>Medical Records</h3>
</div>

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

$sql = "SELECT * 
        FROM  MedRecords, Patients
        WHERE DID = '$DID'
        AND PID=PatientID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $paid = $Cov - $row['Price'];
    if($paid < 0){
      $paid = 0;
    }
    echo "<div class=\"container\">";
    while($row = $result->fetch_assoc()) {
        echo "Patient: " . $row["LastName"];
        echo "</br> Diagnosis: " . $row["Diagnosis"];
        echo "</br> Prescription: " . $row["Prescription"];
        echo "</br> Price: " . $row["Price"];
        echo "</br> Date: ". $row["Date"];
        echo "</br>";

    
        echo "</br>";
      }
    } else {
          echo "No Medical Records Available";
      return 0;
    }
    ?>
  </div>
  </body>
  </html>
