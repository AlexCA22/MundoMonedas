<?php
session_start();

/* ficheros que incluye */
include 'classes/App.php';
include 'db/BBDD.php';
include 'classes/Moneda.php';
include 'classes/Vista.php';
include 'classes/User.php';
include 'classes/Epoca.php';
include 'classes/Comentarios.php';



/* variables */
$app = new App();
$vista = new Vista();



// si el administrador intenta subir una moneda, llamamos a la función de gestión
if (isset($_REQUEST['nmonedas'])) {
    $app->gestionMoneda();
}

//si hemos seleccionado la opción de log out, se destruye la sesión
if (isset($_REQUEST['logout'])) {
    $_SESSION['login']=null;
    session_destroy();
}

//si no hay sesión activa, llamamos a la función que gestiona toda la interfaz de log in
if (!isset($_SESSION['login'])) {
    try {
        $app->logueo();
    } catch (Exception $exception) {$exception->getMessage();}
}

//si hay sesión, se accede a la parte de usuarios o a la de administradores
if (isset($_SESSION['login'])) {
    try {
        $app->tienda();
    } catch (Exception $exception) {$exception->getMessage();}
} //si se acaba de acceder, se pinta el log in
else if (!isset($_SESSION['login']) && !isset($_REQUEST['btnRegistro'])) {
$app->logIn();
}

$vista->printFooter();
// if($vista->printLogIn() && $vista->printRgistro()){

// }else{
// $vista->printFooter();
// }