<?php
session_start();
$usuari= $_POST['usuari'];
$pwd= $_POST['pwd'];

$conn = mysqli_connect("localhost", "login", "login", "usuairs_web");

if (!$conn){
    echo "No s'ha pogut conectar a la BBDD";
}
else {
    
    $sql = "SELECT * FROM usuaris where nom_usuari=\"$usuari\" and password=\"$pwd\"";
    echo $sql;
    $query= mysqli_query($conn, $sql);
    $rows = mysqli_num_rows($query);
    echo "<br>";
    echo $rows;
    if ($rows==0){  
        header("Location: index.html");
    }
    else {
        echo "Benvingut!!";
        header("Location: menu.php");
    }
}
?>