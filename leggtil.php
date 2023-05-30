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
        <form class="loggInForm" method="post" enctype="multipart/form-data">
        <!-- <form class="loggInForm" method="post"> -->

            <label for="productName">Produkt navn:</label>
            <input type="text" name="productName">
            <br>
            <label for="productDescription">Produkt beskrivelse:</label>
            <input type="text" name="productDescription">
            <br>
            <label for="price">Produkt pris:</label>
            <input type="number" name="price">
            <br>
            <label>Select Image File:</label>
            <input type="file" name="image">
            <br>
            <button type="submit" name="submit" class="leggtilbtn" value="Upload">Legg til produkt</button>
        </form>
<?php

// Include the database configuration file  
require_once 'dbConfig.php'; 
 
// If file upload form is submitted 
if(isset($_POST["submit"])){ 
    $productName = $_POST['productName'];
$productDescription = $_POST['productDescription'];
$price = $_POST['price'];
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            $insert = $db->query("INSERT INTO images (productName, productDescription, price, image, created) VALUES ('$productName','$productDescription','$price','$imgContent', NOW())"); 
             
            if($insert){ 
                echo "Nytt produkt lagt til! Trykk <a href='index.php'>her</a> for å gå tilbake til hovedsiden.";
            }else{ 
                echo  "File upload failed, please try again."; 
            }  
        }else{ 
            echo 'Sorry, feil fil format på bildet'; 
        } 
    }else{ 
        echo 'Velg et bildet til produkten'; 
    } 
} 
?>
    </div>
</body>

</html>