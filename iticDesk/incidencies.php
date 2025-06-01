<?php
session_start();
if (!$_SESSION['logat'] == true) {
    header("Location: index.html");
}

$id_usuari= $_SESSION['id_usuari'];

$conn = mysqli_connect("localhost", "anguelina", "anguelina", "anguelina_levchenko_iticdesk");

$query_prof = "SELECT * FROM incidencies where id_usuari=(SELECT id from usuaris  where rol='professor' and id=$id_usuari) AND id_usuari=$id_usuari order by prioritat, data";
$select_prof = mysqli_query($conn, $query_prof);

$query_admin = "SELECT * FROM incidencies order by prioritat, data";
$select_admin = mysqli_query($conn, $query_admin);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Incidències</title>
</head>
<header>
    <p style='color:blueviolet;'> <?php echo $_SESSION['nom'] . " (" . $_SESSION['rol'] . ")" ?>  <button onclick="window.location.href='acces.php'"> Home </button> </p> 
    <hr>
    <h1> Incidències </h1>
<header>
<body>    
    <?php
    if ($_SESSION['rol'] == 'administrador'){
        while ($row_admin = mysqli_fetch_assoc($select_admin)) {
        echo "Titol: " . $row_admin['titol'] . "<br>";
        echo "Descripción: " . $row_admin['descripcion'] . "<br>";
        echo "Prioritat: " . $row_admin['prioritat'] . "<br>";
        echo "Estat: " . $row_admin['estat'] . "<br>";
        echo "Data: " . $row_admin['data'] . "<br>";
        echo "<hr>"; 
        }
    }   
    else if ($_SESSION['rol'] == 'professor'){
        while ($row_prof = mysqli_fetch_assoc($select_prof)) {
        echo "Titol: " . $row_prof['titol'] . "<br>";
        echo "Descripción: " . $row_prof['descripcion'] . "<br>";
        echo "Prioritat: " . $row_prof['prioritat'] . "<br>";
        echo "Estat: " . $row_prof['estat'] . "<br>";
        echo "Data: " . $row_prof['data'] . "<br>";
        echo "<hr>"; 
        }
    }
    ?>
</body>
</html>
