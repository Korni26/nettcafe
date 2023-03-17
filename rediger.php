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
<<<<<<< HEAD
                    <th>id</th>
=======
>>>>>>> 8a523e0258b35d2732856415880ea2f96323fa51
                    <th>Produkt navn</th>
                    <th>Produkt beskrivelse</th>
                    <th>Pris</th>
                </tr>
                <?php

                $dbc = mysqli_connect('localhost', 'root', '', 'adminbrukere')
                    or die('Error connecting to MySQL server.');

                $query = "SELECT id, productName, productDescription, price from products";

                $result = mysqli_query($dbc, $query)
                    or die('Error querying database.');

                mysqli_close($dbc);

                foreach ($result as $row) {
                    echo '<tr>';
                    echo '<td>';
<<<<<<< HEAD
                    echo $row["id"];
                    echo '</td>';
                    echo '<td>';
=======
>>>>>>> 8a523e0258b35d2732856415880ea2f96323fa51
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
<<<<<<< HEAD
                    echo '<input type="hidden" name="id" value="';
                    echo $row["id"];
                    echo '">';
                    echo '<input type="hidden" name="editInput">';
                    echo '<input type="submit" name="';
                    echo $row['id'];
                    echo '" class="addToCartBtn" value="Rediger"/>';
=======
                    echo '<input type="submit" name="
                " class="addToCartBtn" value="Rediger"/>';
>>>>>>> 8a523e0258b35d2732856415880ea2f96323fa51
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }
<<<<<<< HEAD
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

            $dbc = mysqli_connect('localhost', 'root', '', 'adminbrukere')
                or die('Error connecting to MySQL server.');

            $query = " UPDATE products SET productName = '$productName', productDescription = '$productDescription', price = '$price' WHERE id = '$id';";

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
=======

                ?>
            </table>
        </div>
>>>>>>> 8a523e0258b35d2732856415880ea2f96323fa51
</body>

</html>