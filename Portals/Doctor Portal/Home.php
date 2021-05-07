<!DOCTYPE html>
  <html>
  <head>
    <title>Welcome!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand disabled" >Doctor Portal</a>  
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


  $DID = mysqli_real_escape_string($conn, $_POST["DID"]);
  $password = mysqli_real_escape_string($conn, $_POST["psw"]);
  $_SESSION["DID"] = $DID;

  $sql = "SELECT * FROM Doctors WHERE DoctorID = '$DID' and Password = '$password'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    echo "<div class=\"container\"> 
              <div class=\"row\">
              </br>
              <h3>Your Account Information: </h3>
            </div> 
          </br> 
            DoctorID: " . $row["DoctorID"];
    echo "</br> Name: " . $row["FirstName"]. " " . $row["LastName"];
    echo "</br> Date of Birth: " . $row["DoB"];
    echo "</br> Phone Number: ". $row["PhoneNumber"];
    echo "</br> Email: ". $row["Email"];
    echo "</br> Address: ". $row["Address"] . " " . $row["City"] . ", " . $row["State"] . $row["Zipcode"];
  }
} else {
  echo "unsuccessful login";
}
?>
</div>
 </body>
</html>