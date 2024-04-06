<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}


$conn = mysqli_connect("localhost", "root", "", "wordguessinggame");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT game_points, game_difficulty, game_time_seconds FROM games_played WHERE game_player = '".$_SESSION['user_id']."' ORDER BY game_points DESC LIMIT 3";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Homescreen</title>
</head>

<style>

*,
*::before,
*::after {
  box-sizing: border-box;
}

:root {
  /*
  --color-primary: #f6aca2;
  --color-secondary: #f49b90;
  --color-tertiary: #f28b7d;
  --color-quaternary: #f07a6a;
  --color-quinary: #ee6352;
  */
  --color-primary: #5192ED; --color-secondary: #69A1F0; --color-tertiary: #7EAEF2;
  --color-quaternary: #90BAF5; --color-quinary: #A2C4F5;
  
}

body {
  min-height: 100vh; font-family: canada-type-gibson, sans-serif; font-weight: 300; font-size: 1.25rem; display: flex;
  flex-direction: column; justify-content: center; overflow: hidden; background-color: #eff8e2;
}

.content { display: flex; align-content: center; justify-content: center;}

.text_shadows {
  text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary), 
  9px 9px var(--color-quaternary), 12px 12px 0 var(--color-quinary);
  font-family: bungee, sans-serif; font-weight: 400; text-transform: uppercase; 
  font-size: calc(2rem + 5vw); text-align: center; margin: 0; color: var(--color-primary);
  color: transparent; background-color: white; background-clip: text; 
  animation: shadows 1.2s ease-in infinite, move 1.2s ease-in infinite; letter-spacing: 0.4rem;
}

@keyframes shadows {
  0% { text-shadow: none; }
  10% { text-shadow: 3px 3px 0 var(--color-secondary); }
  20% { text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary); }
  30% { text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary); }
  40% { text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary), 12px 12px 0 var(--color-quinary); }
  50% { text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary), 12px 12px 0 var(--color-quinary); }
  60% { text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary), 12px 12px 0 var(--color-quinary); }
  70% { text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary), 9px 9px var(--color-quaternary); }
  80% { text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary); }
  90% { text-shadow: 3px 3px 0 var(--color-secondary); }
  100% { text-shadow: none; }
}

@keyframes move {
  0% { transform: translate(0px, 0px); }
  40% { transform: translate(-12px, -12px); }
  50% { transform: translate(-12px, -12px); }
  60% { transform: translate(-12px, -12px); }
  100% { transform: translate(0px, 0px); }
}

body { background-color: #ADD8E6;}


button:active {
  box-shadow: 0 0 0 0 transparent;
  -webkit-transition: box-shadow 0.2s ease-in;
  -moz-transition: box-shadow 0.2s ease-in;
  transition: box-shadow 0.2s ease-in;
}

.submit-button { font-size: 17px; padding: 0.5em 1.5em; border: transparent; box-shadow: 2px 2px 4px rgba(0,0,0,0.4); background: dodgerblue; color: white; border-radius: 4px;}
.submit-button:hover { background: rgb(2,0,36); background: linear-gradient(90deg, rgba(30,144,255,1) 0%, rgba(0,212,255,1) 100%); }    
.submit-button:active { transform: translate(0em, 0.2em);}

.content {
	position: relative;
}

.content h2 {
	color: #fff;
	font-size: 6.6em;
	position: absolute;
	transform: translate(-80%, -50%);
}

.content h2:nth-child(1) {
	color: transparent;
	-webkit-text-stroke: 2px #03a9f4;
}

.content h2:nth-child(2) {
	color: #03a9f4;
	animation: animate 4s ease-in-out infinite;
}

@keyframes animate {
	0%,
	100% {
		clip-path: polygon(
			0% 45%,
			16% 44%,
			33% 50%,
			54% 60%,
			70% 61%,
			84% 59%,
			100% 52%,
			100% 100%,
			0% 100%
		);
	}

	50% {
		clip-path: polygon(
			0% 60%,
			15% 65%,
			34% 66%,
			51% 62%,
			67% 50%,
			84% 45%,
			100% 46%,
			100% 100%,
			0% 100%
		);
	}
}

.waviy {
  position: relative;
  -webkit-box-reflect: right -20px linear-gradient(transparent, rgba(0,0,0,.2));
  font-size: 60px;
  text-align: right;
}

.waviy span {
  font-family: 'Alfa Slab One', cursive;
  position: relative;
  display: inline-block;
  color: #03a9f4;
  text-transform: uppercase;
  animation: waviy 1s infinite;
  animation-delay: calc(.1s * var(--i));
  transform-origin: right;
  right: 15%; /* Adjust this value to move the letters closer to the center */
}

@keyframes waviy {
  0%, 40%, 100% {
    transform: translateY(0);
  }
  20% {
    transform: translateY(-20px) translateX(100%);
  }
}
  
</style>

<body>

<div class="container" style="position: relative;">
  <a href="logout.php" style="position: absolute; top: 0; right: 0; font-size: 1.2em;">Logout</a>
</div>

<section>
	<div class="content">
		<h2>Играй!</h2>
		<h2>Играй!</h2>
	</div>
</section>

   <h2 style="margin: auto; font-size: 1.4em;">Здравейте <?php echo $_SESSION['user_id']?>!</h2>


   <div class="waviy">
   <span style="--i:1">Д</span>
   <span style="--i:2">У</span>
   <span style="--i:3">М</span>
   <span style="--i:4">И</span>
   <span style="--i:5">Т</span>
   <span style="--i:6">Е</span>
   <span style="--i:7"> </span>
   <span style="--i:8"> </span>
   <span style="--i:9">П</span>
   <span style="--i:10">О</span>
   <span style="--i:11">З</span>
   <span style="--i:12">Н</span>
   <span style="--i:13">А</span>
   <span style="--i:14">Й</span>
   <span style="--i:15">!</span>
  </div>

   <br><br>
   <table style="margin: auto; text-align:center;">
    <tr>
        <td>
        <a href="gameWordEasy.php"><button class="submit-button" style="width: 330px; font-size: 1em;">Познайте думата с 4 букви</button></a>
        </td>
        <td>
        <a href="gameWordMedium.php"><button class="submit-button" style="width: 330px; font-size: 1em">Познайте думата с 5 букви</button></a>
        </td>
        <td>
        <a href="gameWordHard.php"><button class="submit-button" style="width: 350px; font-size: 1em">Познайте думата със 7 букви</button></a>
        </td>
        <td>
        <a href="gameWordOpposite.php"><button class="submit-button"  style="width: 330px; font-size: 1em">Познайте антонима</button></a>
        </td>
    </tr>
    <tr>
        <td>
        <a href="word_list.php"><button class="submit-button" style="width: 330px; font-size: 1em">Списък с думи</button></a>
        </td>

        <td>
        <a href="player_history.php"><button class="submit-button" style="width: 330px; font-size: 1em">История</button></a>
        </td>

        <td>
        <a href="dictionary.php"><button class="submit-button" style="width: 350px; font-size: 1em">Речник</button></a>
        </td>
    </tr>
    <tr>
      <td colspan="4">
      <p style='font-size: 1.1em;'> Искате да си промените юзърнейма?<br><a href="username_change.php">Натиснете тук</a></p>
      </td>
    </tr>
    <tr>
      <td colspan="4">
      <p style='font-size: 1.1em;'> Забравихте си паролата?<br><a href="password_change.php">Натиснете тук</a></p>
      </td>
    </tr>
    <tr>
        <td colspan="4">
            <h3 style=' font-size: 1.2em;'  class="text_shadows">Най-добре играните Ви сесии:</h3>
        </td>
    </tr>
    <tr>
    <div class="content">
        <td style='font-size: 1.4em;' > Точки: </td>
        <td style='font-size: 1.4em;' > Трудност: </td>
        <td style='font-size: 1.4em;' > Секунди: </td>
        </tr>
    </div>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        // Display the session details in table cells
        echo "<tr>";
        echo "<td style='font-size: 1.3em;'>" . $row['game_points'] . "</td>";
        echo "<td style='font-size: 1.3em;'>" . $row['game_difficulty'] . "</td>";
        echo "<td style='font-size: 1.3em;'>" . $row['game_time_seconds'] . "</td>";
        echo "</tr>";
    }
    ?>

   </table>   
</body>
</html>