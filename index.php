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
        <div id="faqbtn" class="adminOpt1">
            <a href="FAQ.php">FAQ</a>
        </div>
    </div>
    <div class="contentBox">

        <div class="mainContent"></div>

        <div class="row">

            <?php

// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// Get image data from database 
$result = $db->query("SELECT id, productName, productDescription, price, image from images"); 


        foreach($result as $row){
            echo '<div class="product">';
            echo '<div class="productPicture">';
            echo '<img src="data:image/jpg;charset=utf8;base64,';
            echo base64_encode($row['image']);
            echo '"/>';
            echo '</div>';
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

        // echo '<img src="img/ echo $row["image"]; " width = 200 title="<?php echo $row["image"];">';

        }
?>

        </div>
    </div>
    </div>

</body>




</html>