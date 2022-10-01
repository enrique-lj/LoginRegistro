<?php

function buscaUsuario(String $ruta, String $usuario, String $password)
{
    $usuarios=usuarios($ruta);

    for($i=0;$i<count($usuarios);$i++)
    {
        if($usuarios[$i][0] == $usuario && $usuarios[$i][1]==$password && $usuarios[$i][2] == "admin")
        {
            $valor=1;
            
        }
        else if ($usuarios[$i][0] == $usuario && $usuarios[$i][1]==$password && $usuarios[$i][2] == "mindundi")
        {
            $valor=2;          
        }
        else
        {
            $valor=0;
            
        }
        if($valor>0)
        {
            break;
        }
    }
      
    return $valor;
}

function existeUsuario(String $ruta,String $password)
{
    $usuarios=usuarios($ruta);
    $valor=false;

    for($i=0;$i<count($usuarios);$i++)
    {
        if($usuarios[$i][1]==$password)
        {
            $valor= true;
        }      
    }

    return $valor;
}

function usuarios($ruta)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    }
    
    $texto=file_get_contents($ruta);
    $usuarios=explode("\r\n",$texto);
    
    for ($i = 0;$i < count($usuarios);$i++)
    {
        $arrayuser=explode(";",$usuarios[$i]);  
        $usuarios[$i]=$arrayuser;
    }

    return $usuarios;
}

?>
