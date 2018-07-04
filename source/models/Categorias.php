<?php
/**
 * This class retrieves and saves data of the category.
 *
 * @author  samuelrcosta
 * @version 0.1.0, 25/10/2017
 * @since   0.1
 */
class Categorias extends model{
    /**
     * This function retrieves all data from an category, by using it's ID.
     *
     * @param   $id     The category's ID number saved in the database.
     * @return  array containing all data retrieved.
     */
    public function getCategoria($id){
        $sql = "SELECT * FROM categorias WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->execute(array($id));
        $sql = $sql->fetch();
        return $sql;
    }

    /**
     * This function retrieves all data from category's database.
     *
     * @return  array containing all data retrieved.
     */
    public function getCategorias(){
        $sql = "SELECT * FROM categorias";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        $sql = $sql->fetchAll();
        return $sql;
    }
}