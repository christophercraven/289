<?php
/**
 * Teams.php
 *
 * Model for accessing the votes_vot database table.
 */ 
 
/**
 * Teams class 
 *
 * Assigns related database table to this class
 */
class Teams extends \Phalcon\Mvc\Model
{
	public $app_app_id_app;
	public $user_usr_id_usr;
	public $types_typ_id_typ;
/**
 * Assigns database source table to this class
 * 
 * @return object
 */  
    public function getSource()
    {
        return "app_app_has_user_usr";
    }

}
