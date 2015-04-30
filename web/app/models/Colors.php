<?php
/**
 * Colors.php
 *
 * Model for accessing the colors_col database table.
 * 
 */ 
 
/**
 * Colors class 
 *
 * Assigns related database table to this class
 */
class Colors extends \Phalcon\Mvc\Model
{
    public function getSource()
    {
/**
 * Assigns database source table to this class
 * 145 named colors in database based on X11 colors
 * 
 * @return object
 */ 
        return "colors_col";
    }

}