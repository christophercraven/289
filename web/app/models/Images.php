<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Images.php
 * Description: 
 * Model for accessing the images_img database table.
 */ 
 
/**
 * Images class 
 *
 * Assigns related database table to this class
 */
class Images extends \Phalcon\Mvc\Model
{
/**
 * Assigns database source table to this class
 * 
 * @return object
 */  
    public function getSource()
    {
        return "images_img";
    }

}
