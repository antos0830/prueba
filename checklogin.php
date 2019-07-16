<?php
session_start();
?>

<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "jade2";
$tbl_name = "administrador";
$tbl_name2 = "usuarios";
$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {

 die("La conexion falló: " . $conexion->connect_error);

}
$username = $_POST['username'];
$password = $_POST['password'];
$_SESSION['variable']=$username;
/*$pass = password_hash($password, PASSWORD_BCRYPT);*/

$sql = "SELECT * FROM $tbl_name WHERE nombre_administrador = '$username'";
$result = $conexion->query($sql);

$sql2 = "SELECT * FROM $tbl_name2 WHERE nombre_usuario = '$username'";
$result2 = $conexion->query($sql2);

if ($result->num_rows > 0) {

$row = $result->fetch_array(MYSQLI_ASSOC);
if (password_verify($password, $row['password'])) { 
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
	echo "Bienvenido! " . $_SESSION['username'];
	echo "<br><br><a href=panel-control.php>Administrador</a>";
	header("Location:panel-control.php"); }
    }else if($result2->num_rows > 0) {
     }
	   $row2 = $result2->fetch_array(MYSQLI_ASSOC);
    if (password_verify($password, $row2['password'])) { 
	$_SESSION['loggedin'] = true;
	$_SESSION['username'] = $username;
	$_SESSION['start'] = time();
	$_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
	echo "Bienvenido! " . $_SESSION['username'];
	echo "<br><br><a href=panel-control.php>Administrador</a>";
	header("Location:panel-control2.php"); 
    }
    else {
	    echo "Username o Password estan incorrectos.";
	    echo "<br><a href='ingresar_administrador.html'>Volver a Intentarlo</a>";
    }
mysqli_close($conexion); 
?>