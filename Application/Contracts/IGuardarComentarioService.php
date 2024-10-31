<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

interface IGuardarComentarioService{
    public function guardarComentario(ComentarioModel $comentario);
}