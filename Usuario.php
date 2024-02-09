<?php
class Usuario
{
    public $Correo;
    public $Pass;
    public $Nombre;
    public $Apellido1;
    public $Apellido2;
    public $FechaNacimiento;
    public $Pais;
    public $CP;
    public $Telefono;
    public $Rol;

    public function __construct($correo, $pass, $nombre, $apellido1, $apellido2, $fechaNacimiento, $pais, $cp, $telefono, $rol)
    {
        $this->Correo = $correo;
        $this->Pass = $pass;
        $this->Nombre = $nombre;
        $this->Apellido1 = $apellido1;
        $this->Apellido2 = $apellido2;
        $this->FechaNacimiento = $fechaNacimiento;
        $this->Pais = $pais;
        $this->CP = $cp;
        $this->Telefono = $telefono;
        $this->Rol = $rol;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}
