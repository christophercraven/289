/**
 * Database configuration settings 
 * 
 * 
 */
class database_c {
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