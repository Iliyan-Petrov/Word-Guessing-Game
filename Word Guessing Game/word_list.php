<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Invisible Table Example</title>
  <style>
    body {
      background-color: #ADD8E6;
    }

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

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      height: 100vh;
    }

    table {
      border-collapse: collapse;
      margin: 0 auto;
      background-color: white;
    }

    table,
    th,
    td {
      border: 1px solid black;
      padding: 5px;
    }

    th,
    td {
      font-size: 16px;
    }

    .table-container {
      margin-top: 20px;
      max-height: 400px;
      overflow-y: auto;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <form method="post" action="">
    <table>
      <th style="font-size: 1.5em;">Думи с 4 букви </th>
      <th style="font-size: 1.5em;">Думи с 5 букви </th>
      <th style="font-size: 1.5em;">Думи с 7 букви </th>
      <th style="font-size: 1.5em;">Думи с антоними </th>
      <tr>
        <td><input type="submit" name="EasySearch" value="Търсене"></td>
        <td><input type="submit" name="MediumSearch" value="Търсене"></td>
        <td><input type="submit" name="HardSearch" value="Търсене"></td>
        <td><input type="submit" name="OppositeSearch" value="Търсене"></td>
      </tr>
    </table>
  </form>
  <div class="table-container">
    <?php
    if (isset($_POST['EasySearch'])) {
      $conn = new mysqli("localhost", "root", "", "wordguessinggame");

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT word, meaning FROM bulgarianwordseasy";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<th style='font-size: 1.5em;'>Дума</th><th style='font-size: 1.5em;'>Значение</th></tr>";

        while ($row = $result->fetch_assoc()) {
          echo "<tr><td style='font-size: 1.3em;'>" . $row["word"] . "</td><td style='font-size: 1.3em;'>" . $row["meaning"] . "</tr>";
        }

        echo "</table>";
      } else {
        echo "No words found.";
      }

      $conn->close();
    } else if (isset($_POST['MediumSearch'])) {
      $conn = new mysqli("localhost", "root", "", "wordguessinggame");

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT word, meaning FROM bulgarianwordsmedium";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<th style='font-size: 1.5em;'>Дума</th><th style='font-size: 1.5em;'>Значение</th></tr>";

        while ($row = $result->fetch_assoc()) {
          echo "<tr><td style='font-size: 1.3em;'>" . $row["word"] . "</td><td style='font-size: 1.3em;'>" . $row["meaning"] . "</tr>";
        }

        echo "</table>";
      } else {
        echo "No words found.";
      }

      $conn->close();
    } else if (isset($_POST['HardSearch'])) {
      $conn = new mysqli("localhost", "root", "", "wordguessinggame");

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT word, meaning FROM bulgarianwordshard";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<th style='font-size: 1.5em;'>Дума</th><th style='font-size: 1.5em;'>Значение</th></tr>";

        while ($row = $result->fetch_assoc()) {
          echo "<tr><td style='font-size: 1.3em;'>" . $row["word"] . "</td><td style='font-size: 1.3em;'>" . $row["meaning"] . "</tr>";
        }

        echo "</table>";
      } else {
        echo "No words found.";
      }

      $conn->close();
    } else if (isset($_POST['OppositeSearch'])) {
      $conn = new mysqli("localhost", "root", "", "wordguessinggame");

      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT word, opposite FROM bulgarianwordsopposite";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<th style='font-size: 1.5em;'>Дума</th><th style='font-size: 1.5em;'>Антоним</th></tr>";

        while ($row = $result->fetch_assoc()) {
          echo "<tr><td style='font-size: 1.3em;'>" . $row["word"] . "</td><td style='font-size: 1.3em;'>" . $row["opposite"] . "</tr>";
        }

        echo "</table>";
      } else {
        echo "No words found.";
      }

      $conn->close();
    }
    ?>
  </div>
  <br>
  <a href="homescreen.php">
    <button style="margin: auto; display: flex; justify-content: center; align-items: center;">
      Назад
    </button>
  </a>
</body>
</html>
