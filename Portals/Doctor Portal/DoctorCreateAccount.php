
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Doctor Registration Form</title>
  </head>
  <body>
    <div class="p-5 text-center">
    <form action="/Portal/DoctorSuccess.php" method="post">
      <h1 class="mb-3">Doctor Registration</h1>
    </div>
    <div class="text-center">
      <div class="form-group">
        <label for="fName"><strong>First Name: </strong></label>
        <input type="text" placeholder="Enter First Name" name="fName" required>
      </div>
        <div class="form-group">
        <label for="lName"><strong>Last Name: </strong></label>
        <input type="text" placeholder="Enter Last Name" name="lName" required>
        </div>
        <div class="form-group">
        <label for="DoB"><strong>Date of Birth: </strong></label>
        <input type="text" placeholder="ex. yyyy-mm-dd" name="DoB" required>
        </div>
        <div class="form-group">
        <label for="SSN"><strong>SSN: </strong></label>
        <input type="password" placeholder="ex. xxxxxxxxx" name="SSN" required>
        </div>
        <div class="form-group">
        <label for="phone"><strong>Phone Number: </strong></label>
        <input type="text" placeholder="ex. xxxxxxxxxx" name="phone" required>
        </div>
        <div class="form-group">
        <label for="email"><strong>Email Address: </strong></label>
        <input type="text" placeholder="Enter Email Address" name="email" required>
        </div>
        <div class="form-group">
        <label for="address"><strong>Address: </strong></label>
        <input type="text" placeholder="Enter Address" name="address" required>
        </div>
        <div class="form-group">
        <label for="city"><strong>City: </strong></label>
        <input type="text" placeholder="Enter City" name="city" required>
        <label for="state"><strong>State: </strong></label>
        <input type="text" placeholder="Enter State" name="state" required>
        </div>
        <div class="form-group">
        <label for="zCode"><strong>Zip Code: </strong></label>
        <input type="text" placeholder="Enter Zip Code" name="zCode" required>
        </div>
        <div class="form-group">
        <label for="password"><strong>Password: </strong></label>
        <input type="password" placeholder="Enter Password" name="password1" required>
        <label for="password"><strong>Confirm Password: </strong></label>
        <input type="password" placeholder="Confirm Password" name="password2" required>
      </div>
      <div class="form-group">
        <input type="submit">
      </div>
      </div>
    </form>
  </body>
</html>