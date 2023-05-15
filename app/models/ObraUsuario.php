<?php

namespace models;

class ObraUsuario extends Model {

    protected $table = "obrasUsuarios";
    #nao esqueça da ID
    protected $fields = ["id","titulo","tipo","descricao","valorDedejado"];
    
    
    
}

