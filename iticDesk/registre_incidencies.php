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
    <meta action="acces.php" method="POST">
    <title>Registre d'incidències</title>
</head>
<header>
    <p style='color:blueviolet;'> <?php echo $_SESSION['nom'] . " (" . $_SESSION['rol'] . ")" ?>  <button onclick="window.location.href='acces.php'"> Home </button> </p> 
    <hr>
    <h1>Registre d'incidències</h1>
</header>
<body>
    <form action='registre_incidencies.php' method="POST">
        <label for="titol"> Títol de la incidència: </label> <br>
        <input required type="text" name="titol" placeholder="Introdueix un títol">
        <br>
        <label for="descripcio"> Descripció: </label>
        <br>
        <input required type="text" name="descripcio" placeholder="Descripció...">
        <br>
        <label for="prioritat">Quina prioritat té la incidència? </label>
        <select id="prioritat" name="prioritat">
            <option value="Critica">Crítica</option>
            <option value="Urgent">Urgent</option>
            <option value="Lleu">Lleu</option>
            <option value="No urgent">No urgent</option>
        </select>
        <br>
        <label for="estat">En quin estat es troba la incidència? </label>
        <select id="estat" name="estat">
            <option value="oberta">Oberta</option>
            <option value="gestio">Gestió</option>
            <option value="tancada">Tancada</option>
            <option value="reoberta">Reoberta</option>
        </select>
        <br>
        <button type="submit">Acceptar</button>
    </form>
</body>
</html>

<?php
session_start();
$titol = $_POST['titol'];
$descripcio = $_POST['descripcio'];
$prioritat = $_POST['prioritat'];
$estat = $_POST['estat'];
$usuari= $_SESSION['usuari'];

$conn = mysqli_connect("localhost", "anguelina", "anguelina", "anguelina_levchenko_iticdesk");

$query = "INSERT INTO incidencies (id_usuari, data, titol, descripcio, prioritat, estat) VALUES ((select id from usuaris where correu=\"$usuari\"), curdate(), \"$titol\", \"$descripcio\", \"$prioritat\", \"$estat\")";

$insert = mysqli_query($conn, $query);
$resultat = mysqli_affected_rows($conn);

if ($resultat == 1) {
    echo "";
    echo "<p> La incidència s'ha registrat correctament. </p>";
    echo "";
    echo "<a href='registre_incidencies.php'> <button> Registrar una altra incidència </button> </a>";
} 
else {
    echo "Error al registrar la incidencia: ";
}
mysqli_close($conn);
?>