
<?php
    function calculateLetterProbability($text, $letter) {
      $text = mb_strtolower($text, 'UTF-8');
      $text = str_replace(' ', '', $text);
      $totalLetters = mb_strlen($text, 'UTF-8');
      $letterOccurrences = mb_substr_count($text, mb_strtolower($letter, 'UTF-8'), 'UTF-8');
      
      if ($letterOccurrences === 0) {
        return 0;
      }
      
      $probability = 1 / $letterOccurrences;
      return $probability * 100;
    }

  function extractWordFromDatabaseEasy() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wordguessinggame";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT word FROM bulgarianwordseasy ORDER BY RAND() LIMIT 1";

    $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) { while($row = mysqli_fetch_assoc($result)) { return $row["word"];} } 
   else {return "Няма резултати";}
}

function extractMeaningFromDatabaseEasy($word) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);
  
  $sanitizedWord = mysqli_real_escape_string($conn, $word);
  
  $sql = "SELECT meaning FROM bulgarianwordseasy WHERE word = '$sanitizedWord'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { return $row["meaning"];}} 
  else {return "Няма резултати за тази дума";}
}

function extractCategoryFromDatabaseEasy($word) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);
  
  $sanitizedWord = mysqli_real_escape_string($conn, $word);
  
  $sql = "SELECT word FROM bulgarianwordseasy WHERE category = '$sanitizedWord' ORDER BY RAND() LIMIT 1";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { return $row["word"];}} 
  else {return "Няма резултати";}
}

function extractWordFromDatabaseMedium() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wordguessinggame";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT word FROM bulgarianwordsmedium ORDER BY RAND() LIMIT 1";

    $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) { while($row = mysqli_fetch_assoc($result)) { return $row["word"];} } 
   else {return "Няма резултати";}
}

function extractMeaningFromDatabaseMedium($word) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);

  $sanitizedWord = mysqli_real_escape_string($conn, $word);
  
  $sql = "SELECT meaning FROM bulgarianwordsmedium WHERE word = '$sanitizedWord'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { return $row["meaning"];}} 
  else {return "Няма резултати за тази дума";}
}

function extractCategoryFromDatabaseMedium($word) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);

  $sanitizedWord = mysqli_real_escape_string($conn, $word);
  
  $sql = "SELECT word FROM bulgarianwordsmedium WHERE category = '$sanitizedWord' ORDER BY RAND() LIMIT 1";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { return $row["word"];}} 
  else {return "Няма резултати";}
}

function extractWordFromDatabaseHard() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wordguessinggame";

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT word FROM bulgarianwordshard ORDER BY RAND() LIMIT 1";

    $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result) > 0) { while($row = mysqli_fetch_assoc($result)) { return $row["word"];} } 
   else {return "Няма резултати";}
}

function extractMeaningFromDatabaseHard($word) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);

  $sanitizedWord = mysqli_real_escape_string($conn, $word);
  
  $sql = "SELECT meaning FROM bulgarianwordshard WHERE word = '$sanitizedWord'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { return $row["meaning"];}} 
  else {return "Няма резултати за тази дума";}
}

function extractCategoryFromDatabaseHard($word) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);

  $sanitizedWord = mysqli_real_escape_string($conn, $word);
  
  $sql = "SELECT word FROM bulgarianwordshard WHERE category = '$sanitizedWord' ORDER BY RAND() LIMIT 1";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { return $row["word"];}} 
  else {return "Няма резултати";}
}


function extractWordFromDatabaseOpposite() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);
  $sql = "SELECT word FROM bulgarianwordsopposite ORDER BY RAND() LIMIT 1";

  $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) > 0) { while($row = mysqli_fetch_assoc($result)) { return $row["word"];} } 
 else {return "Няма резултати";}
}

function extractOppositeWordFromDatabase($word) {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);

  $sanitizedWord = mysqli_real_escape_string($conn, $word);
  
  $sql = "SELECT opposite FROM bulgarianwordsopposite WHERE word = '$sanitizedWord'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result)) { return $row["opposite"];}} 
  else {return "Няма резултати за тази дума";}
}

function checkExistingEmail($email) {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "wordguessinggame";

  $conn = new mysqli($servername, $username, $password, $dbname);

    $escapedEmail = mysqli_real_escape_string($conn, $email);
    
    $query = "SELECT COUNT(*) AS count FROM users WHERE email = '$escapedEmail'";
    
    $result = mysqli_query($conn, $query);
    
    if ($result) {

        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];
        
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>