<?php
/**
 * Configuration settings for local and remote servers
 * 
 * 
 */
if ("127.6.239.129" == $_SERVER['SERVER_ADDR']) {
/**
 * OpenShift settings
 * 
 * 
 */ 
	$settings = array(
		"database" => array(
			"host" => "127.6.239.130",//port 3306
			"port" => "3306",
			"username" => "adminCsUqmGD",
			"password" => "R3Un9sRSYHPI",
			"dbname" => "db289"
		),
		"baseUri" => "/"
	);
} else {
/**
 * Localhost settings
 * 
 * 
 */ 
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
/**
 * Salt for password hashing
 * 
 * 
 */ 
$settings = array_merge($settings, array(
    "salt" => "The rain in Spain falls mainly in the plain."
    ));