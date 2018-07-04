<?php
/**
 * This class retrieves and saves data of the games.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class Games extends model{

    public function getGames(){
        $array = array();
        $sql = "SELECT id, status, data, id_campeonato, (SELECT nome FROM campeonatos WHERE id = jogos.id_campeonato) as campeonato, 
id_time_casa, (SELECT nome FROM times WHERE id = jogos.id_time_casa) as time_casa, 
id_time_visitante, (SELECT nome FROM times WHERE id = jogos.id_time_visitante) as time_visitante, local, valor, resultado_casa, resultado_visitante, popular FROM jogos";
        $sql = $this->db->prepare($sql);
        $sql->execute(array());
        $sql = $sql->fetchAll();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }


    public function getGame($id){
        $array = array();
        $sql = "SELECT * FROM games WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id));
        $sql = $sql->fetch();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }

    public function newGame($status, $data, $id_campeonato, $id_casa, $id_visitante, $local, $valor, $resultado_casa, $resultado_visitante, $popular){
        $sql = "INSERT INTO games (status, data, id_campeonato, id_time_casa, id_time_visitante, local, valor, resultado_casa, resultado_visitante, popular) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($status, $data, $id_campeonato, $id_casa, $id_visitante, $local, $valor, $resultado_casa, $resultado_visitante, $popular));
    }

    public function editGame($id, $status, $data, $id_campeonato, $id_casa, $id_visitante, $local, $valor, $resultado_casa, $resultado_visitante, $popular){
        $sql = "UPDATE game SET status = ?, data = ?, id_campeonato = ?, id_time_casa = ?, id_time_visitante = ?, local = ?, valor = ?, resultado_casa = ?, resultado_visitante = ?, popular = ?  WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($status, $data, $id_campeonato, $id_casa, $id_visitante, $local, $valor, $resultado_casa, $resultado_visitante, $popular, $id));
    }

    public function deleteGame($id){
        $sql = $this->db->prepare("DELETE FROM games WHERE id = ?");
        $sql->execute(array($id));
    }
}