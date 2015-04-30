<?php
/**
 * Users.php
 *
 * Model for accessing the users_usr database table.
 */ 
 
/**
 * Users class 
 *
 * Assigns related database table to this class
 */
class Users extends \Phalcon\Mvc\Model
{
/**
 * Assigns database source table to this class
 * 
 * @return object
 */  
    public function getSource()
    {
        return "users_usr";
    }

}
