<?php
/**
 * Images.php
 *
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
