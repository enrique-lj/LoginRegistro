<?php
require_once "../modelo/accesoadatos.php";

$usuarios=usuarios("../modelo/fichero.txt");

//TABLA
echo "<table border=1px>";
echo "<tr>";
echo "<th>USUARIO</th>";
echo "<th>CONTRASEÑA</th>";
echo "<th>ROL</th>";
echo "</th>";
echo "<tr>";

for ($i = 0;$i < count ($usuarios);$i++)
{
    echo "<th>".$usuarios[$i][0]."</th>";
    echo "<th>".$usuarios[$i][1]."</th>";
    echo "<th>".$usuarios[$i][2]."</th>";
    echo "</tr>";
}

echo "</table>";
echo "<br>";

//FORMULARIO
echo '<form name="input" method="post" action="../controlador/procesaalta.php"';
echo "<label>Usuario:</label>";
echo '<input type="text" name="usuario">';
echo "<label>Contraseña:</label>";
echo '<input type="password" name="password">';
echo "<label>Rol:</label>";
echo '<input type="text" name="rol">';
echo "<br>";
echo '<input type="submit" id="entrar" value="ENVIAR">';
echo "</form>";

?>