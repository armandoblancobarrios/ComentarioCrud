<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

interface IEliminarComentarioService{
    public function eliminarComentario(int $id);
}