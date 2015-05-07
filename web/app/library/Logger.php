<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Logger.php
 * Description: 
 * Logs errors in database access.
 */

use Phalcon\Logger\Adapter\File as Logger;
/**
 * Listener class for database calls and logging errors
 * 
 * 
 */
class MyDbListener {
    protected $_logger;
	/**
	 * Constructs a new log file
	 * 
	 * 
	 */
    public function __construct()
    {
        $this->_logger = new Logger("../app/logs/db.log");
    }
	/**
	 * Listens to database queries and adds to log
	 * 
	 * 
	 */
    public function afterQuery($event, $connection)
    {
        $this->_logger->log($connection->getSQLStatement(), \Phalcon\Logger::INFO);
    }
}