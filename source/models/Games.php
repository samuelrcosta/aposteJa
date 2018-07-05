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
        $sql = "SELECT id, status, DATE_FORMAT(data, '%d/%m/%Y %H:%i') as data, id_campeonato, (SELECT nome FROM campeonatos WHERE id = jogos.id_campeonato) as campeonato, 
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

    public function getPopularGames(){
        $array = array();
        $sql = "SELECT id, status, DATE_FORMAT(data, '%d/%m/%Y') as data, DATE_FORMAT(data, '%H:%i') as hora, id_campeonato, (SELECT nome FROM campeonatos WHERE id = jogos.id_campeonato) as campeonato, id_time_casa, (SELECT nome FROM times WHERE id = jogos.id_time_casa) as time_casa, (SELECT logo FROM times WHERE id = jogos.id_time_casa) as logo_time_casa, id_time_visitante, (SELECT nome FROM times WHERE id = jogos.id_time_visitante) as time_visitante, (SELECT logo FROM times WHERE id = jogos.id_time_visitante) as logo_time_visitante, local, valor FROM jogos WHERE popular = 1 and status = 'sem_resultado'";
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
        $sql = "SELECT id, status, DATE_FORMAT(data, '%d/%m/%Y %H:%i') as data, DATE_FORMAT(data, '%d/%m/%Y') as dia, DATE_FORMAT(data, '%H:%i') as hora, id_campeonato, (SELECT nome FROM campeonatos WHERE id = jogos.id_campeonato) as campeonato, id_time_casa, (SELECT nome FROM times WHERE id = jogos.id_time_casa) as time_casa, (SELECT logo FROM times WHERE id = jogos.id_time_casa) as logo_time_casa, id_time_visitante, (SELECT nome FROM times WHERE id = jogos.id_time_visitante) as time_visitante, (SELECT logo FROM times WHERE id = jogos.id_time_visitante) as logo_time_visitante, local, valor, resultado_casa, resultado_visitante, popular FROM jogos WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id));
        $sql = $sql->fetch();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }

    public function getGamesByLeague($league){
        $array = array();
        $sql = "SELECT * FROM jogos WHERE id_campeonato = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($league));
        $sql = $sql->fetchAll();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }

    public function getGamesByTeamId($team){
        $array = array();
        $sql = "SELECT * FROM jogos WHERE id_time_casa = ? OR id_time_visitante = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($team, $team));
        $sql = $sql->fetchAll();
        if($sql && count($sql)){
            $array = $sql;
        }
        return $array;
    }

    public function newGame($status, $data, $id_campeonato, $id_casa, $id_visitante, $local, $valor, $resultado_casa, $resultado_visitante, $popular){
        $sql = "INSERT INTO jogos (status, data, id_campeonato, id_time_casa, id_time_visitante, local, valor, resultado_casa, resultado_visitante, popular) VALUES (?, STR_TO_DATE(?, '%d/%m/%Y %H:%i'), ?, ?, ?, ?, ?, ?, ?, ?)";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($status, $data, $id_campeonato, $id_casa, $id_visitante, $local, $valor, $resultado_casa, $resultado_visitante, $popular));
    }

    public function editGame($id, $status, $data, $id_campeonato, $id_casa, $id_visitante, $local, $valor, $resultado_casa, $resultado_visitante, $popular){
        $sql = "UPDATE jogos SET status = ?, data = STR_TO_DATE(?, '%d/%m/%Y %H:%i'), id_campeonato = ?, id_time_casa = ?, id_time_visitante = ?, local = ?, valor = ?, resultado_casa = ?, resultado_visitante = ?, popular = ?  WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($status, $data, $id_campeonato, $id_casa, $id_visitante, $local, $valor, $resultado_casa, $resultado_visitante, $popular, $id));
    }

    public function deleteGame($id){
        $sql = $this->db->prepare("DELETE FROM jogos WHERE id = ?");
        $sql->execute(array($id));
    }
}