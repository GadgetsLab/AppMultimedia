<?php

namespace RDuuke\Newbie\Auth;


use RDuuke\Newbie\User;

class Authenticate
{
    protected $username;
    protected $password;
    protected $check = false;
    protected $rol;

    public function __construct($email, $password)
    {
        $this->username = $email;
        $this->password = $password;
    }

    public function validate()
    {
        $property = ['email' => $this->username, 'password' => $this->password];
        $count = User::where($property)
            ->count();
        if ($count > 0 ) {
            $this->check = true;
            return true;
        }
        return false;
    }

}