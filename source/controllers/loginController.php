<?php
/**
 * This class is the Controller of the Login Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class loginController extends controller{

    /**
     * This function shows the login page.
     */
    public function index(){
        $dados = array();
        $dados['title'] = 'Apostas Já - Login';

        $this->loadTemplate('login/index', $dados);
    }

    public function logoff(){
        $_SESSION['logged'] = null;

        header("Location: ".BASE_URL);
        exit;
    }
}