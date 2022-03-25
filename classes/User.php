<?php

class User extends Data
{
    protected $nombre;
    protected $clave;
    protected $email;

    public function __construct(string $nombre, string $clave, string $email)
    {
        $this->nombre=$nombre;
        $this->clave=$clave;
        $this->email=$email;
    }

    public function getUser () {
        return $this->nombre;
    }

    public function getEmail () {
        return $this->email;
    }

    public function getClave () {
        return $this->clave;
    }

    public function setNombre (string $nombre) {
        $this->nombre=$nombre;
    }

    public function setEmail (string $email) {
        $this->email=$email;
    }

}