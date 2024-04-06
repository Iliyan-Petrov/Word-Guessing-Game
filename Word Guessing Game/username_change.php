<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Username Change</title>
</head>

<style>
body { background-color: #ADD8E6;}


button {
  --color: #0077ff;
  font-family: inherit;
  display: inline-block;
  width: 6em;
  height: 2.6em;
  line-height: 2.5em;
  overflow: hidden;
  margin: 20px;
  font-size: 17px;
  z-index: 1;
  color: var(--color);
  border: 2px solid var(--color);
  border-radius: 6px;
  position: relative;
}

button::before {
  position: absolute;
  content: "";
  background: var(--color);
  width: 150px;
  height: 200px;
  z-index: -1;
  border-radius: 50%;
}

button:hover {
  color: white;
}

button:before {
  top: 100%;
  left: 100%;
  transition: .3s all;
}

button:hover::before {
  top: -30px;
  left: -30px;
}

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
 <div class="form-container">
  <input type="text" class="input" id="new_username" name="new_username" placeholder="New username:" required>
 </div>
  <input type="submit" name = "submit" class="form button" id= "submit" value="Промяна на юзърнейм">
</form>
</div>

<br>
<a href="homescreen.php"><button style="margin: auto; display: flex; justify-content: center; align-items: center;">Назад</button></a>

<?php
if(isset($_POST['submit']))
{
session_start();
$new_username = $_POST['new_username'];

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'wordguessinggame';
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];
$sql = "UPDATE users SET username='$new_username' WHERE username='$user_id'";
if (mysqli_query($conn, $sql)) {
  echo "Юзърнеймът е сменен успешно";
} else {
  echo "Error updating username: " . mysqli_error($conn);
}

session_destroy();
header('Location: login_form.php');
mysqli_close($conn);

}
?>
</body>
</html>