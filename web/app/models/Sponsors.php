<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Sponsors.php
 * Description:
 * Model for accessing the sponsors_spo database table.
 */ 
 
/**
 * Sponsors class 
 *
 * Assigns related database table to this class
 */
class Sponsors extends \Phalcon\Mvc\Model
{
/**
 * Assigns database source table to this class
 * 
 * @return object
 */  
    public function getSource()
    {
        return "sponsors_spo";
    }

}
