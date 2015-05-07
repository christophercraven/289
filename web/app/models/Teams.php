<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Teams.php
 * Description:
 * Model for accessing the app_app_has_user_usr database table.
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
