<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

interface IListarComentarioService{
    public function listarComentario() : array;
}