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
    <div class="row">
    <details class="faqbox">
  <summary>Hva er hensikten med denne nettsiden?</summary>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis magni nihil repellat odio cupiditate asperiores similique quis quia placeat doloribus fugiat explicabo earum, consectetur ex. Laboriosam enim commodi quam veniam!</p>
</details>

<details class="faqbox">
  <summary>Hvordan er nettsiden laget?</summary>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis magni nihil repellat odio cupiditate asperiores similique quis quia placeat doloribus fugiat explicabo earum, consectetur ex. Laboriosam enim commodi quam veniam!</p>
</details>

<details class="faqbox">
  <summary>Har du andre spørsmål?</summary>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis magni nihil repellat odio cupiditate asperiores similique quis quia placeat doloribus fugiat explicabo earum, consectetur ex. Laboriosam enim commodi quam veniam!</p>
</details>
    </div>


</div>
<script src="main.js"></script>
</body>
</html>
