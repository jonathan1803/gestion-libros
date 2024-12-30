
<?php

class Usuario
{
    private $nombre;
    private $librosPrestados = [];

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function prestarLibro($libro)
    {
        if ($libro->prestar()) {
            $this->librosPrestados[] = $libro;
            return true;
        }
        return false;
    }

    public function devolverLibro($libro)
    {
        foreach ($this->librosPrestados as $key => $prestado) {
            if ($prestado === $libro) {
                unset($this->librosPrestados[$key]);
                $libro->devolver();
                return true;
            }
        }
        return false;
    }
}
