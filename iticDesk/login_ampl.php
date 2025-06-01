<?php
session_start();
$usuari= $_POST['usuari'];
$pwd= $_POST['pwd'];
$_SESSION['logat'] = false;
$conn = mysqli_connect("localhost", "anguelina", "anguelina", "anguelina_levchenko_iticdesk");

if (!$conn){
    echo "No s'ha pogut conectar a la BBDD";
}
else {    
    $sql = "SELECT * FROM usuaris where correu=\"$usuari\" and password=\"$pwd\"";
    $result= mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    
    if ($num_rows==0){  
        header("Location: index.html");
    }
    else {
        $_SESSION['logat'] = true;
        $dades_usuari = mysqli_fetch_assoc($result);
        $_SESSION['id_usuari'] = $dades_usuari['id'];
        $_SESSION['nom'] = $dades_usuari['nom'];
        $_SESSION['rol'] = $dades_usuari['rol'];
        $_SESSION['usuari']= $usuari;
        $_SESSION['pwd'] = $pwd;
        $_SESSION['conn'] = $conn;
        header("Location: acces.php");
    }
}

?>