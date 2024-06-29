<?php

namespace Model;

class Pack extends ActiveRecord {
    protected static $tabla = 'packs';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
}