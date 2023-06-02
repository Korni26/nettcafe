<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<a href="index.php">
<div class="logo"></div>
    </a>
    <div class="topBar">
    <?php
    session_start();
if( isset($_SESSION["brukernavn"]) ){
    echo '<a href="adminside.php">';
    echo '<div class="loggInBtn">';
    echo '<p>';
    echo 'adminside';
    echo '</p>';
    echo '</div>';
    echo '</a>';
} else{
    echo '<a href="loggInPage.php">';
    echo '<div class="loggInBtn">';
    echo '<p>';
    echo 'Logg inn';
    echo '</p>';
    echo '</div>';
    echo '</a>';
}
?>
    </div>
    <div class="menuBox">
    </div>
    <div class="contentBox">
    <div class="row faqrow">
    <details class="faqbox">
  <summary>Hva er hensikten med denne nettsiden?</summary>
  <p>Nettcafe er prosjekt jeg har jobbet med gjennom skoleåret. Det er en administrator nettside for en cafe som har lyst til å selge eller vise fram produktene sine på nettet. Målet er at en administrator kan logge seg på siden og redigere innhold på den. Nettsiden er satt opp på en Linux Debian server på en virtuell maskin på Hyper-V. </p>
</details>

<details class="faqbox">
  <summary>Hvordan er nettsiden laget?</summary>
  <p>Alt på denne siden er laget av Kornel Lowczanin. Nettsiden er skrevet i PHP og har en SQL-server.</p>
</details>

<details class="faqbox">
  <summary>Har du andre spørsmål?</summary>
  <p>Hvis du har andre spørsmål kan du stille de i skjemaet nedenfor</p>
</details>
    </div>

    <div class="row">
      <form class="loggInForm faqForm" method="post">
        <label for="Email">Din E-mai:</label>
        <input type="text" name="Email">
        <br>
        <label for="Navn">Navnet ditt:</label>
        <input type="text" name="Navn">
        <br>
        <label for="question">Hva vil du spørre om?</label>
        <input type="text" name="question" class="bigInput">
        <br>
        <button type="submit" name="submit">Send spørsmålet!</button>
      </form>
    </div>

    <?php
    if(isset($_POST["submit"])){
      $Email = $_POST['Email'];
      $Navn = $_POST['Navn'];
      $question = $_POST['question'];

      require_once 'dbConfig.php'; 
 
// Get image data from database 
$insert = $db->query("INSERT INTO faq (Email, Navn, question) VALUES ('$Email', '$Navn', '$question')");

if($insert){
  echo 'Spørsmålet ditt er sendt! Vi skal prøve å svare deg fortest mulig.';
}
      }
    ?>

</div>
<script src="main.js"></script>
</body>
</html>
