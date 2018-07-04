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
        $dados = array();
        $dados['title'] = 'Admin - Cadastrar novo jogo';

        $this->loadAdminTemplate('admin/games/newGame', $dados);
    }

    public function editGame($id){
        $dados = array();
        $dados['title'] = 'Admin - Editar Jogo';

        $this->loadAdminTemplate('admin/games/editGame', $dados);
    }

    public function insertResult($id){
        $dados = array();
        $dados['title'] = 'Admin - Inserir Resultado';

        $this->loadAdminTemplate('admin/games/insertResult', $dados);
    }

    public function deleteGame($id){
        header("Location: ".BASE_URL."adminGames");
    }
}