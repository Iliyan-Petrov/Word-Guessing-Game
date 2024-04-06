<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wordguessinggame";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}


$playerUsername = $_SESSION['user_id'];

$sql = "SELECT * FROM games_played WHERE game_player = '$playerUsername' ORDER BY game_points DESC";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th style='font-size: 1.5em;'>ИД на играта</th>
                <th style='font-size: 1.5em;'>Резултат</th>
                <th style='font-size: 1.5em;'>Юзърнейм</th>
                <th style='font-size: 1.5em;'>Секунди</th>
            </tr>";


    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td style='font-size: 1.5em;'>" . $row["game_id"] . "</td>
                <td style='font-size: 1.5em;'>" . $row["game_points"] . "</td>
                <td style='font-size: 1.5em;'>" . $row["game_player"] . "</td>
                <td style='font-size: 1.5em;'>" . $row["game_time_seconds"] . "</td>
              </tr>";
    }

    echo "</table>";
} else { echo "No results found for the player: " . $playerUsername;}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Easy Word List</title>
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

        table {
            border-collapse: collapse;
            margin: 0 auto;
        }

        table, th, td {
            text-align: center;
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
<br>

<br>
<a href="homescreen.php"><button style="margin: auto; display: flex; justify-content: center; align-items: center;">Назад</button></a>

</body>
</html>