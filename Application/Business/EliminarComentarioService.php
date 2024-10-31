<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IEliminarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IComentarioRepository.php";

use ActiveRecord\ActiveRecordException;

class EliminarComentarioService implements IEliminarComentarioService{
    private $comentarioRepository;

    public function __construct(IComentarioRepository $comentarioRepository)
    {
        $this->comentarioRepository = $comentarioRepository;
    }
    public function eliminarComentario(int $id)
    {
        try {
            $this->comentarioRepository->deleteByID($id);
        } catch (ActiveRecordException $e) {
            throw $e;
        }
    }
}