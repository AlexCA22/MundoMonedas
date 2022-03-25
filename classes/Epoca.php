<?php
// include 'classes/Data.php';

class Epoca extends Data
{
    protected $nombre;
    protected $fecha_inicio;
    protected $fecha_final;
    protected $foto;


    public function __construct ($nombre, $fecha_inicio,$fecha_final, $foto ){
        if (strlen($nombre)<=255) {
            $this->nombre=$nombre;
            $this->fecha_inicio=$fecha_inicio;
            $this->fecha_final=$fecha_final;
            $this->foto=$foto;
          
        }
    }
    
    public function getNombre () {
        return $this->nombre;
    }

    public function setNombre ($nombre) {
        if (strlen($nombre)<=255) {
            $this->nombre=$nombre;
        }
    }
    public function getFoto () {
        return $this->foto;
    }

    public function setFoto ($foto) {
        $this->foto=$foto;
    }

    public function getFechaI () {
        return $this->fecha_inicio;
    }
    public function getFechaF () {
        return $this->fecha_final;
    }


  
    public function limpiarEpoca ($nombre) {
        $nombreComp=$this->limpiarDato($nombre);
        $this->setNombre($nombreComp);
    }
}