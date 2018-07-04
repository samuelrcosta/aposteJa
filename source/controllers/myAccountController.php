<?php
/**
 * This class is the Controller of the MyAccount Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class myAccountController extends controller{

    /**
     * This function shows the my bets page.
     */
    public function index(){
        $dados = array();
        $dados['title'] = 'Apostas Já - Minha Conta';

        $this->loadTemplate('myaccount/index', $dados);
    }
}