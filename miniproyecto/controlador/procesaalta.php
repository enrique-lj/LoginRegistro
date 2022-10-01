<?php
require_once "../modelo/accesoadatos.php";


if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    $rol=$_POST["rol"];
    }

if (existeUsuario("../modelo/fichero.txt",$password)==false)
{
    $texto=file_get_contents("../modelo/fichero.txt");
    file_put_contents("../modelo/fichero.txt",$texto."\r\n".$usuario.";".$password.";".$rol);
    header('Location: '.'../vista/formutabla.php');
}
else if (existeUsuario("../modelo/fichero.txt",$password)==true)
{
    $usuarios=usuarios("../modelo/fichero.txt");

    for($i=0;$i<count($usuarios);$i++)
    {
        if ($usuarios[$i][0] == $usuario && $usuarios[$i][1] == $password && ($usuarios[$i][2] == "admin" || $usuarios[$i][2] == "mindundi"))
        {
            /*HAY QUE VER COMO SE PUEDEN PASAR LOS DATOS AL OTRO PHP PARA DIVIDIRLO BIEN POR CAPAS
            header('Location: '.'procesaborrar.php'); */
            unset($usuarios[$i]);

            for($i=0;$i<count($usuarios);$i++)
            {
                 $arraybarras[$i]=implode(";",$usuarios[$i]);
            }

            $textoString=implode("\r\n",$arraybarras);
    
    
            file_put_contents("../modelo/fichero.txt",$textoString);
            header('Location: '.'../vista/formutabla.php');
         
        }
        else if ($usuarios[$i][1] == $password && ($usuarios[$i][0] != $usuario || ($usuarios[$i][2] != "admin" && $usuarios[$i][2] != "mindundi")))
        {
          /*HAY QUE VER COMO SE PUEDEN PASAR LOS DATOS AL OTRO PHP PARA DIVIDIRLO BIEN POR CAPAS
            header('Location: '.'procesaeditar.php');*/
            for($i=0;$i<count($usuarios);$i++)
            {
                if($usuarios[$i][1] == $password)
                {
                    $usuarios[$i][0] = $usuario;
                    $usuarios[$i][2] = $rol;            
                }
            }

            for($i=0;$i<count($usuarios);$i++)
            {
                 $arraybarras[$i]=implode(";",$usuarios[$i]);
            }

            $textoString=implode("\r\n",$arraybarras);
    
    
            file_put_contents("../modelo/fichero.txt",$textoString);
            header('Location: '.'../vista/formutabla.php');
        } 
    }  
}
?>