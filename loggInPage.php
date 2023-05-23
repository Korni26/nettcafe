<?php
session_start();
unset($_SESSION["brukernavn"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="index.php">
        <div class="logo"></div>
    </a>
    <div class="topBar">
	<a href="loggInPage.php">
        <div class="loggInBtn"></div>
	</a>
    </div>
    <div class="menuBox"></div>
        <div class="contentBox">
                <form class="loggInForm" method="post">
                    <br>
                    <label for="brukernavn">Brukernavn</label>
                    <input type="text" name="brukernavn">
                    <br>
                    <label for="passord">Passord</label>
                    <input type="password" name="passord" id="passord">
                    <div class="check">
                    <!-- <input type="checkbox"> -->
                    <!-- <label for="checkbox">Se passord</label> -->
                    </div>
                    <br>
                    <button type="submit" name="submit">Send</button>
                </form>
        </div>
        <script src="main.js"></script>
</body>
<?php
if(isset($_POST['submit'])){
    $brukernavn = $_POST['brukernavn'];
    $passord = $_POST['passord'];

    $dbc = mysqli_connect('localhost', 'root', '', 'nettcafedb')
        or die('Error connecting to MySQL server');

    $query = "SELECT brukernavn, passord from adminuser where brukernavn='$brukernavn' and passord='$passord'";

    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');

    mysqli_close($dbc);

    // var_dump($result);

    if($result->num_rows > 0){
        session_start();
        $_SESSION['brukernavn'] = $brukernavn;
        header('location: adminSide.php');
    }else{
        header('location: loggInPage.php');
        var_dump('ikke bra');
    }
}
?>
</html>