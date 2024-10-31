<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IGuardarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IComentarioRepository.php";

use ActiveRecord\ActiveRecordException;

class GuardarComentarioService implements IGuardarComentarioService{
    private $comentarioRepository;

    public function __construct(IComentarioRepository $comentarioRepository)
    {
        $this->comentarioRepository = $comentarioRepository;
    }
    public function guardarComentario(ComentarioModel $comentario): int
    {
        try {
            return $this->comentarioRepository->create($comentario);
        } catch (ActiveRecordException $e) {
            throw $e;
        }
    }
}