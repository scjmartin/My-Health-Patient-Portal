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

$fName = mysqli_real_escape_string($conn, $_POST["fName"]);
$lName = mysqli_real_escape_string($conn, $_POST["lName"]);
$DoB = mysqli_real_escape_string($conn, $_POST["DoB"]);
$SSN = mysqli_real_escape_string($conn, $_POST["SSN"]);
$phone = mysqli_real_escape_string($conn, $_POST["phone"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$city = mysqli_real_escape_string($conn, $_POST["city"]);
$state = mysqli_real_escape_string($conn, $_POST["state"]);
$zCode = mysqli_real_escape_string($conn, $_POST["zCode"]);
$password1 = mysqli_real_escape_string($conn, $_POST["password1"]);
$password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

if($password1 == $password2){
  $sql = "INSERT INTO Doctors (LastName, FirstName, DoB, SSN, PhoneNumber, Email, Address, City, State, ZipCode, Password) VALUES ('$lName', '$fName', '$DoB', '$SSN', '$phone', '$email', '$address', '$city', '$state', '$zCode', '$password1')";
  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo '<!DOCTYPE html>
          <html>
            <head>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
              <title>Welcome!</title>
            </head>
            <body>
                <h1>Registration Successful! </h1></br>
                <h3> <a href="DoctorLogin.php">Return to login page.</a></h3>
                Welcome, ';
                echo $_POST["fName"] . " " . $_POST["lName"] . ". Your Doctor ID is " . $last_id . ".";
            echo '</body>
                  </html>'; 

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}else{
  echo "Passwords do not match!";
}

$conn->close();

?>