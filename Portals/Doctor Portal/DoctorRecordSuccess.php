<!DOCTYPE html>
          <html>
            <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
              <title>Welcome!</title>
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
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$PID = mysqli_real_escape_string($conn, $_POST["PID"]);
$DID = mysqli_real_escape_string($conn, $_POST["DID"]);
$Diagnosis = mysqli_real_escape_string($conn, $_POST["Diagnosis"]);
$Prescription = mysqli_real_escape_string($conn, $_POST["Prescription"]);
$Price = mysqli_real_escape_string($conn, $_POST["Price"]);
$Date = mysqli_real_escape_string($conn, $_POST["Date"]);

$DID = $_SESSION["DID"];

  $sql = "INSERT INTO MedRecords (PID, DID, Diagnosis, Prescription, Price, Date) VALUES ('$PID', '$DID', '$Diagnosis', '$Prescription', '$Price', '$Date')";
  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "<div class=\"container\">
    <h3>Record Added Successfully! </h3> </div>";

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();

?>

</body>
</html>