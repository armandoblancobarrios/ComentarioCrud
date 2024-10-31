<?php

class ComentarioModel
{
  private $codigo;
  private $password;
  private $email;
  private $idProducto;
  private $comentario;
  private $calificacion;
  private $idCliente;
  private $fechaComentario;
  private $estado;
  private $respuesta;

  public function __construct($codigo, $password, $email, $idProducto, $comentario, $calificacion, $idCliente, $fechaComentario, $estado, $respuesta)
  {
    $this->codigo = $codigo ?? throw new InvalidArgumentException("Código no puede ser nulo");
    $this->password = $password ?? throw new InvalidArgumentException("Password no puede ser nulo");
    $this->email = $email ?? throw new InvalidArgumentException("Email no puede ser nulo");
    $this->idProducto = $idProducto ?? throw new InvalidArgumentException("ID Producto no puede ser nulo");
    $this->comentario = $comentario ?? throw new InvalidArgumentException("Comentario no puede ser nulo");
    $this->calificacion = $calificacion ?? throw new InvalidArgumentException("Calificación no puede ser nulo");
    $this->idCliente = $idCliente ?? throw new InvalidArgumentException("ID Cliente no puede ser nulo");
    $this->fechaComentario = $fechaComentario ?? throw new InvalidArgumentException("Fecha Comentario no puede ser nulo");
    $this->estado = $estado ?? throw new InvalidArgumentException("Estado no puede ser nulo");
    $this->respuesta = $respuesta ?? throw new InvalidArgumentException("Respuesta no puede ser nulo");
  }

  public function getCodigo()
  {
    return $this->codigo;
  }

  public function setCodigo($codigo)
  {
    $this->codigo = $codigo;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getIdProducto()
  {
    return $this->idProducto;
  }

  public function setIdProducto($idProducto)
  {
    $this->idProducto = $idProducto;
  }

  public function getComentario()
  {
    return $this->comentario;
  }

  public function setComentario($comentario)
  {
    $this->comentario = $comentario;
  }

  public function getCalificacion()
  {
    return $this->calificacion;
  }

  public function setCalificacion($calificacion)
  {
    $this->calificacion = $calificacion;
  }

  public function getIdCliente()
  {
    return $this->idCliente;
  }

  public function setIdCliente($idCliente)
  {
    $this->idCliente = $idCliente;
  }

  public function getFechaComentario()
  {
    return $this->fechaComentario;
  }

  public function setFechaComentario($fechaComentario)
  {
    $this->fechaComentario = $fechaComentario;
  }

  public function getEstado()
  {
    return $this->estado;
  }

  public function setEstado($estado)
  {
    $this->estado = $estado;
  }

  public function getRespuesta()
  {
    return $this->respuesta;
  }

  public function setRespuesta($respuesta)
  {
    $this->respuesta = $respuesta;
  }
}
