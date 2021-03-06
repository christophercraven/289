<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Fruits.php
 * Description: 
 * Model for accessing the fruits_fru database table.
 */ 
 
/**
 * Fruits class 
 *
 * Assigns related database table to this class
 */
class Fruits extends \Phalcon\Mvc\Model
{
    public function getSource()
    {	
/**
 * Assigns database source table to this class
 * 78 fruits are in database
 * 
 * @return object
 */  
        return "fruits_fru";
    }

}