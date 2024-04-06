<?php
include 'functions.php';

session_start();
static $Easyword;
$Easyword = extractWordFromDatabaseEasy();
static $EasyMeaning;
$EasyMeaning = extractMeaningFromDatabaseEasy($Easyword);
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

echo '<script>';
echo 'function nullTimer() {';
echo 'seconds = 0;';
echo 'localStorage.setItem("timerSeconds", seconds);';
echo '}';
echo '</script>';

echo '<script> nullTimer() </script>'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['all'])) {
    $Easyword = extractWordFromDatabaseEasy();
    $EasyMeaning = extractMeaningFromDatabaseEasy($Easyword);
      echo '<script> nullTimer() </script>'; 
  }
  elseif (isset($_POST['cooking'])) {
    $category = "кулинария";
    $Easyword = extractCategoryFromDatabaseEasy($category);
    $EasyMeaning = extractMeaningFromDatabaseEasy($Easyword);
      echo "<style>body { background-image: url('background images/cooking.png'); background-size: 220px 220px; background-repeat: no-repeat; }</style>";
      echo '<script> nullTimer() </script>'; 
  } 
  elseif (isset($_POST['astronomy'])) {
    $category = "физика и астрономия";
    $Easyword = extractCategoryFromDatabaseEasy($category);
    $EasyMeaning = extractMeaningFromDatabaseEasy($Easyword);
      echo "<style>body { background-image: url('background images/astronomy.png'); background-size: 220px 220px; background-repeat: no-repeat; }</style>";
      echo '<script> nullTimer() </script>'; 
  } 
  elseif (isset($_POST['geography'])) {
    $category = "география";
    $Easyword = extractCategoryFromDatabaseEasy($category);
    $EasyMeaning = extractMeaningFromDatabaseEasy($Easyword);
      echo "<style>body { background-image: url('background images/geography.png'); background-size: 220px 220px; background-repeat: no-repeat; }</style>";
      echo '<script> nullTimer() </script>'; 
  } 
  elseif (isset($_POST['history'])) {
    $category = "история";
    $Easyword = extractCategoryFromDatabaseEasy($category);
    $EasyMeaning = extractMeaningFromDatabaseEasy($Easyword);
      echo "<style>body { background-image: url('background images/history.png'); background-size: 220px 220px; background-repeat: no-repeat; }</style>";
      echo '<script> nullTimer() </script>'; 
  }
  elseif (isset($_POST['old_words'])) {
    $category = "стари български думи";
    $Easyword = extractCategoryFromDatabaseEasy($category);
    $EasyMeaning = extractMeaningFromDatabaseEasy($Easyword);
      echo "<style>body { background-image: url('background images/books.svg'); background-size: 220px 220px; background-repeat: no-repeat; }</style>";
      echo '<script> nullTimer() </script>'; 
  }
  elseif (isset($_POST['human_and_nature'])) {
    $category = "човек и природа";
    $Easyword = extractCategoryFromDatabaseEasy($category);
    $EasyMeaning = extractMeaningFromDatabaseEasy($Easyword);
      echo "<style>body { background-image: url('background images/geography.png'); background-size: 220px 220px; background-repeat: no-repeat; }</style>";
      echo '<script> nullTimer() </script>'; 
  }
  elseif (isset($_POST['5_letter_word'])) {
    header("Location: gameWordMedium.php");
  }
  elseif (isset($_POST['7_letter_word'])) {
    header("Location: gameWordHard.php");
  }
  elseif (isset($_POST['opposite_word'])) {
    header("Location: gameWordOpposite.php");
  }
}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body style="text-align: center;" onload="GFG_Fun()">

    <style>

      
body { background-color: #ADD8E6;}

    .legend { margin-top: 10px; }
    .legend span { display: inline-block; width: 20px; height: 20px; margin-right: 5px; }
    .correct-place { background-color: greenyellow; }
    .wrong-place { background-color: gold; }
    .wrong-letter { background-color: red; }
    .timer { position: fixed; top: 10px; right: 10px; font-size: 24px; }
    .input-text {  border: 3px solid #605D5D; outline: none; width: 60px; height: 60px; line-height: 50px; padding: 0; font-size: 40px; text-align: center;
      font-weight: 600; text-transform: lowercase; -webkit-transition:all 0.3s; -moz-transition:all 0.3s; transition:all 0.3s; margin: 4px;  align-items: center; justify-content: center;}
    .input-text:hover { border-color: #c44913; }
    .inactive { cursor:not-allowed; opacity: 0.4; pointer-events: none; border-color: #AEC1C6;  }

    button { --color: #0077ff; font-family: inherit; display: inline-block; width: 6em; height: 2.6em; line-height: 2.5em; overflow: hidden; margin: 20px; font-size: 17px; z-index: 1; 
      color: var(--color); border: 2px solid var(--color); border-radius: 6px; position: relative;}
    button::before { position: absolute; content: ""; background: var(--color); width: 150px; height: 200px; z-index: -1; border-radius: 50%;}
    button:hover { color: white;}
    button:before { top: 100%; left: 100%; transition: .3s all;}
    button:hover::before { top: -30px; left: -30px;}
    
    .submit-button { font-size: 18px; padding: 0.5em 1.5em; border: transparent; box-shadow: 2px 2px 4px rgba(0,0,0,0.4); background: dodgerblue; color: white; border-radius: 4px;}
    .submit-button:hover { background: rgb(2,0,36); background: linear-gradient(90deg, rgba(30,144,255,1) 0%, rgba(0,212,255,1) 100%); }    
    .submit-button:active { transform: translate(0em, 0.2em);}
    </style>

<form method="post">
<p style="font-size: 1.5em;"> Бързо! Лесно! Интересно!  Познай думата!</p>
        <input type="submit" name="all" value="Обща" class="submit-button">
        <input type="submit" name="cooking" value="Кулинария" class="submit-button">
        <input type="submit" name="astronomy" value="Физика и астрономия" class="submit-button">
        <input type="submit" name="geography" value="География" class="submit-button">
        <input type="submit" name="history" value="История" class="submit-button">
        <input type="submit" name="human_and_nature" value="Човек и природа" class="submit-button">
        <input type="submit" name="old_words" value="Стари български думи" class="submit-button">
        <br>
        <p style="font-size: 1.3em;"> Ако ви е забавно, ето и други игри!</p>
        <input type="submit" name="5_letter_word" value="Познай думата с 5 букви" class="submit-button">
        <input type="submit" name="7_letter_word" value="Познай думата със 7 букви" class="submit-button">
        <input type="submit" name="opposite_word" value="Познай антонима" class="submit-button">
</form>

    <div class="legend">
    <span class="correct-place"></span> Вярна буква на коректното място
    <span class="wrong-place"></span> Вярна буква, но на грешното място
    <span class="wrong-letter"></span> Грешна буква
    </div>

    

<div id="timer" class="timer">
<script>
var timerElement = document.getElementById("timer");
var seconds = localStorage.getItem("timerSeconds") || 0; 
var intervalId;

function updateTimer() {
  var hours = Math.floor(seconds / 3600);
  var minutes = Math.floor((seconds % 3600) / 60);
  var formattedSeconds = seconds % 60;
  
  hours = (hours < 10 ? "0" : "") + hours;
  minutes = (minutes < 10 ? "0" : "") + minutes;
  formattedSeconds = (formattedSeconds < 10 ? "0" : "") + formattedSeconds;
  timerElement.textContent = hours + ":" + minutes + ":" + formattedSeconds;
  seconds++;
  localStorage.setItem("timerSeconds", seconds);
}

function stopTimer() {
  clearInterval(intervalId);
}

intervalId = setInterval(updateTimer, 1000);
document.getElementById("secondsInput").value = seconds;

function nullifyTimer() {
  seconds = 0;
  localStorage.setItem("timerSeconds", seconds);
  stopTimer();
}

</script>
</div>

    <p id="GFG_DOWN"></p>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/tsparticles-confetti@2.9.3/tsparticles.confetti.bundle.min.js"></script>


<script>
function lowerCaseF(a){ setTimeout(function(){a.value = a.value.toLowerCase(); }, 1);}

function calculatePoints(sec, click) {
  var points = 0;

  if (sec <= 300) { 
    points = 10;
    if(sec < 30) {points *= 2}
    else if(sec < 60) {points *= 1.9}
    else if (sec < 90) {points *= 1.7}
    else if (sec < 120) {points *= 1.5}
    else if (sec < 150) {points *= 1.4}
    else if (sec < 180) {points *= 1.2}
    else if (sec < 210) {points *= 1.1}
  } 
  else if (sec <= 600) { points = 5;} 
  else if (sec <= 900) { points = 2;} 
  else { points = 0;}
  
  if (click) { points *= 0.6; }
  return points;
}


function GFG_Fun() {
  var WordCount = 4;
  var WordsCount = WordCount * 6;

  const para = document.createElement("p");
  para.innerText = "Въведете дума:";
  para.style.fontSize = "18px";
  document.getElementById("GFG_DOWN").appendChild(para);

  var form = document.createElement("form");
  form.setAttribute("method", "post");
  form.setAttribute("name", "game");
  form.setAttribute("id", "game");
  form.addEventListener("submit", submitForm);

  var br = document.createElement("br");

  for (var j = 0; j < WordsCount; j += WordCount) {
    for (var i = 1; i <= WordCount; i++) {
      var FN = document.createElement("input");
      FN.setAttribute("type", "text");
      FN.setAttribute("name", "Letter" + (i + j).toString());
      FN.setAttribute("id", "Letter" + (i + j).toString());
      FN.setAttribute("class", "input-text");
      FN.setAttribute("maxlength", "1");
      FN.setAttribute("onkeydown", "lowerCaseF(this)");

      FN.addEventListener("input", function(e) {
        if (this.value.length === 1) {
          var nextInput = this.nextElementSibling;
          if (nextInput) {
            nextInput.focus();
          }
        }
      });

      FN.addEventListener("keydown", function(e) {
        if (e.keyCode === 8 && this.value === "") {
          e.preventDefault();
          var prevInput = this.previousElementSibling;
          if (prevInput) {
            prevInput.focus();
          }
        }
      });

      form.appendChild(FN);
    }
    form.appendChild(br.cloneNode());
    form.appendChild(br.cloneNode());
  }

  const button = document.createElement("button");
  const link = document.createElement("a");
  link.href = "homescreen.php";
  link.textContent = "Връщане назад";
  button.appendChild(link);
  form.appendChild(button);

  var secondsInput = document.createElement("input");
  secondsInput.setAttribute("type", "hidden");
  secondsInput.setAttribute("name", "seconds");
  secondsInput.setAttribute("value", seconds);
  form.appendChild(secondsInput);

  form.appendChild(br.cloneNode());
  document.getElementById("GFG_DOWN").appendChild(form);
}


function submitForm(event) {
  event.preventDefault();


  var form = document.getElementById("game");
  var inputs = form.getElementsByTagName("input");
  var targetWord = "<?php echo $Easyword; ?>";

  var buttonClicked = false;
  var button = document.getElementById('delayedButton');
  if (button.disabled) {buttonClicked = true;}

  var greenCount = 0;
  var formData = new FormData();

  for (var i = 0; i < inputs.length; i++) {
    var input = inputs[i];
    var inputValue = input.value;
    var letter = inputValue.toLowerCase();

    input.style.backgroundColor = "";

    if (letter) {
      input.disabled = true;


      var targetIndex = i % targetWord.length;

      if (letter == targetWord[targetIndex]) {
        input.style.backgroundColor = "greenyellow";
        greenCount++;
      } else if (targetWord.includes(letter)) {
        input.style.backgroundColor = "gold";
      } else {
        input.style.backgroundColor = "red";
      }
    }

    formData.append("letters[]", letter);


    if ((i + 1) % targetWord.length === 0 && greenCount < 4) {
      greenCount = 0;
    }
  }

  if (greenCount >= 4) {

    var points = calculatePoints(seconds, buttonClicked);

    formData.append("username", "<?php echo $_SESSION['user_id'] ?>");
    formData.append("points", points);
    formData.append("seconds", seconds);
    fetch("processEasy.php", {
      method: "POST",
      body: formData
    })
      .then(function (response) {
        return response.text();
      })
      .then(function (data) {
        
        alert(data);
      })
      .catch(function (error) {
        
        alert("An error occurred: " + error);
      });
    

    nullifyTimer();

    form.remove();


   var thankYou = document.createElement("p");
   thankYou.innerText = "Вие спечелихте! Браво!";
   thankYou.style.color = "green";
   thankYou.style.fontSize = "20px"; 
   document.getElementById("GFG_DOWN").appendChild(thankYou);


   triggerConfetti();
  }
}



function triggerConfetti() {

  const duration = 15 * 1000,
  animationEnd = Date.now() + duration,
  defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

function randomInRange(min, max) {
  return Math.random() * (max - min) + min;
}

const interval = setInterval(function() {
  const timeLeft = animationEnd - Date.now();

  if (timeLeft <= 0) {
    return clearInterval(interval);
  }

  const particleCount = 50 * (timeLeft / duration);

  confetti(
    Object.assign({}, defaults, {
      particleCount,
      origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 },
    })
  );
  confetti(
    Object.assign({}, defaults, {
      particleCount,
      origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 },
    })
  );
}, 250);
}

</script>

<table style="border-collapse: collapse; width:250px; margin-left: auto; margin-right: 0; position: absolute; top: 50%; left: 0; transform: translate(10%, -50%);">
<tr>
<th style='font-size: 1.5em;'> Възможните букви могат да са: </th>
</tr>
<tr>
<td>
<?php
$BulgarianAlphabet = "абвгдежзийклмнопрстуфхцчшщъьюя";
$letters = preg_split('//u', $BulgarianAlphabet, -1, PREG_SPLIT_NO_EMPTY);
shuffle($letters);

function generateRandomPercentage() { return mt_rand(0, 50);}

$count = 0;

foreach ($letters as $letter) {
  $probability = calculateLetterProbability($Easyword, $letter);

  if ($probability > 0 && $probability <= 25) {echo "<span style='font-size: 1em;'>$letter:</span> <span style='font-size: 1.5em;'>😑</span><br>\n";} 
  else if ($probability > 25 && $probability <= 50) {echo "<span style='font-size: 1em;'>$letter:</span> <span style='font-size: 1.5em;'>🙂</span><br>\n";} 
  else if ($probability > 50 && $probability <= 75) {echo "<span style='font-size: 1em;'>$letter:</span> <span style='font-size: 1.5em;'>😁</span><br>\n";} 
  else if ($probability > 75 && $probability <= 100) {echo "<span style='font-size: 1em;'>$letter:</span> <span style='font-size: 1.5em;'>🤩</span><br>\n";}

  while ($count < 2) {
    $randomLetter = $letters[array_rand($letters)];
    if (strpos($Easyword, $randomLetter) === false) 
    { 
      $randomPercentage = generateRandomPercentage();

    if ($randomPercentage > 0 && $randomPercentage <= 25) { echo "<span style='font-size: 1em;'>$randomLetter:</span> <span style='font-size: 1.5em;'>😑</span><br>\n";} 
    else if ($randomPercentage > 25 && $randomPercentage <= 50) {echo "<span style='font-size: 1em;'>$randomLetter:</span> <span style='font-size: 1.5em;'>🙂</span><br>\n";} 
    else if ($randomPercentage > 50 && $randomPercentage <= 75) {echo "<span style='font-size: 1em;'>$randomLetter:</span> <span style='font-size: 1.5em;'>😁</span><br>\n";} 
    else if ($randomPercentage > 75 && $randomPercentage <= 100) {echo "<span style='font-size: 1em;'>$randomLetter:</span> <span style='font-size: 1.5em;'>🤩</span><br>\n";}
    }
    $count++;
  }
}
?>
</td>
</tr>

<tr>
<td>
<button id="delayedButton" style="display: none;">Подсказка</button>
<script>
var delayedButton = document.getElementById("delayedButton");

function showDelayedButton() { delayedButton.style.display = "block";}
function showMessage() { $hint = "<?php echo $EasyMeaning; ?>"; alert($hint); delayedButton.disabled = true;}
setTimeout(showDelayedButton, 62000);
delayedButton.addEventListener("click", showMessage);
</script>
</td>
</tr>


</table>


<table style="border-collapse: collapse; margin-left: 0; margin-right: auto; position: absolute; top: 50%; right: 0; transform: translate(-5%, -50%);">
      <tr>
      <td>
      <?php
// Database connection
try {
    $conn = new PDO("mysql:host=localhost;dbname=wordguessinggame", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Retrieve player information
    $query = "SELECT game_player, game_points,game_time_seconds FROM games_played WHERE game_difficulty = 'easy' ORDER BY game_points DESC LIMIT 3; ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<style>";
    echo "th, td { border: 1px solid black; padding: 8px; font-size: 1.5em;}";
    echo "h1 {text-align: center; font-size: 1.5em;}";
    echo "</style>";

    // Display leaderboard
    echo "<h1>Ранглиста</h1>";
    echo "<table>";
    echo "<tr><th>Ранг</th><th>Потребителско име </th><th>Точки</th><th>Секунди</th></tr>";

    $rank = 1;
    foreach ($results as $row) {
        $game_player = $row['game_player'];
        $game_points = $row['game_points'];
        $game_time_seconds = $row['game_time_seconds'];

        echo "<tr><td>$rank</td><td>$game_player</td><td>$game_points</td><td>$game_time_seconds</td></tr>";

        $rank++;
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


    </td>
  </tr>
  </table>
    

</body>
</html>