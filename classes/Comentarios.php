<?php
// include 'classes/Data.php';

class Comentario extends Data
{
    protected $nombre;
    protected $comentario;
    protected $foto;
    protected $titulo;



    public function __construct ($nombre, $comentario ,$foto, $titulo){
        if (strlen($nombre)<=255) {
            $this->nombre=$nombre;
            $this->comentario=$comentario;
            $this->foto=$foto;
            $this->titulo=$titulo;
          
        }
    }
    public function getNombre () {
        return $this->nombre;
    }

    public function getComentario () {
        return $this->comentario;
    }

    public function getFoto () {
        return $this->foto;
    }
    public function setFoto ($foto) {
        $this->foto=$foto;
    }
    public function getTitulo () {
        return $this->titulo;
    }

    public function setNombre (string $nombre) {
        if (strlen($nombre)<=255) {
            $this->nombre=$nombre;
        }
    }

    public function limpiarComentario ($nombre) {
        $nombreV=$this->limpiarDato($nombre);
        $this->setNombre($nombreV);
    }
}