<?php
class adminTeamsController extends controller{

    /**
     * This function shows the teams list.
     */
    public function index(){
        $dados = array();
        $t = new Teams();
        $dados['times'] = $t->getTeams();
        $dados['title'] = 'Admin - Times';

        $this->loadAdminTemplate('admin/teams/index', $dados);
    }

    public function newTeam(){
        $dados = array();
        $dados['title'] = 'Admin - Cadastrar novo Time';
        $t = new Teams();

        echo "POST: <br>";
        print_r($_POST);
        echo "<br>FILES: <br>";
        print_r($_FILES);
        // Quando receber o post
        if(isset($_POST['nome'])) {
            if(!empty($_POST['nome'])){
                if(isset($_FILES['imagem']['tmp_name']) && !empty($_FILES['imagem']['tmp_name'])){
                $nome = addslashes($_POST['nome']);
                $imagem = $_FILES['imagem'];
                // Edita
                $t->newTeam($nome, $imagem);
                header("Location: ".BASE_URL."adminTeams");
                exit;

                }else{
                    $dados['mensagem'] = 'Preencha a imagem do time';
                }
            }else{
                $dados['mensagem'] = 'Preencha o nome do time';
            }
        }

        $this->loadAdminTemplate('admin/teams/newTeam', $dados);
    }

    public function editLeague($id){
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
                header("Location: ".BASE_URL."adminTeams");
                exit;
            }
        }

        if(!empty($id)){
            $league = $l->getLeague(addslashes($id));
            if(!empty($league)){
                $dados['league'] = $league;
                $this->loadAdminTemplate('admin/leagues/editLeague', $dados);
            }else{
                header("Location: ".BASE_URL."adminTeams");
                exit;
            }
        }else{
            header("Location: ".BASE_URL."adminTeams");
            exit;
        }
    }


    public function deleteTeam($id){
        $t = new Teams();
        $g = new Games();
        if(!empty($id)){
            $team = $t->getTeam(addslashes($id));
            if(!empty($team)){
                $games = $g->getGamesByTeamId($id);
                if(!empty($games)){
                    $erro = "Existem jogos cadastrados com este time, impossível excluir.";
                    $erro = urlencode($erro);
                    header("Location: ".BASE_URL."adminTeams/index?erro=".$erro);
                    exit;
                }else{
                    $t->deleteTeam($id);
                    header("Location: ".BASE_URL."adminTeams");
                    exit;
                }
            }else{
                header("Location: ".BASE_URL."adminTeams");
                exit;
            }
        }else{
            header("Location: ".BASE_URL."adminTeams");
            exit;
        }
    }
}