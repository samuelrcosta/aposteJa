<?php
/**
 * This class is the Controller of the MyBets Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class myBetsController extends controller{

    /**
     * This function shows the my bets page.
     */
    public function index(){
        $dados = array();
        $dados['title'] = 'Apostas Já - Minhas Apostas';

        $this->loadTemplate('mybets/index', $dados);
    }
}