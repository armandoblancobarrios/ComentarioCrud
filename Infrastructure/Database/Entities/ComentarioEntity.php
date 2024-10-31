<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Infrastructure/Libs/Orm/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

class ComentarioEntity extends ActiveRecord\Model
{
    public static $table_name = "comentarios";
    public static $primary_key = "codigo";
    
    public static function convertToModel(ComentarioEntity $entity) : ComentarioModel
    {
      $model = new ComentarioModel(
        $entity->codigo,
        $entity->password,
        $entity->email,
        $entity->idproducto,
        $entity->comentario,
        $entity->calificacion,
        $entity->idcliente,
        $entity->fechacomentario,
        $entity->estado,
        $entity->respuesta
      );
  
      return $model;
    }
  
    public static function convertToEntity(ComentarioModel $model) : ComentarioEntity
    {
      $entity = new ComentarioEntity();
  
      $entity->codigo = $model->getCodigo();
      $entity->password = $model->getPassword();
      $entity->email = $model->getEmail();
      $entity->idproducto = $model->getIdProducto();
      $entity->comentario = $model->getComentario();
      $entity->calificacion = $model->getCalificacion();
      $entity->idcliente = $model->getIdCliente();  
      $entity->fechacomentario = $model->getFechaComentario();
      $entity->estado = $model->getEstado();
      $entity->respuesta = $model->getRespuesta();
  
      return $entity;
    }
}
