<?php

class Leagues extends model{

    public function getLeagues(){
        $array = array();
        $sql = "SELECT id, nome FROM campeonatos";
        $sql = $this->db->prepare($sql);
        $sql->execute(array());
        $sql = $sql->fetchAll();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }


    public function getLeague($id){
        $array = array();
        $sql = "SELECT * FROM campeonatos WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id));
        $sql = $sql->fetch();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }

    public function newLeague($nome){
        $sql = "INSERT INTO campeonatos (nome) VALUES (?)";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($nome));
    }

    public function editLeague($id, $nome){
        $sql = "UPDATE campeonatos SET nome = ? WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($nome, $id));
    }

    public function deleteLeague($id){
        $sql = $this->db->prepare("DELETE FROM campeonatos WHERE id = ?");
        $sql->execute(array($id));
    }
}