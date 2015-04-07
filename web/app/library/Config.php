<?php
//Configuration settings for local and remote servers
if ("127.6.239.129" == $_SERVER['SERVER_ADDR']) {
	// OpenShift
	$settings = array(
		"database" => array(
			"host" => "127.6.239.130:3306",//port 3306
			//"port" => "3306",
			"username" => "adminCsUqmGD",
			"password" => "R3Un9sRSYHPI",
			"dbname" => "db289"
		),
		"baseUri" => "/"
	);
} else {
	// localhost
	$settings = array(

		"database" => array(
			"host" => "localhost",
			"username" => "root",
			"password" => "",
			"dbname" => "db289"
		),
		"baseUri" => "/289/web/"
				
	);
}

