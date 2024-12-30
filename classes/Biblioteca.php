<?php

class Biblioteca
{
    private $libros = [];
    private $prestamos = [];

    public function agregarLibro($libro)
    {
        $this->libros[] = $libro;
    }

    public function buscarPorTitulo($titulo)
    {
        foreach ($this->libros as $libro) {
            if (stripos($libro->getTitulo(), $titulo) !== false) {
                return $libro;
            }
        }
        return null;
    }

    public function buscarPorAutor($autor)
    {
        $resultados = [];
        foreach ($this->libros as $libro) {
            if (stripos($libro->getAutor(), $autor) !== false) {
                $resultados[] = $libro;
            }
        }
        return $resultados;
    }

    public function buscarPorCategoria($categoria)
    {
        $resultados = [];
        foreach ($this->libros as $libro) {
            if (stripos($libro->getCategoria(), $categoria) !== false) {
                $resultados[] = $libro;
            }
        }
        return $resultados;
    }
    public function registrarPrestamo($usuario, $tituloLibro)
    {
        $libro = $this->buscarPorTitulo($tituloLibro);

        if ($libro && $libro->isDisponible()) {
            $libro->prestar();
            $prestamo = new Prestamo($usuario, $libro);
            $this->prestamos[] = $prestamo;
            return true;
        }
        return false;
    }

    public function listarPrestamos()
    {
        return $this->prestamos;
    }

    
}
