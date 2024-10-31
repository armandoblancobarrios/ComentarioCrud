<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

if (isset($_SESSION["comentario.buscar"])) {
  $comentario = unserialize($_SESSION["comentario.buscar"]);
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
  <form action="../Controllers/ComentarioController.php" method="POST">
    <input type="text" name="codigo" value="<?= !isset($comentario) ? '' : $comentario->getCodigo() ?>" placeholder="Código">
    <input type="submit" name="action" value="buscar">
    <p style="color: red; font-size: 20px"><?= @$_REQUEST["mensaje"] ?></p>
  </form>
  <form action="../Controllers/ComentarioController.php" method="POST">
    <?php
    if (isset($comentario)) {
    ?>
      <input type="hidden" name="codigo" value="<?= !isset($comentario) ? '' : $comentario->getCodigo() ?>">
      <input type="password" name="password" value="<?= !isset($comentario) ? '' : $comentario->getPassword() ?>" placeholder="Contraseña">
      <input type="email" name="email" value="<?= !isset($comentario) ? '' : $comentario->getEmail() ?>" placeholder="Email">
      <input type="number" name="idProducto" value="<?= !isset($comentario) ? '' : $comentario->getIdProducto() ?>" placeholder="ID Producto">
      <input type="text" name="comentario" value="<?= !isset($comentario) ? '' : $comentario->getComentario() ?>" placeholder="Comentario">
      <input type="number" name="calificacion" value="<?= !isset($comentario) ? '' : $comentario->getCalificacion() ?>" placeholder="Calificación">
      <input type="number" name="idCliente" value="<?= !isset($comentario) ? '' : $comentario->getIdCliente() ?>" placeholder="ID Cliente">
      <input type="date" name="fechaComentario" value="<?= !isset($comentario) ? '' : $comentario->getFechaComentario() ?>" placeholder="Fecha Comentario">
      <input type="text" name="estado" value="<?= !isset($comentario) ? '' : $comentario->getEstado() ?>" placeholder="Estado">
      <input type="text" name="respuesta" value="<?= !isset($comentario) ? '' : $comentario->getRespuesta() ?>" placeholder="Respuesta">
      <input type="submit" name="action" value="editar">
      <input type="submit" name="action" value="eliminar">
    <?php
    }
    ?>
  </form>
  <script src="./js/script.js"></script>
</body>
</html>