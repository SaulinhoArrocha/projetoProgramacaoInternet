<?php

namespace models;

class Obra extends Model {
    
    protected $table = "obras";
    #nao esqueça da ID
    protected $fields = ["id","titulo","tipo_id","edicao","valor"];
    


    public function findById($id){
        $sql = "SELECT obras.*, tipos.tipo AS tipo FROM {$this->table} "
                ." LEFT JOIN tipos ON tipos.id = obras.tipo_id "
                ." WHERE obras.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $data = [':id' => $id];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function all(){
        $sql = "SELECT obras.*, tipos.tipo as tipo FROM {$this->table} "
                ." LEFT JOIN tipos ON tipos.id = obras.tipo_id ";
        
        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute();
        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
    }

    public function getAutores($idObra){
        $sql = "SELECT * FROM usuarios
            INNER JOIN autores ON
                usuarios.id = autores.usuario_id
            WHERE autores.obra_id = :idObra ";

        $stmt = $this->pdo->prepare($sql);
        if ($stmt == false){
            $this->showError($sql);
        }
        $stmt->execute([':idObra' => $idObra]);

        $list = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            array_push($list,$row);
        }
        return $list;
}


}

