<?php
session_start();
if( !isset($_SESSION["brukernavn"]) ){
header("location:loggInPage.php");
}
?>

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
	<a href="loggInPage.php">
        <div class="loggInBtn">
            <p>logg ut</p>
        </div>
		</a>
    </div>
    <div class="menuBox">
        <div class="adminOpt1">
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
    <div class="row">


<?php

        $dbc = mysqli_connect('localhost', 'root', '', 'nettcafedb')
          or die('Error connecting to MySQL server.');

        $query = "SELECT id, productName, productDescription, price from products";

        $result = mysqli_query($dbc, $query)
            or die('Error querying database.');

        mysqli_close($dbc);

        foreach($result as $row){
            echo '<div class="product">';
            echo '<div class="productPicture"></div>';
            echo '<div class="productDescription">';
                echo '<div class="prouctText">';
                    echo '<h2 class="productName">';
                    echo $row['productName'];
                    echo '</h2>';
                    echo '<div class="aboutProduct">';
                        echo '<p>';
                        echo $row['productDescription'];
                        echo '</p>';
                    echo '</div>';
                echo '</div>';
                echo '<div class="addCartBtnWrap"><button class="addToCartBtn">add to cart</button>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        }
?>

</div>
</body>
</html>
