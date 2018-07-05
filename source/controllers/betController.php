<?php
/**
 * This class is the Controller of the Bet Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class betController extends controller{

    /**
     * This page not exists.
     */
    public function index(){
        header("Location: ".BASE_URL);
        exit;
    }

    /**
     * This function shows the my bets register.
     */
    public function new($id){
        $g = new Games();
        // Checks if its logged
        if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
            $dados = array();
            $dados['title'] = 'Apostas Já - Nova Aposta';

            if(!empty($id)){
                $game = $g->getGame($id);
                if(!empty($game)){
                    $dados['game'] = $game;
                    $this->loadTemplate('bet/new', $dados);
                }else{
                    header("Location: ".BASE_URL);
                    exit;
                }
            }else{
                header("Location: ".BASE_URL);
                exit;
            }
        }else{
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
}