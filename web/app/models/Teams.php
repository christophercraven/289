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
/**
 * Assigns database source table to this class
 * 
 * @return object
 */  
    public function getSource()
    {
        return "teams_tea";
    }

}
