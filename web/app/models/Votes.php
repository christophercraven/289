<?php
/**
 * Votes.php
 *
 * Model for accessing the votes_vot database table.
 */ 
 
/**
 * Users class 
 *
 * Assigns related database table to this class
 */
class Votes extends \Phalcon\Mvc\Model
{
/**
 * Assigns database source table to this class
 * 
 * @return object
 */  
    public function getSource()
    {
        return "votes_vot";
    }

}
