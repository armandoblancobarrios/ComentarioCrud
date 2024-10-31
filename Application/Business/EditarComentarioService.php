<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IEditarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IComentarioRepository.php";

use ActiveRecord\ActiveRecordException;

class EditarComentarioService implements IEditarComentarioService
{
    private $comentarioRepository;

    public function __construct(IComentarioRepository $comentarioRepository)
    {
        $this->comentarioRepository = $comentarioRepository;
    }
    public function editarComentario(int $id, ComentarioModel $comentario)
    {
        try {
            $this->comentarioRepository->edit($id, $comentario);
        } catch (ActiveRecordException $e) {
            throw $e;
        }
    }
}
