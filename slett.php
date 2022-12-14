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
        <div class="adminOpt1 active">
            <a href="slett.php">Slett produkt</a>
        </div>
        <div class="adminOpt1">
            <a href="rediger.php">Rediger produkt</a>
        </div>
    </div>
    </div>

    <div class="contentBox">
        <h1>Slett produkter:</h1>

        <div class="row">
            <?php

            $dbc = mysqli_connect('localhost', 'root', '', 'adminbrukere')
                or die('Error connecting to MySQL server.');




            $query = "SELECT id, productName, productDescription, price from products";

            $result = mysqli_query($dbc, $query)
                or die('Error querying database.');

            mysqli_close($dbc);



            foreach ($result as $row) :
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
                echo '<form method="post" class="addCartBtnWrap">';
                echo '<input type="hidden" name="id" value="';
                echo $row["id"];
                echo '">';
                echo '<input type="hidden" name="deletebtn">';
                echo '<input type="submit" name="';
                echo $row['id'];
                echo '" class="addToCartBtn" value="Slett"/>';
                echo '</form>';
                // echo '<div class="addCartBtnWrap"><button class="addToCartBtn">Slett</button>';
                // echo '</div>';
                echo '</div>';
                echo '</div>';


            endforeach;


            function deletebtn($id)
            {


                $dbc = mysqli_connect('localhost', 'root', '', 'adminbrukere')
                    or die('Error connecting to MySQL server.');

                $query = "DELETE FROM products WHERE id='$id'";

                $result = mysqli_query($dbc, $query)
                    or die('Error querying database.');

                mysqli_close($dbc);

                header("Refresh:0");

            }

            if (isset($_POST['deletebtn'])) {
                
                $id = $_POST['id'];
                deletebtn($id);
                

            }

            ?>
        </div>
</body>

</html>