<?php
/**
 * Author: Chris Craven
 * Revision date: 05/07/2015
 * File name: VotesController.php
 * Description: 
 * Controller for voting page on member dashboard
 */
 
/**
 * Votes controller class for voting methods 
 * 
 * 
 */ 
class VotesController extends ControllerBase
{
/**
 * Initialize page and set title 
 * 
 * 
 */
    public function initialize()
    {
        $this->tag->setTitle('Your Votes');
        parent::initialize();
    }
/**
 * Returns index view by default
 */	
    public function indexAction()
    {
    }


}