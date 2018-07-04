<?php
/**
 * This class is the Controller of Not Found Pages(404 error).
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class notfoundController extends controller{

    /**
     * This function shows 404 Errors when they happen.
     */
    public function index(){
        $dados['title'] = "404 - Página não encontrada";
        $this->loadTemplate('notfound/index', $dados);
    }
}
?>