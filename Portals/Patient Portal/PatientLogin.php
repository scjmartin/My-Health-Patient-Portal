<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Patient Login</title>
  </head>
  <body>
    <div class="p-5 text-center">
      <h1>Patient Login</h1>
    </div>
    <div class="container text-center">
    <form action="/Project/PatientPortal/PatientHome.php" method="post">
        <div class="form-group">
          <label for="PID"><strong>Patient ID</strong></label>
          <input type="text" placeholder="Enter Patient ID" name="PID" required>
        </div>

        <div class="form-group">
          <label for="psw"><strong>Password</strong></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
        </div>

        <div class="form-group">
        <button type="submit">Login</button>
        </div>
      <div class="container text-center">
      <a href="/Project/PatientPortal/PatientCreateAccount.php">Create New Account</a>
    </div>
    </div>
    </form>
  </body>
</html>