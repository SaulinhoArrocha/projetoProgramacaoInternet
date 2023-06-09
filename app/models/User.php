<?php

namespace models;

class User extends Model {

    protected $table = "users";
    #nao esqueça da ID
    protected $fields = ["id","nome","dataNascimento","tipo","ativado","email","senha"];

    const COMUM_USER = 10;
    const ADMIN_USER = 50;

    public static $userTypes = [User::COMUM_USER=>"Usuário comum",
                                User::ADMIN_USER=>"Admin"];


    public function findByEmailAndSenha($email, $senha){
        $sql = "SELECT * FROM {$this->table} "
                ." WHERE email = :email and senha = :senha";
        $stmt = $this->pdo->prepare($sql);
        $data = [':email' => $email, ":senha"=>hash("sha256", $senha)];
        $stmt->execute($data);
        if ($stmt == false){
            $this->showError($sql,$data);
        }
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    #sobrescreve a funcao salve da classe mae Model
    public function save($data){
        if (_v($data,"senha") != ""){
            $data["senha"] = hash("sha256", $data["senha"]);
        } else
        if (_v($data,"senha") == ""){
            #caso a senha nao seja enviada
            #remove do data, para que nao seja alterada
            #a senha anterior que já está salva
            unset($data["senha"]);
        }
        #chama a funcao save original da classe mae
        return parent::save($data);
    }

    public function update($id, $data){
        if (_v($data,"senha") != ""){
            $data["senha"] = hash("sha256", $data["senha"]);
        } else
        if (_v($data,"senha") == ""){
            unset($data["senha"]);
        }
        return parent::update($id, $data);
    }

      
}




