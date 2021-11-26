<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>

  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>

  	  <label>Password</label>
  	  <input type="password" name="password_1"><br>
  	</div>

  	<div class="input-group">
  	  <label>Confirm password</label><br>
  	  <input type="password" name="password_2"><br>
  	</div>

    <div class="input-group">
  	  <label>Full Name</label>
     <input type="text" name="fullname" value="<?php echo $fullname; ?>">
  	</div>

    <div class="input-group">
  	  <label>Birthday</label>
  	  <input type="date" name="birth" value="<?php echo $birth; ?>">
  	</div>

    <div class="input-group">
  	  <label>Student's Number</label>
  	  <input type="number" name="studentnumber" value="<?php echo $studentnumber; ?>">
  	</div>

    <div class="input-group">
  	  <label>Home Address</label>
  	  <input type="text" name="homeaddress" value="<?php echo $homeaddress; ?>">
  	</div>

    <div >
  	  <label>Male</label>
  	  <input type="radio" name="gender" value="<?php echo $gender; ?>">
  	</div>

    <div >
  	  <label>Female</label>
  	  <input type="radio" name="gender" value="<?php echo $gender; ?>">
  	</div>

    <div class="input-group">
  	  <label>Guardiant Name</label>
  	  <input type="text" name="guardiantname" value="<?php echo $guardiantname; ?>">
  	</div>

    <div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="number" name="phonenumber" value="<?php echo $phonenumber; ?>">
  	</div>

    <div class="input-group">
  	  <label>WhatsApp Number</label>
  	  <input type="number" name="whatsappnumber" value="<?php echo $whatsappnumber; ?>">
  	</div>

    <div class="input-group">
  	  <label>Primary</label>
  	  <input type="radio" name="primary" value="<?php echo $primary; ?>">
  	</div>

    <div class="input-group">
  	  <label>Secondry</label>
  	  <input type="radio" name="secondry" value="<?php echo $secondry; ?>">
  	</div>

    <div class="input-group">
  	  <label>Teacher's Name</label>
  	  <input type="text" name="teachername" value="<?php echo $teachername; ?>">
  	</div>

    <div class="input-group">
  	  <label>Grade</label>
  	  <input type="text" name="grade" value="<?php echo $grade; ?>">
  	</div>

    <div class="input-group">
  	  <label>Class</label>
  	  <input type="text" name="class" value="<?php echo $class; ?>">
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>

  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
