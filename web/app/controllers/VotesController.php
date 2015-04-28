<?php

/**
 * Controller for voting methods 
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
 * Returns index view
 * 
 * 
 */	
    public function indexAction()
    {
    }


}