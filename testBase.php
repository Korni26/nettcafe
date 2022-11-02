<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>base</title>
</head>

<body>
    <form method="post">
        <label for="brukernavn">brukernavn</label>
        <input type="text" name="brukernavn">
        <br>
        <label for="passord">passord</label>
        <input type="text" name="passord" id="passord">
        <br>
        <button type="submit" name="submit">Send</button>
    </form>
</body>
<tbody>

<?php
if(isset($_POST['submit'])){
    $brukernavn = $_POST['brukernavn'];
    $passord = $_POST['passord'];

    $dbc = mysqli_connect('localhost', 'root', '', 'adminbrukere')
        or die('Error connecting to MySQL server');

    $query = "SELECT brukernavn, passord from adminuser where brukernavn='$brukernavn' and passord='$passord'";

    $result = mysqli_query($dbc, $query)
        or die('Error querying database.');

    mysqli_close($dbc);

    // var_dump($result);

    if($result->num_rows > 0){
        header('location: bra.html');
        var_dump('bra');
    }else{
        header('location: ikkeBra.html');
        var_dump('ikke bra');
    }
}



?>
</tbody>

</html>