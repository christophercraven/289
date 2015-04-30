<?php
/**
 * Apps.php
 *
 * Model for accessing the apps_app database table.
 * Apps are the same as "Projects"
 * 
 */ 
 
/**
 * Apps class assigns database to this class
 *
 */
class Apps extends \Phalcon\Mvc\Model
{
/**
 * Assigns database source table to this class
 *
 * @return object
 */
    public function getSource()
    {	

        return "app_app";
    }

}