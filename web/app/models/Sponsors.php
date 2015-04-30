<?php
/**
 * Sponsors.php
 *
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
