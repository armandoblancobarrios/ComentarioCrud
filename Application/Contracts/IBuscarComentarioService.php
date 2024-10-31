<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

interface IBuscarComentarioService{
    public function buscarComentario(int $id) : ComentarioModel;
}