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
  min-height: 100vh; font-family: canada-type-gibson, sans-serif;
  font-weight: 300; font-size: 1.25rem; display: flex;
  flex-direction: column; justify-content: center;
  overflow: hidden; background-color: #eff8e2;
}

.content { display: flex; align-content: center; justify-content: center;}

.text_shadows {
  text-shadow: 3px 3px 0 var(--color-secondary), 6px 6px 0 var(--color-tertiary),
    9px 9px var(--color-quaternary), 12px 12px 0 var(--color-quinary);
  font-family: bungee, sans-serif; font-weight: 400;
  text-transform: uppercase; font-size: calc(2rem + 5vw);
  text-align: center; margin: 0; color: var(--color-primary);
  color: transparent; background-color: white; background-clip: text;
  animation: shadows 1.2s ease-in infinite, move 1.2s ease-in infinite;
  letter-spacing: 0.4rem;
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
  
</style>

<body>
  
   <h2 style="margin: auto; font-size: 1.4em;">Здравейте!</h2>
   <h2 style="margin: auto; font-size: 1.4em;">Играй и думата познай!</h2>
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
   </table>   
</body>
</html>