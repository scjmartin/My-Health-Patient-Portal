<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Doctor Login</title>
  </head>
  <body>
    <div class="p-5 text-center">
      <h1>Doctor Login</h1>
    </div>
    <div class="container text-center">
    <form action="/Portal/Home.php" method="post">
        <div class="form-group"> 
          <label for="DID"><strong>Doctor ID</strong></label>
          <input type="text" placeholder="Enter Doctor ID" name="DID" required>
        </div>

        <div class="form-group">
          <label for="psw"><strong>Password</strong></label>
          <input type="password" placeholder="Enter Password" name="psw" required>
        </div>

        <div class="form-group">
        <button type="submit">Login</button>
        </div>
      <div class="container text-center">
      <a href="/Portal/DoctorCreateAccount.php">Create New Account</a>
    </div>
    </div>
    </form>
  </body>
</html>