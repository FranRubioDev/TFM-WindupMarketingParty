<?php

namespace Model;

class Ponente extends ActiveRecord {
    protected static $tabla = 'ponentes';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'ciudad', 'empresa', 'imagen', 'imagenempresa', 'tags', 'redes'];

/*
    public $id;
    public $nombre;
    public $apellido;
    public $ciudad;
    public $empresa;
    public $imagen;
    public $imagenempresa;
    public $tags;
    public $redes;
    public $admin; */


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->empresa = $args['empresa'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->imagenempresa = $args['imagenempresa'] ?? '';
        $this->tags = $args['tags'] ?? '';
        $this->redes = $args['redes'] ?? '';
    }

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre es Obligatorio';
        }
        if(!$this->apellido) {
            self::$alertas['error'][] = 'El Apellido es Obligatorio';
        }
        if(!$this->ciudad) {
            self::$alertas['error'][] = 'El Campo Ciudad es obligatorio';
        }
        if(!$this->empresa) {
            self::$alertas['error'][] = 'El Campo Empresa es obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if(!$this->imagenempresa) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }
        if(!$this->tags) {
            self::$alertas['error'][] = 'El campo áreas es obligatorio';
        }
    
        return self::$alertas;
    }


}
