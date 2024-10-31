<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IBuscarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IComentarioRepository.php";

use ActiveRecord\ActiveRecordException;

class BuscarComentarioService implements IBuscarComentarioService
{
  private $comentarioRepository;

  public function __construct(IComentarioRepository $comentarioRepository)
  {
    $this->comentarioRepository = $comentarioRepository;
  }
  public function buscarComentario(int $id): ComentarioModel
  {
    try {
      return $this->comentarioRepository->findByID($id);
    } catch (ActiveRecordException $e) {
      throw $e;
    }
  }
}
