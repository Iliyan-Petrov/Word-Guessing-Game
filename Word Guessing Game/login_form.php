<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Login Form</title>
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
	<span class="title">Sign in</span>

	<div class="form-container">
		<input type="text" class="input" name="username" placeholder="Username:">
		<input type="password" class="input" name="password" placeholder="Password:">
    </div>
		<input type="submit" name="submit" class="form button" value="Log in">
	</form>
	<div class ="form-section">
		<p>Don't an account? <a href="register_form.php">Register</a></p>
    </div>
</div>

<?php
session_start();

try{
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
	$password = $_POST['password'];
    
    if(empty($username)) { echo "Username field is empty";}
	else if(empty($password)) { echo "Password field is empty";}
    else
    
    {
    $conn = mysqli_connect('localhost', 'root', '', 'wordguessinggame');

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result); 
        $_SESSION['user_id'] = $row['username'];
        header('Location: homescreen.php');
    } 
    else { echo 'Невалидно потребителско име или парола'; }

    mysqli_close($conn);
  }
}
}
catch(mysqli_sql_exception $e) {echo "Невалидно потребителско име или парола";}
?>
</body>
</html>
