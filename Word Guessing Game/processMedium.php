<?php
include 'functions.php';

$letters = $_POST['letters'];


$host = 'localhost';
$user = 'root';
$password = '';
$database = 'wordguessinggame';


$conn = new mysqli($host, $user, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "INSERT INTO games_played (game_points, game_player, game_difficulty, game_time_seconds) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

$gamePoints = $_POST['points'];
$gamePlayer = $_POST['username'];
$gameDifficulty = 'medium'; 
$gameTimeSeconds = $_POST['seconds']; 

$stmt->bind_param("isss", $gamePoints, $gamePlayer, $gameDifficulty, $gameTimeSeconds);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Правилна дума! Поздравления! Вашите точки са $gamePoints";
} else {
    echo "Insertion failed";
}


$stmt->close();
$conn->close();
?>
