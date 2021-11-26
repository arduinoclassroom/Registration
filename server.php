<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
$fullname = "";
$birth = "";
$studentnumber = "";
$homeaddress = "";
$male = "";
$female = "";
$guardiantname = "";
$phonenumber = "";
$whatsappnumber = "";
$primary = "";
$secondry = "";
$teachername = "";
$grade = "";
$class = "";
$gender = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $birth = mysqli_real_escape_string($db, $_POST['birth']);
  $studentnumber = mysqli_real_escape_string($db, $_POST['studentnumber']);
  $homeaddress = mysqli_real_escape_string($db, $_POST['homeaddress']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $guardiantname = mysqli_real_escape_string($db, $_POST['guardiantname']);
  $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);
  $whatsappnumber = mysqli_real_escape_string($db, $_POST['whatsappnumber']);
  $primary = mysqli_real_escape_string($db, $_POST['primary']);
  $secondry = mysqli_real_escape_string($db, $_POST['secondry']);
  $teachername = mysqli_real_escape_string($db, $_POST['teachername']);
  $grade = mysqli_real_escape_string($db, $_POST['grade']);
  $class = mysqli_real_escape_string($db, $_POST['class']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO student_registration (username, email, password, fullname, birthday, studentnumber, homeaddress, gender, guardiantname, phonenumber, whatsappnumber, type, teachersname, grade, class)
  			  VALUES('$username', '$email', '$password', '$fullname', '$birthday', '$studentnumber', '$homeaddress', '$gender', '$guardiantname', '$phonenumber', '$whatsappnumber', '$type', '$teachersname', '$grade', '$class')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}




if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
