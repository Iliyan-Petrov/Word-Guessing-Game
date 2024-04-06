<?php
include 'functions.php';
$Word = '';
$Meaning = '';

if(isset($_POST['EasySearch']))
{
$Word = $_POST['EasyWord'];
$Meaning = extractMeaningFromDatabaseEasy($Word);
}

else if(isset($_POST['MediumSearch']))
{
$Word = $_POST['MediumWord'];
$Meaning = extractMeaningFromDatabaseMedium($Word);
}

else if(isset($_POST['HardSearch']))
{
$Word = $_POST['HardWord'];
$Meaning = extractMeaningFromDatabaseHard($Word);
}

else if(isset($_POST['OppositeSearch']))
{
$Word = $_POST['OppositeWord'];
$Meaning = extractOppositeWordFromDatabase($Word);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Invisible Table Example</title>
<style>

body { background-color: #ADD8E6;}

button {
  --color: #0077ff; font-family: inherit; display: inline-block; width: 6em; height: 2.6em; line-height: 2.5em; overflow: hidden;
  margin: 20px; font-size: 17px; z-index: 1; color: var(--color); border: 2px solid var(--color); border-radius: 6px; position: relative;
}

button::before {
  position: absolute; content: ""; background: var(--color); width: 150px; height: 200px; z-index: -1; border-radius: 50%;
}

button:hover {
  color: white;
}

button:before {
  top: 100%; left: 100%; transition: .3s all;
}

button:hover::before {
  top: -30px; left: -30px;
}


body {
display: flex; justify-content: center; align-items: center; flex-direction: column; height: 100vh;
}


table {
border-collapse: collapse; margin-bottom: 20px; 
}

th {
  font-size: 18px; margin-bottom: 10px; padding: 10px 20px;
}

td {
  text-align: center;
}
    
textarea {
  width: 1000px; height: 300px; font-size: 18px; resize: none;
}
  
</style>
</head>
<body>

<form method="post" action="">

<table>
<th >Търсене на думи с 4 букви </th>
<th>Търсене на думи с 5 букви </th>
<th>Търсене на думи с 7 букви </th>
<th>Търсене на думи с антоними </th>

<tr>
<td><input type="text" name="EasyWord" id="EasyWord"></td>
<td><input type="text" name="MediumWord" id="MediumWord"></td>
<td><input type="text" name="HardWord" id="HardWord"></td>
<td><input type="text" name="OppositeWord" id="OppositeWord"></td>
</tr>

<tr>
<td><input type="submit" name="EasySearch" value="Търсене"></td>
<td><input type="submit" name="MediumSearch" value="Търсене"></td>
<td><input type="submit" name="HardSearch" value="Търсене"></td>
<td><input type="submit" name="OppositeSearch" value="Търсене"></td>
</tr>
  
</table>

<textarea id="resultTextarea" readonly><?php echo "$Word - $Meaning"; ?></textarea>
</form>

<br>
<a href="homescreen.php"><button style="margin: auto; display: flex; justify-content: center; align-items: center;">Назад</button></a>

</body>
</html>
