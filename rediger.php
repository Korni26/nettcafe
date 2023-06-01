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
    <?php
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
        <div class="adminOpt1">
            <a href="leggtil.php">Legg til product</a>
        </div>
        <div class="adminOpt1">
            <a href="slett.php">Slett produkt</a>
        </div>
        <div class="adminOpt1 active">
            <a href="rediger.php">Rediger produkt</a>
        </div>
    </div>
    </div>

    <div class="contentBox">

        <div class="row">
            <table>
                <tr>
                    <th>id</th>
                    <th>Produkt navn</th>
                    <th>Produkt beskrivelse</th>
                    <th>Pris</th>
                </tr>
                <?php

    // Include the database configuration file  
    require_once 'dbConfig.php'; 
 
    // Get image data from database 
    $result = $db->query("SELECT id, productName, productDescription, price from images"); 

                foreach ($result as $row) {
                    echo '<tr>';
                    echo '<td>';

                    echo $row["id"];
                    echo '</td>';
                    echo '<td>';


                    echo $row['productName'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['productDescription'];
                    echo '</td>';
                    echo '<td>';
                    echo $row['price'];
                    echo '</td>';
                    echo '<td>';
                    echo '<form method="post" class="addCartBtnWrap">';

                    echo '<input type="hidden" name="id" value="';
                    echo $row["id"];
                    echo '">';
                    echo '<input type="hidden" name="editInput">';
                    echo '<input type="submit" name="';
                    echo $row['id'];
                    echo '" class="addToCartBtn" value="Rediger"/>';

                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }

                ?>

            </table>
        </div>
        <?php
        function editInput($id)
        {
            echo '<form class="loggInForm" method="post">';
            echo '<label for="productName">Produkt navn:</label>';
            echo '<input type="text" name="productName">';
            echo '<br>';
            echo '<label for="productDescription">Produkt beskrivelse:</label>';
            echo '<input type="text" name="productDescription">';
            echo '<br>';
            echo '<label for="price">Produkt pris:</label>';
            echo '<input type="number" name="price">';
            echo '<br>';
            echo '<input type="hidden" name="id" value="';
            echo $id;
            echo '">';
            echo '<input type="hidden" name="editProduct">';
            echo '<button type="submit" name="submit" class="leggtilbtn">Rediger produkt med id :';
            echo  $id;
            echo '</button>';
            echo '</form>';
        }

        if (isset($_POST['editInput'])) {

            $id = $_POST['id'];
            editInput($id);
        }

        function editProduct($id)
        {
            $productName = $_POST['productName'];
            $productDescription = $_POST['productDescription'];
            $price = $_POST['price'];

//             // Include the database configuration file  
// require_once 'dbConfig.php'; 
 
// // Get image data from database 
// $result = $db->query("UPDATE products SET productName = '$productName', productDescription = '$productDescription', price = '$price' WHERE id = '$id';"); 


            $dbc = mysqli_connect('localhost', 'root', '', 'nettcafedb')
                or die('Error connecting to MySQL server.');

            $query = " UPDATE images SET productName = '$productName', productDescription = '$productDescription', price = '$price' WHERE id = '$id';";

            $result = mysqli_query($dbc, $query)
                or die('Error querying database.');

            mysqli_close($dbc);

            if ($result) {
                echo 'produktet er redigert! ';
            } else {
                //Ugyldig login
                echo "Noe gikk galt, prøv igjen!";
            }
            header("Refresh:0");
        }

        if (isset($_POST['editProduct'])) {

            $id = $_POST['id'];
            editProduct($id);
        }
        ?>



    </div>


            </table>
        </div>

</body>

</html>