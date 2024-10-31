<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";

interface IComentarioRepository
{
    public function create(ComentarioModel $comentarioModel): int;
    public function findByID(int $id): ComentarioModel;
    public function count(): int;
    public function edit(int $id, ComentarioModel $comentarioModel);
    public function deleteByID(int $id);
    public function getAll(): array;
}
