<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Votes.php
 * Description:
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
