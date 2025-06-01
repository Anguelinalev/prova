<?php
session_start();
if (!$_SESSION['logat'] == true) {
    header("Location: index.html");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta action="login_ampl.php" method="POST">
    <title>Menú</title>
</head>
<header>
        <p style='color:blueviolet;'> <?php echo $_SESSION['nom'] . " (" . $_SESSION['rol'] . ")" ?>  <button onclick="window.location.href='desloguejar.php'"> Close session </button> </p> 
        <hr>
<header>
<body>    
    <button onclick="window.location.href='registre_incidencies.php'"> Registrar nova incidència </button> <br>
    <button onclick="window.location.href='incidencies.php'"> Consultar incidència </button>
</body>
</html>
