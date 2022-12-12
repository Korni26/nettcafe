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
                    echo '<input type="submit" name="
                " class="addToCartBtn" value="Rediger"/>';
                    echo '</form>';
                    echo '</td>';
                    echo '</tr>';
                }

                ?>
            </table>
        </div>
</body>

</html>