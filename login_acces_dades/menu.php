<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta action="login.php" method="POST">
    <title>Menú</title>
</head>
<body>
    <header>
        <h1>Menú</h1>
        <p style='color:blueviolet;'> Hola <?php echo $_SESSION['usuari'] ?> !</p>
        <a href='desloguejar.php'> Close session </a>
        <hr>
        <a href="pagina1.php">--Pàgina 1</a> <br>
        <a href="pagina2.php">--Pàgina 2</a>
</body>
</html>