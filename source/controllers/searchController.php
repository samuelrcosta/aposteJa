<?php
/**
 * This class is the Controller of the Search Page.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class searchController extends controller{

    /**
     * This function shows the serach page.
     */
    public function index($termo){
        $dados = array();
        $dados['title'] = 'Apostas Já - '.$termo;

        $this->loadTemplate('search/index', $dados);
    }
}