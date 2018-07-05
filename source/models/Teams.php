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

    public function newTeam($nome, $imagens){
        // Salva a imagem no disco

        $sql = "INSERT INTO times (nome, logo) VALUES (?, ?)";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($nome));
    }

    public function saveTeamImage($oldImage, $file){
        $exts_checks = array('jpg', 'png', 'jpeg');
        $ext = explode(".", $file['name']);
        $ext = strtolower(end($ext));
        if(array_search($ext, $exts_checks) === false) {
            return false;
        }else{
            $new_name = "bandeira_".round(microtime(true) * 1000).".".$ext;
            $dir = $_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/imgs/Times/";
            if(move_uploaded_file($file['tmp_name'], $dir.$new_name)){
                if(!empty($oldImage)){
                    // Remove old image
                    unlink($_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/imgs/Times/".$oldImage);
                }
                return $new_name;
            }else{
                return false;
            }
        }
    }

    public function deleteTeamImage($logo){
        unlink($_SERVER['DOCUMENT_ROOT'] . SERVER_URL . "assets/imgs/Times/".$logo);
    }

    public function deleteTeam($id){
        $sql = "DELETE FROM times WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id));
    }
}