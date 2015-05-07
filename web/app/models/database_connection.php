/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: database_connection.php
 * Description: 
 * Configuration of database access
 * 
 */

/**
 * Database configuration settings class
 * 
 * 
 */
class database_c {
	/**
	 * getEnv() method selects array of settings based on server name
	 * 
	 * @return array
	 */
	public function getEnv() {
			if ("localhost" == $_SERVER['SERVER_NAME']) {
				return array(
				"host" => "localhost",
				"username" => "root",
				"password" => "",
				"dbname" => "db289"
				);
			} else {
				return array(
				"host" => "127.6.239.130",//port 3306
				"username" => "adminCsUqmGD",
				"password" => "R3Un9sRSYHPI",
				"dbname" => "db289"
				);
			}
	}
}