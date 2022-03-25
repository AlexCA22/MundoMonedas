<?php


include 'classes/Data.php';

class Moneda extends Data
{
    protected $nombre_moneda;
    protected $valor_moneda;
    protected $info_moneda;
    protected $fecha;
    protected $imagen;
    protected $precio;
    protected $cod_epoca;
    protected $cod_material;

    public function __construct($valor_moneda,$nombre_moneda,
    $fecha,$info_moneda,$imagen,$cod_epoca,$cod_material,$precio)
    {
        if (strlen($nombre_moneda)<=255) {
     
            $this->valor_moneda=$valor_moneda;
            $this->nombre_moneda=$nombre_moneda;
            $this->fecha=$fecha;
            $this->info_moneda=$info_moneda;
            $this->imagen=$imagen;
            $this->cod_epoca=$cod_epoca;
            $this->cod_material=$cod_material;$this->precio=$precio;
        }
    }

    /* getter y setter */

    public function setNombre ($nombre_moneda) {
        if (strlen($nombre_moneda)<=255) {
            $this->nombre_moneda=$nombre_moneda;
        }
    }

    public function setImagen ($imagen) {
        $this->imagen=$imagen;
    }
    public function getValor () {
        return $this->valor_moneda;
    }
    public function getNombre () {
        return $this->nombre_moneda;
    }
    public function getInfo () {
        return $this->info_moneda;
    }


    public function getFecha () {
        return $this->fecha;
    }

    public function getImagen () {
        return $this->imagen;
    }

    public function getPrecio () {
        return $this->precio;
    }

    public function getCodEpoca () {
        return $this->cod_epoca;
    }

    public function getCodMaterial () {
        return $this->cod_material;
    }
    public function limpiarMoneda ($nombre_moneda) {
        $nombremoneda=$this->limpiarDato($nombre_moneda);
        $this->setNombre($nombremoneda);
    }
}