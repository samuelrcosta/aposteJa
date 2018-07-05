<?php
/**
 * This class is the Controller of the MyBets Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class gameController extends controller{

    /**
     * This page not exist.
     */
    public function index(){
        header("Location: ".BASE_URL);
        exit;
    }

    /**
     * This function shows the a page.
     */
    public function open($id){
        $g = new Games();
        $dados = array();
        $dados['title'] = 'Apostas Já - Brasil x Costa Rica';

        if(!empty($id)){
            $game = $g->getGame($id);
            if(!empty($game)){
                $dados['game'] = $game;
                $this->loadTemplate('game/open', $dados);
            }else{
                header("Location: ".BASE_URL);
                exit;
            }
        }else{
            header("Location: ".BASE_URL);
            exit;
        }
    }
}