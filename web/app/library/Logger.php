<?php
/**
 * Logger.php
 * 
 * Logs errors in database access.
 */
 

use Phalcon\Logger\Adapter\File as Logger;
/**
 * Listens to database calls
 * 
 * 
 */
class MyDbListener {
    protected $_logger;
    public function __construct()
    {
        $this->_logger = new Logger("../app/logs/db.log");
    }
    public function afterQuery($event, $connection)
    {
        $this->_logger->log($connection->getSQLStatement(), \Phalcon\Logger::INFO);
    }
}