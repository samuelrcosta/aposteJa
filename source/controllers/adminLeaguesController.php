<?php

class adminLeaguesController extends controller{

    /**
     * This function shows the games list.
     */
    public function index(){
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
        $dados = array();
        $l = new Leagues();
        $dados['campeonatos'] = $l->getLeagues();
        $dados['title'] = 'Admin - Campeonatos';

        $this->loadAdminTemplate('admin/leagues/index', $dados);
    }

    public function newLeague(){
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
        $dados = array();
        $dados['title'] = 'Admin - Cadastrar novo campeonato';
        $l = new Leagues();

        // Quando receber o post
        if(isset($_POST) && !empty($_POST)){
            if(isset($_POST['nome']) && !empty($_POST['nome'])) {
                $nome = addslashes($_POST['nome']);

                // Edita
                $l->newLeague($nome);
                header("Location: ".BASE_URL."adminLeagues");
                exit;
            }
        }

        $this->loadAdminTemplate('admin/leagues/newLeague', $dados);
    }

    public function editLeague($id){
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
        $dados = array();
        $dados['title'] = 'Admin - Editar Jogo';
        $l = new Leagues();

        // Quando receber o post
        if(isset($_POST) && !empty($_POST)){
            if((isset($_POST['nome']) && !empty($_POST['nome'])) && !empty($id)) {
                $nome = addslashes($_POST['nome']);
                $id = addslashes($id);

                // Edita
                $l->editLeague($id, $nome);
                header("Location: ".BASE_URL."adminLeagues");
                exit;
            }
        }

        if(!empty($id)){
            $league = $l->getLeague(addslashes($id));
            if(!empty($league)){
                $dados['league'] = $league;
                $this->loadAdminTemplate('admin/leagues/editLeague', $dados);
            }else{
                header("Location: ".BASE_URL."adminLeagues");
                exit;
            }
        }else{
            header("Location: ".BASE_URL."adminLeagues");
            exit;
        }
    }


    public function deleteLeague($id){
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
        $l = new Leagues();
        $g = new Games();
        if(!empty($id)){
            $league = $l->getLeague(addslashes($id));
            if(!empty($league)){
                $games = $g->getGamesByLeague($id);
                if(!empty($games)){
                    $erro = "Existem jogos cadastrados com este campeonato, impossível excluir.";
                    $erro = urlencode($erro);
                    header("Location: ".BASE_URL."adminLeagues/index?erro=".$erro);
                    exit;
                }else{
                    $l->deleteLeague($id);
                    header("Location: ".BASE_URL."adminLeagues");
                    exit;
                }
            }else{
                header("Location: ".BASE_URL."adminLeagues");
                exit;
            }
        }else{
            header("Location: ".BASE_URL."adminLeagues");
            exit;
        }
    }
}