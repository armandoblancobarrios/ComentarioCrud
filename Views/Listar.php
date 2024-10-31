<?php
session_start(); 

include_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

if (isset($_SESSION["comentarios.listar"])) {
  $comentarios = unserialize($_SESSION["comentarios.listar"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/index.css">
</head>
<body>
  <table>
    <tr>
      <th>Codigo</th>
      <th>Password</th>
      <th>Email</th>
      <th>Id Producto</th>
      <th>Comentario</th>
      <th>Calificacion</th>
      <th>Id Cliente</th>
      <th>Fecha Comentario</th>
      <th>Estado</th>
      <th>Respuesta</th>
    </tr>
    <?php
    if (isset($comentarios)) {
      foreach ($comentarios as $comentario) {
        echo "<tr>";
        echo "<td>" . $comentario->getCodigo() . "</td>";
        echo "<td>" . $comentario->getPassword() . "</td>";
        echo "<td>" . $comentario->getEmail() . "</td>";
        echo "<td>" . $comentario->getIdProducto() . "</td>";
        echo "<td>" . $comentario->getComentario() . "</td>";
        echo "<td>" . $comentario->getCalificacion() . "</td>";
        echo "<td>" . $comentario->getIdCliente() . "</td>";
        echo "<td>" . $comentario->getFechaComentario() . "</td>";
        echo "<td>" . $comentario->getEstado() . "</td>";
        echo "<td>" . $comentario->getRespuesta() . "</td>";
        echo "</tr>";
      }
    }
    ?>
  </table>
</body>
</html>