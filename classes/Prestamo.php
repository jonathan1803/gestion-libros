<?php

class Prestamo
{
    private $usuario;
    private $libro;
    private $fechaPrestamo;
    private $fechaDevolucion;

    public function __construct($usuario, $libro)
    {
        $this->usuario = $usuario;
        $this->libro = $libro;
        $this->fechaPrestamo = date('Y-m-d H:i:s');
        $this->fechaDevolucion = null; // El libro aún no se ha devuelto
    }

    public function devolver()
    {
        $this->fechaDevolucion = date('Y-m-d H:i:s');
        $this->libro->devolver(); // Cambiar el estado del libro a disponible
    }

    public function getDetalles()
    {
        return [
            'usuario' => $this->usuario,
            'titulo' => $this->libro->getTitulo(),
            'fechaPrestamo' => $this->fechaPrestamo,
            'fechaDevolucion' => $this->fechaDevolucion
        ];
    }
}
