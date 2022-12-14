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
        <div class="loggInBtn">
            <p>logg in</p>
        </div>
		</a>
    </div>
    <div class="menuBox">
    <div class="adminOpt1 active topbox">
            <a href="leggtil.php">Legg til product</a>
        </div>
        <div class="adminOpt1">
            <a href="slett.php">Slett produkt</a>
        </div>
        <div class="adminOpt1">
            <a href="rediger.php">Rediger produkt</a>
        </div>
    </div>

    <div class="contentBox">
        <form class="loggInForm" method="post">
            <label for="productName">Produkt navn:</label>
            <input type="text" name="productName">
            <br>
            <label for="productDescription">Produkt beskrivelse:</label>
            <input type="text" name="productDescription">
            <br>
            <label for="price">Produkt pris:</label>
            <input type="number" name="price">
            <br>
            <button type="submit" name="submit" class="leggtilbtn">Legg til produkt</button>
        </form>

<?php
if(isset($_POST['submit'])){
$productName = $_POST['productName'];
$productDescription = $_POST['productDescription'];
$price = $_POST['price'];

$dbc = mysqli_connect('localhost', 'root', '', 'adminbrukere')
    or die('Error connecting to MySQL server.');

$query = "INSERT INTO products (productName, productDescription, price) VALUES ('$productName','$productDescription','$price')";

$result = mysqli_query($dbc, $query)
    or die('Error querying database.');

mysqli_close($dbc);

if($result){
    //Gyldig login]
    echo "Nytt produkt lagt til! Trykk <a href='index.php'>her</a> for å gå tilbake til hovedsiden.";
}else{
    //Ugyldig login
    echo "Noe gikk galt, prøv igjen!";
}
}
?>
    </div>
</body>
</html>