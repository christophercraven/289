<?php

// map Sponsors class to sponsors_usr table from database
class Sponsors extends \Phalcon\Mvc\Model
{
    public function getSource()
    {
        return "sponsors_spo";
    }

}
