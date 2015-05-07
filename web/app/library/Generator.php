<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: Generator.php
 * Description: 
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
 * Hash the random passwords with high encryption
 * 
 * 
 */
function hashIt( $password, $secret ) {     
    $password = hash('sha512', $password . $secret, false);
    return $password;
}