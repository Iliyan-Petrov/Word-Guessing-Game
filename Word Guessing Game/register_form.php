<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Registration Form</title>
</head>

<style>
body { background-color: #ADD8E6;}

.form-box {
  max-width: 300px;
  background: #f1f7fe;
  overflow: hidden;
  border-radius: 16px;
  color: #010101;
}

.form {
  position: relative;
  display: flex;
  flex-direction: column;
  padding: 32px 24px 24px;
  gap: 16px;
  text-align: center;
}

/*Form text*/
.title {
  font-weight: bold;
  font-size: 2rem;
}

.subtitle {
  font-size: 1rem;
  color: #666;
}

/*Inputs box*/
.form-container {
  overflow: hidden;
  border-radius: 8px;
  background-color: #fff;
  margin: 1rem 0 .5rem;
  width: 100%;
}

.input {
  background: none;
  border: 0;
  outline: 0;
  height: 40px;
  width: 100%;
  border-bottom: 1px solid #eee;
  font-size: .9rem;
  padding: 8px 15px;
}

.form-section {
  padding: 16px;
  font-size: 1.1rem;
  background-color: #e0ecfb;
  box-shadow: rgb(0 0 0 / 8%) 0 -1px;
}

.form-section a {
  font-weight: bold;
  color: #0066ff;
  transition: color .3s ease;
}

.form-section a:hover {
  color: #005ce6;
  text-decoration: underline;
}

/*Button*/
.form input[type="submit"] {
  background-color: #0066ff;
  color: #fff;
  border: 0;
  border-radius: 24px;
  padding: 10px 16px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background-color .3s ease;
}

.form button:hover {
  background-color: #005ce6;
}
</style>

<body>

<div class="form-box" style="margin: auto;">
	<form method="post" action="" class="form">
	<span class="title">Sign up</span>

	<div class="form-container">
		<input type="text" class="input" name="username" placeholder="Username:">
		<input type="email" class="input" name="email" placeholder="Email:">
		<input type="password" class="input" name="password" placeholder="Password:">
		<input type="password" class="input" name="repeat_password" placeholder="Repeat Password:">
    </div>
		<input type="submit" name="submit" class="form button" value="Register">
	</form>
	<div class ="form-section">
		<p>Have an account? <a href="login_form.php">Log in</a></p>
    </div>
</div>

	<?php
include 'functions.php';
session_start();

try{
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repeat_password = $_POST['repeat_password'];

		
		if(empty($username)) { echo "Полето на юзърнейма е празно";}
		else if(empty($email)) { echo "Полето на имейла е празно";}
		else if(empty($password)) { echo "Полето на паролата е празно";}
		else if(empty($repeat_password)) { echo "Второто поле на паролата е празно";}

		else 
		{
		  if($password != $repeat_password) { echo "Двете пароли не са еднакви";}
		  else{
		  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { echo "Невалиден формат на имейла";} 
		  else { 
      
      $conn = mysqli_connect("localhost", "root", "", "wordguessinggame");

      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      
      if (checkExistingEmail($email)) { echo "Потребителското име или имейлът вече съществуват в базата данни! Въведете различни данни!";} 
      else {

		  //$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

		  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
		  if(mysqli_query($conn, $sql)){ echo "Успешна регистрация!";} 
		  else{ echo "Error: " . mysqli_error($conn); }

		  $_SESSION['user_id'] = $username;
		  header('Location: homescreen.php');
		  
		  mysqli_close($conn);
         }
		     }
	       }
    }
  }
} 
catch(mysqli_sql_exception $e) {echo "Потребителското име или имейлът вече съществуват в базата данни! Въведете различни данни!";}
?>
</body>
</html>
