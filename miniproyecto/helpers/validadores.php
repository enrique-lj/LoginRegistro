<?php
function validaFormAdmin($usuario,$password, $rol)
{
    if (empty($usuario) && empty($password) && empty($rol))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function validaForm($usuario,$password)
{
    if (empty($usuario) && empty($password))
    {
        return false;
    }
    else
    {
        return true;
    }
}
?>