<?php

namespace models;

class Obra extends Model {
    
    protected $table = "obras";
    #nao esqueça da ID
    protected $fields = ["id","titulo","tipo","edicao","valor"];
    
}

