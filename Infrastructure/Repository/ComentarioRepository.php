<?php

use ActiveRecord\ActiveRecordException;

require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IComentarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Infrastructure/Database/Entities/ComentarioEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Exceptions/EntityNotFoundException.php";

class ComentarioRepository implements IComentarioRepository
{
  public function create(ComentarioModel $comentarioModel): int
  {
    try {
      $comentarioModel->setEstado(1);
      $comentario = new ComentarioEntity();
      $comentario = $comentario->convertToEntity($comentarioModel);

      $comentario->save();
      return $this->count();
    } catch (Exception $e) {
      return 0;
    }
  }

  public function findByID(int $id): ComentarioModel
  {
    try {
      $comentario = ComentarioEntity::find([$id]);
      $comentarioModel = $comentario->convertToModel($comentario);
      return $comentarioModel;
    } catch (Exception $e) {
      $msg = "Comentario con id $id no existe";
      throw new EntityNotFoundException($msg);
    }
  }

  public function count(): int
  {
    return @ComentarioEntity::count();
  }

  public function edit(int $id, ComentarioModel $comentarioModel)
  {
    try {
      $comentarioEntity = ComentarioEntity::find([$id]);

      $comentarioEntity->codigo = $comentarioModel->getCodigo();
      $comentarioEntity->password = $comentarioModel->getPassword();
      $comentarioEntity->email = $comentarioModel->getEmail();
      $comentarioEntity->idproducto = $comentarioModel->getIdProducto();
      $comentarioEntity->comentario = $comentarioModel->getComentario();
      $comentarioEntity->calificacion = $comentarioModel->getCalificacion();
      $comentarioEntity->idcliente = $comentarioModel->getIdCliente();
      $comentarioEntity->fechacomentario = $comentarioModel->getFechaComentario();
      $comentarioEntity->estado = $comentarioModel->getEstado();
      $comentarioEntity->respuesta = $comentarioModel->getRespuesta();

      $comentarioEntity->save();
    } catch (Exception $e) {
      $msg = "Comentario con id" . $comentarioModel->getCodigo() . "no existe, $e";
      throw new EntityNotFoundException($msg);
    }
  }

  public function deleteByID(int $id)
  {
    try {
      $comentarioEntity = ComentarioEntity::find([$id]);

      if ($comentarioEntity) {
        $comentarioEntity->delete();
      }
    } catch (Exception $e) {
      $msg = "Usuario con id " . $id . " no existe";
      throw new EntityNotFoundException($msg);
    }
  }

  public function getAll(): array
  {
    $comentariosEntities  = ComentarioEntity::all();

    $comentariosModels = [];
    foreach ($comentariosEntities as $comentario) {
      $comentarioModel = $comentario->convertToModel($comentario);
      $comentariosModels[] = $comentarioModel;
    }
    return $comentariosModels;
  }
}
