<?php
/**
 * This classe is used as an interface for model classes.
 *
 * @author  samuelrcosta
 * @version 1.0.0, 30/06/2018
 * @since   1.0
 */
class model{

    /**
     * The object for database controls.
     */
    protected $db;

    /**
     * The constructor for models.
     */
    public function __construct(){
        global $db;

        $this->db = $db;
    }
}