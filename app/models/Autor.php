<?php

namespace models;

class Autor extends Model {

    protected $table = "autores";
    #nao esqueça da ID
    protected $fields = ["id","usuario_id","obra_id"];
   
}


