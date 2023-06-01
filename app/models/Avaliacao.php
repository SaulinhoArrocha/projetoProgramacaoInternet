<?php

namespace models;

class Avaliacao extends Model {

    protected $table = "avaliacoes";
    #nao esqueça da ID
    protected $fields = ["id","usuario_id","obras_id"];
   
}


