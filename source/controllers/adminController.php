<?php
/**
 * This class is the Controller of the Admin HomePage.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class adminController extends controller{

    /**
     * This function shows the homepage.
     */
    public function index($logged = false){
        $dados = array();
        $dados['title'] = 'Admin';
        echo "TA AQUI";
        if($logged){
            $_SESSION['admin_logged'] = true;
            header("Location: ".BASE_URL."adminGames");
        }else{
            header("Location: ".BASE_URL."admin/login");
        }
    }

    /**
     * This function shows the login page.
     */
    public function login(){
        $dados = array();
        $dados['title'] = 'Admin - Login';

        $this->loadAdminTemplate('admin/login/index', $dados);
    }

    public function logoff(){
        $_SESSION['logged'] = null;

        header("Location: ".BASE_URL);
        exit;
    }
}