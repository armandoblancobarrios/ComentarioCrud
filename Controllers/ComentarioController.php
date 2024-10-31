<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Domain/Model/ComentarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Infrastructure/Database/Entities/ComentarioEntity.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Contracts/IComentarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Infrastructure/Repository/ComentarioRepository.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Business/GuardarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Business/ListarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Business/EditarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Business/EliminarComentarioService.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/CRUD_COMENTARIOS/Application/Business/BuscarComentarioService.php";

class ComentarioController
{
  private $comentarioRepository;
  public function __construct(IComentarioRepository $comentarioRepository)
  {
    $this->comentarioRepository = $comentarioRepository;
  }

  public function action()
  {
    $accion = $_REQUEST["action"];
    switch ($accion) {
      case "guardar":
        $this->guardarComentario();
        break;
      case "buscar":
        $this->buscar();
        break;
      case "listado":
        $this->listarComentarios();
        break;
      case "editar":
        $this->editarComentario();
        break;
      case "eliminar":
        $this->eliminarComentario();
        break;
      default:
        //header("Location: /crud_comentarios/Views/Listar.php?mensaje=ruta erronea"); 
    }
  }

  public function guardarComentario()
  {
    try {
      $codigo = $_POST["codigo"];
      $password = $_POST["password"];
      $email = $_POST["email"];
      $idProducto = $_POST["idProducto"];
      $comentario = $_POST["comentario"];
      $calificacion = $_POST["calificacion"];
      $idCliente = $_POST["idCliente"];
      $fechaComentario = $_POST["fechaComentario"];
      $estado = $_POST["estado"];
      $respuesta = $_POST["respuesta"];

      $comentarioModel = new comentarioModel($codigo, $password, $email, $idProducto, $comentario, $calificacion, $idCliente, $fechaComentario, $estado, $respuesta);
      $guardarComentarioService = new GuardarComentarioService($this->comentarioRepository);
      $total = $guardarComentarioService->guardarComentario($comentarioModel);
      echo $total;
      if ($total > 0) {
        header("Location: /crud_comentarios/Views/Agregar.php?mensaje= Comentario guardado");
      } else {
        header("Location: /crud_comentarios/Views/Agregar.php?mensaje=" . urlencode("No se registro el usuario"));
      }
    } catch (Throwable $e) {
      header("Location: /crud_comentarios/Views/Listar.php?mensaje=" . urlencode($e->getMessage()));
    }
  }

  public function buscar()
  {
    $codigo = $_POST["codigo"];
    try {
      $buscarComentarioService = new BuscarComentarioService($this->comentarioRepository);;
      $comentario = $buscarComentarioService->buscarComentario($codigo);

      $_SESSION["comentario.buscar"] = serialize($comentario);
      header("Location: /crud_comentarios/Views/Buscar.php?mensaje=Comentario encontrado"); 
    } catch (Throwable $e) {
      $_SESSION["comentario.buscar"] = null;

      $mensaje = $e->getMessage();
      header("Location: /crud_comentarios/Views/Buscar.php?mensaje=" . $mensaje);
    }
  }

  public function listarComentarios()
  {
    try {
      $listarComentariosService = new ListarComentarioService($this->comentarioRepository);
      $comentarios = $listarComentariosService->listarComentario();
      $_SESSION["comentarios.listar"] = serialize($comentarios);
      header("Location: /crud_comentarios/Views/Listar.php");
    } catch (Throwable $e) {
      header("Location: /crud_comentarios/Views/Listar.php?mensaje=" . urlencode($e->getMessage()));
    }
  }

  public function eliminarComentario()
  {
    try {
      $id = $_POST["codigo"];
      $eliminarComentarioService = new EliminarComentarioService($this->comentarioRepository);
      $eliminarComentarioService->eliminarComentario($id);
      $this->listarComentarios();
      header("Location: /crud_comentarios/Views/Listar.php?mensaje=Comentario eliminado");
    } catch (Throwable $e) {
      header("Location: /crud_comentarios/Views/Buscar.php?mensaje=" . urlencode($e->getMessage()));
    }
  }

  public function editarComentario()
  {
    try {
      $codigo = $_POST["codigo"];
      $password = $_POST["password"];
      $email = $_POST["email"];
      $idProducto = $_POST["idProducto"];
      $comentario = $_POST["comentario"];
      $calificacion = $_POST["calificacion"];
      $idCliente = $_POST["idCliente"];
      $fechaComentario = $_POST["fechaComentario"];
      $estado = $_POST["estado"];
      $respuesta = $_POST["respuesta"];

      $comentarioModel = new comentarioModel($codigo, $password, $email, $idProducto, $comentario, $calificacion, $idCliente, $fechaComentario, $estado, $respuesta);
      $editarComentarioService = new EditarComentarioService($this->comentarioRepository);
      $editarComentarioService->editarComentario($codigo, $comentarioModel);
      $_SESSION["comentario.buscar"] = serialize($comentarioModel);
      $this->listarComentarios();
      header("Location: /crud_comentarios/Views/Buscar.php?mensaje=Comentario editado"); 
    } catch (Throwable $e) {
      header("Location: /crud_comentarios/Views/Buscar.php?mensaje=" . urlencode($e->getMessage())); 
    }
  }
}

$comentarioRepository = new ComentarioRepository();
$controller = new ComentarioController($comentarioRepository);
$controller->listarComentarios();
$controller->action();
