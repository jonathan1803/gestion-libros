<?php

class Libro
{
    private $id;
    private $titulo;
    private $autor;
    private $categoria;
    private $disponible;

    public function __construct($id, $titulo, $autor, $categoria, $disponible = true)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->categoria = $categoria;
        $this->disponible = $disponible;
    }

    // Getters
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function isDisponible()
    {
        return $this->disponible;
    }

    // Métodos de estado
    public function prestar()
    {
        if ($this->disponible) {
            $this->disponible = false;
            return true;
        }
        return false;
    }

    public function devolver()
    {
        $this->disponible = true;
    }

    public function getEstado()
    {
        return $this->disponible ? 'Disponible' : 'Prestado';
    }
}
