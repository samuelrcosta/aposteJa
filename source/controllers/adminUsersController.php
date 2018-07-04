<?php
/**
 * This class is the Controller of the Admin Users Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class adminUsersController extends controller{

    /**
     * This function shows the users list.
     */
    public function index(){
        $dados = array();
        $dados['title'] = 'Admin - Usuários';

        $this->loadAdminTemplate('admin/users/index', $dados);
    }

    public function editUser($id){
        $dados = array();
        $dados['title'] = 'Admin - Editar Usuário';

        $this->loadAdminTemplate('admin/users/editUser', $dados);
    }


    public function deleteUser($id){
        header("Location: ".BASE_URL."adminUsers");
    }
}