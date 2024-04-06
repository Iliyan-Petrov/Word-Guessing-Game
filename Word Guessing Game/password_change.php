<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Password Change</title>
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
    <input type="password" id="old_password" class="input" name="old_password" placeholder="Old Password:" required>
    <input type="password" id="new_password" class="input" name="new_password" placeholder="New Password:" required>
    <input type="password" id="confirm_password" class="input" name="confirm_password" placeholder="Confirm New Password:" required>
  </div>

  <input type="submit" name = "submit" class="form button" value="Промяна на парола">
</form>
</div>

<br>
<a href="homescreen.php"><button style="margin: auto; display: flex; justify-content: center; align-items: center;">Назад</button></a>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login_form.php");
  exit;
}

if(isset($_POST['submit'])){
$conn = mysqli_connect("localhost", "root", "", "wordguessinggame");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
$new_password = mysqli_real_escape_string($conn, $_POST['new_password']);

if ($new_password !== $confirm_password) {
  echo "Паролите не са еднакви";
  exit;
}

//$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

$sql = "SELECT password FROM users WHERE username = '$user_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) 
{
    echo "Старата парола е грешна или не съществува";
} 
else 
{
 $sql = "UPDATE users SET password = '$new_password' WHERE username = '$user_id'";
 if (mysqli_query($conn, $sql)) { echo "Паролата беше сменена успешно"; } 
 else { echo "Error updating password: " . mysqli_error($conn); }
}
header('Location: homescreen.php');
mysqli_close($conn);
}
?>

</body>
</html>