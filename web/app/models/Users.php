<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Users.php
 * Description:
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
