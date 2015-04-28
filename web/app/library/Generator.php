<?php
/**
 * Generator.php
 * 
 * Sets secrets, hash method, generates passwords. 
 */
 
/**
 * Generate random passwords from word database
 * 
 * 
 */
function generateRandom() {

    $colors = Colors::find();
    $colors = $colors->toarray();
    $color = rand(0, count($colors)-1);
    $fruits = Fruits::find();
    $fruits = $fruits->toarray();
    $fruit = rand(0, count($fruits)-1);
         
    $generated = $colors[$color]['name_col'] . $fruits[$fruit]['name_fru'];
    return $generated;
}

/**
 * Sets a secret for the password hashing
 * 
 * 
 */
$option = array(
    "secret" => "The rain in Spain falls mainly in the plain."
    );
	
/**
 * Generate random passwords from word database
 * 
 * 
 */
function hashIt( $password, $secret ) {     
    $password = hash('sha512', $password . $secret, false);
    return $password;
}