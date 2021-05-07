<!DOCTYPE html>
  <html>
  <head>
    <title>Medical Reords</title>
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

$sql = "SELECT InsPlanID 
        FROM Patients
        WHERE '$PID' = PID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $InsID = $row["InsPlanID"];
}
else{
  $InsID = 0;
}

$sql = "SELECT MaxCoverage
        FROM Insurance
        WHERE '$InsID' = PlanID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $Cov = $row["MaxCoverage"];
}
else{
  $Cov = 0;
}


$sql = "SELECT Diagnosis, Prescription, Price, Date, DID, LastName
        FROM MedRecords, Doctors
        WHERE PID = '$PID'
        AND DID = DoctorID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $paid = $Cov - $row['Price'];
    if($paid < 0){
      $paid = 0;
    }
    echo "<head>
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css\" integrity=\"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2\" crossorigin=\"anonymous\">
    <title>Medical Records</title>  
    </head>
    <h1 class=\"container\">Medical Records</h1>
    <div class=\"container\">";             
    while($row = $result->fetch_assoc()) {
        echo "Doctor: Dr. " . $row["LastName"];
        echo "</br> Diagnosis: " . $row["Diagnosis"];
        echo "</br> Prescription: " . $row["Prescription"];
        echo "</br> Price: $". $row["Price"];
        echo "</br> Price With Insurance: $" . $paid;
        echo "</br> Date: ". $row["Date"];
        echo "</br>";
        echo "</br>";
      }
    } else {
          echo "No Medical Records Available";
      return 0;
    }
    echo "</div>";
    ?>