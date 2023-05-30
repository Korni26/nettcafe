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

        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label>Select Image File:</label>
            <input type="file" name="image">
            <input type="submit" name="submit" value="Upload">
        </form>


    </div>
    </div>
    </div>

</body>




</html>