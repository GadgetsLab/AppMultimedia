<?php

namespace RDuuke\Newbie\Auth;

class Auth
{

    protected $segment;

    public function __construct(Segment $segment)
    {
        $this->segment = $segment;
    }

    public function set(
        $status,
        $first_active,
        $last_active,
        $username,
        array $userdata
    ) {
        $this->setStatus($status);
        $this->setFirstActive($first_active);
        $this->setLastActive($last_active);
        $this->setUserName($username);
        $this->setUserData($userdata);
    }
    
    public function isValid()
    {
        return $this->getStatus() == Status::VALID;
    }
    
    public function isAnon()
    {
        return $this->getStatus() == Status::ANON;
    }
    
    public function isIdle()
    {
        return $this->getStatus() == Status::IDLE;
    }

    public function isExpired()
    {
        return $this->getStatus() == Status::EXPIRED;
    }

    public function setStatus($status)
    {
        $this->segment->set('status', $status);
    }
 
    public function getStatus()
    {
        return $this->segment->get('status', Status::ANON);
    }
  
    public function setFirstActive($first_active)
    {
        $this->segment->set('first_active', $first_active);
    }
   
    public function getFirstActive()
    {
        return $this->segment->get('first_active');
    }

    public function setLastActive($last_active)
    {
        $this->segment->set('last_active', $last_active);
    }
   
    public function getLastActive()
    {
        return $this->segment->get('last_active');
    }
    
  
    public function setUserName($username)
    {
        $this->segment->set('username', $username);
    }
 
    public function getUserName()
    {
        return $this->segment->get('username');
    }

    public function setUserData(array $userdata)
    {
        $this->segment->set('userdata', $userdata);
    }
 
    public function getUserData()
    {
        return $this->segment->get('userdata', array());
    }
    /*
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
    }*/

}