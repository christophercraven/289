<?php
// map Users class to users_usr table in database
class Users extends \Phalcon\Mvc\Model
{
    public function getSource()
    {
        return "users_usr";
    }

}