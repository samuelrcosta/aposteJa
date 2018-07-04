<?php
/**
 * This class is the Controller of the HomePage.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class homeController extends controller{

    /**
     * This function shows the homepage.
     *
     */
    public function index($logged = false){
        $dados = array();
        $dados['title'] = 'Apostas Já';

        if($logged){
            $_SESSION['logged'] = true;
        }

        $this->loadTemplate('home/index', $dados);
    }
}