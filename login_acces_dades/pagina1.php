<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta action="login.php" method="POST">
    <title>Pàgina 1</title>
</head>
<body>
    <header>
        <h1>Pàgina 1</h1>
        <p style='color:blueviolet;'> Hola <?php echo $_SESSION['usuari'] ?> !</p>
        <a href='desloguejar.php'> Close session </a>

        <hr>

        <p>Una curiositat interessant és que les abelles poden reconèixer les cares humanes. Un estudi va demostrar que les abelles són capaços de recordar i identificar cares, utilitzant un mecanisme similar al que utilitzen els humans per reconèixer rostres. Això és sorprenent perquè les abelles tenen cervells molt petits, però malgrat això, poden processar informació visual complexa, com les cares, de manera eficaç. </p>
        <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/European_honey_bee_extracts_nectar.jpg/225px-European_honey_bee_extracts_nectar.jpg'>
</body>
</html>
