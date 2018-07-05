<?php
class adminTeamsController extends controller{

    /**
     * This function shows the teams list.
     */
    public function index(){
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
        $dados = array();
        $t = new Teams();
        $dados['times'] = $t->getTeams();
        $dados['title'] = 'Admin - Times';

        $this->loadAdminTemplate('admin/teams/index', $dados);
    }

    public function newTeam(){
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
        $dados = array();
        $dados['title'] = 'Admin - Cadastrar novo Time';
        $t = new Teams();

        // Quando receber o post
        if(isset($_POST['nome'])) {
            if(!empty($_POST['nome'])){
                if(isset($_FILES['imagem']['tmp_name']) && !empty($_FILES['imagem']['tmp_name'])){
                    $nome = addslashes($_POST['nome']);
                    $imagem = $_FILES['imagem'];
                    // Edita
                    $resp = $t->newTeam($nome, $imagem);
                    if($resp){
                        header("Location: ".BASE_URL."adminTeams");
                        exit;
                    }else{
                        $dados['mensagem'] = 'Erro ao salvar a imagem do time';
                    }
                }else{
                    $dados['mensagem'] = 'Preencha a imagem do time';
                }
            }else{
                $dados['mensagem'] = 'Preencha o nome do time';
            }
        }

        $this->loadAdminTemplate('admin/teams/newTeam', $dados);
    }

    public function editTeam($id){
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
        $dados = array();
        $dados['title'] = 'Admin - Editar Time';
        $t = new Teams();

        // Quando receber o post
        if(isset($_POST['nome']) && !empty($id)) {
            if(!empty($_POST['nome'])){
                $nome = addslashes($_POST['nome']);
                if(isset($_FILES['imagem']['tmp_name']) && !empty($_FILES['imagem']['tmp_name'])){
                    $imagem = $_FILES['imagem'];
                }else{
                    $imagem = null;
                }
                // Edita o time
                $resp = $t->editTeam($id, $nome, $imagem);
                if($resp){
                    header("Location: ".BASE_URL."adminTeams");
                    exit;
                }else{
                    $dados['mensagem'] = 'Erro ao salvar a imagem do time';
                }
            }else{
                $dados['mensagem'] = 'Preencha o nome do time';
            }
        }

        if(!empty($id)){
            $team = $t->getTeam(addslashes($id));
            if(!empty($team)){
                $dados['time'] = $team;
                $this->loadAdminTemplate('admin/teams/editTeam', $dados);
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
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
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