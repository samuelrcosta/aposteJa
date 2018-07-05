<?php
/**
 * This class is the Controller of the Admin Games Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class adminGamesController extends controller{

    /**
     * This function shows the games list.
     */
    public function index(){
        $dados = array();
        $g = new Games();
        $dados['jogos'] = $g->getGames();
        $dados['title'] = 'Admin - Jogos';

        $this->loadAdminTemplate('admin/games/index', $dados);
    }

    public function newGame(){
        $l = new Leagues();
        $t = new Teams();
        $g = new Games();
        $dados = array();
        $dados['leagues'] = $l->getLeagues();
        $dados['times'] = $t->getTeams();
        $dados['title'] = 'Admin - Cadastrar novo jogo';

        // Quando receber o post
        if(isset($_POST) && !empty($_POST)){
            $data = addslashes($_POST['data']);
            $campeonato = addslashes($_POST['campeonato']);
            $time_casa = addslashes($_POST['time_casa']);
            $time_visitante = addslashes($_POST['time_visitante']);
            $local = addslashes($_POST['local']);
            $valor = addslashes($_POST['valor']);
            $valor = str_replace('.', '', $valor);
            $valor = str_replace(',', '.', $valor);
            if(isset($_POST['popular'])){
                $popular = 1;
            }else{
                $popular = 0;
            }
            // Edita
            $g->newGame('sem_resultado', $data, $campeonato, $time_casa, $time_visitante, $local, $valor, 0, 0, $popular);
            header("Location: ".BASE_URL."adminGames");
            exit;
        }

        $this->loadAdminTemplate('admin/games/newGame', $dados);
    }

    public function editGame($id){
        $l = new Leagues();
        $t = new Teams();
        $g = new Games();
        $dados = array();
        $dados['title'] = 'Admin - Editar Jogo';
        $dados['leagues'] = $l->getLeagues();
        $dados['times'] = $t->getTeams();

        if(!empty($id)){
            $game = $g->getGame(addslashes($id));
            if(!empty($game)){
                $dados['game'] = $game;

                // Quando receber o post
                if(isset($_POST) && !empty($_POST) && !empty($id)){
                    $data = addslashes($_POST['data']);
                    $campeonato = addslashes($_POST['campeonato']);
                    $time_casa = addslashes($_POST['time_casa']);
                    $time_visitante = addslashes($_POST['time_visitante']);
                    $local = addslashes($_POST['local']);
                    $valor = addslashes($_POST['valor']);
                    $valor = str_replace('.', '', $valor);
                    $valor = str_replace(',', '.', $valor);
                    $id = addslashes($id);
                    if(isset($_POST['popular'])){
                        $popular = 1;
                    }else{
                        $popular = 0;
                    }
                    // Edita
                    $g->editGame($id, $dados['game']['status'], $data, $campeonato, $time_casa, $time_visitante, $local, $valor, $dados['game']['resultado_casa'], $dados['game']['resultado_visitante'], $popular);
                    header("Location: ".BASE_URL."adminGames");
                    exit;
                }

                $this->loadAdminTemplate('admin/games/editGame', $dados);
            }else{
                header("Location: ".BASE_URL."adminGames");
                exit;
            }
        }else{
           header("Location: ".BASE_URL."adminGames");
            exit;
        }
    }

    public function insertResult($id){
        $dados = array();
        $dados['title'] = 'Admin - Inserir Resultado';
        $g = new Games();
        $t = new Teams();
        if(!empty($id)){
            $game = $g->getGame($id);
            if(!empty($game)){
                $dados['game'] = $game;
                $dados['time_casa'] = $t->getTeam($game['id_time_casa']);
                $dados['time_visitante'] = $t->getTeam($game['id_time_visitante']);

                // Quando receber o post
                if(isset($_POST) && !empty($_POST)){
                    $resultado_casa = addslashes($_POST['time_casa']);
                    $resultado_visistante = addslashes($_POST['time_visitante']);
                    // Edita
                    $g->editGame($id, 'concluido', $dados['game']['data'], $dados['game']['id_campeonato'], $dados['game']['id_time_casa'], $dados['game']['id_time_visitante'], $dados['game']['local'], $dados['game']['valor'], $resultado_casa, $resultado_visistante, $dados['game']['popular']);
                    header("Location: ".BASE_URL."adminGames");
                    exit;
                }

                $this->loadAdminTemplate('admin/games/insertResult', $dados);
            }else{
                header("Location: ".BASE_URL."adminGames");
            }
        }else{
            header("Location: ".BASE_URL."adminGames");
        }
    }

    public function deleteGame($id){
        $g = new Games();
        if(!empty($id)){
            $g->deleteGame($id);
        }
        header("Location: ".BASE_URL."adminGames");
    }
}