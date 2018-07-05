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

    public function newTeam($nome, $imagem){
        // Salva a imagem no disco
        $logo = self::saveTeamImage('', $imagem);
        if($logo){
            $sql = "INSERT INTO times (nome, logo) VALUES (?, ?)";
            $sql = $this->db->prepare($sql);
            $sql->execute(array($nome, $logo));
            return true;
        }else{
            return false;
        }
    }

    public function editTeam($id, $nome, $imagem){
        // Get team info
        $data = self::getTeam($id);
        if(!empty($data)){
            // Check if will edit the image
            if($imagem){
                $logo = self::saveTeamImage($data['logo'], $imagem);
                if($logo){
                    $sql = "UPDATE times SET nome = ?, logo = ? WHERE id = ?";
                    $sql = $this->db->prepare($sql);
                    $sql->execute(array($nome, $logo, $id));
                    return true;
                }else{
                    return false;
                }
            }else{
                $sql = "UPDATE times SET nome = ? WHERE id = ?";
                $sql = $this->db->prepare($sql);
                $sql->execute(array($nome, $id));
                return true;
            }
        }else{
            return false;
        }
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
        // Get team info
        $data = self::getTeam($id);
        if(!empty($data)){
            // Delete team image
            self::deleteTeamImage($data['logo']);
            // Delete team data
            $sql = "DELETE FROM times WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->execute(array($id));
        }
    }
}