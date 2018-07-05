<?php

class Teams extends model{

    public function getTeams(){
        $array = array();
        $sql = "SELECT * FROM times";
        $sql = $this->db->prepare($sql);
        $sql->execute(array());
        $sql = $sql->fetchAll();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }

    public function getTeam($id){
        $array = array();
        $sql = "SELECT * FROM times WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id));
        $sql = $sql->fetch();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }
}