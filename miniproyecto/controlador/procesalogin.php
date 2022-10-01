<?php


$base=$_SERVER["DOCUMENT_ROOT"]."/miniproyecto";


include '../modelo/accesoadatos.php';
include '../helpers/validadores.php';

$usuario=$_POST["usuario"];
$password=$_POST["password"];



if (validaForm($usuario,$password))
{
    if(buscaUsuario("../modelo/fichero.txt",$usuario,$password)==1)
    {
        header('Location: '.'../vista/formutabla.php');
    }
    else if (buscaUsuario("../modelo/fichero.txt",$usuario,$password)==2)
    {
        echo "<h1>Bienvenido $usuario</h1>";
    }
    else if (buscaUsuario("../modelo/fichero.txt",$usuario,$password)==0)
    {
        header('Location: '.'../vista/login.html');
    }
}

?>
