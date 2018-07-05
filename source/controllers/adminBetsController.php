<?php
/**
 * This class is the Controller of the Admin Bets Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class adminBetsController extends controller{

    /**
     * This function shows the bets list.
     */
    public function index(){
        // Checks if its logged
        if(!(isset($_SESSION['admin_logged']) && !empty($_SESSION['admin_logged']))) {
            header("Location: ".BASE_URL."admin/login");
            exit;
        }
        $dados = array();
        $dados['title'] = 'Admin - Apostas';

        $this->loadAdminTemplate('admin/bets/index', $dados);
    }
}