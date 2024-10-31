<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

interface IEditarComentarioService
{
    public function editarComentario(int $id, ComentarioModel $comentario);
}