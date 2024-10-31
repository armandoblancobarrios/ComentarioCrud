<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IListarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IComentarioRepository.php";

use ActiveRecord\ActiveRecordException;

class ListarComentarioService implements IListarComentarioService{
    private $comentarioRepository;

    public function __construct(IComentarioRepository $comentarioRepository)
    {
        $this->comentarioRepository = $comentarioRepository;
    }
    public function listarComentario(): array
    {
        try {
            return $this->comentarioRepository->getAll();
        } catch (ActiveRecordException $e) {
            throw $e;
        }
    }
}