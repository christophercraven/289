<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Apps.php
 * Description: 
 * Model for accessing the apps_app database table.
 * For member purposes, "Apps" are viewed under the "Projects" menu
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