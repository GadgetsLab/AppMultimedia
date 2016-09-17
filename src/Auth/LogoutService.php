<?php

namespace RDuuke\Newbie\Auth;



class LogoutService
{
    protected $adapter;

    protected $session;

    public function __construct(Session $session)
    {
       // $this->adapter = $adapter;
        $this->session = $session;
    }

    public function logout(Auth $auth, $status = Status::ANON)
    {
        $this->forceLogout($auth, $status);
    }

    public function forceLogout(Auth $auth, $status = Status::ANON)
    {
        $this->session->regenerateId();

        $auth->set(
            $status,
            null,
            null,
            null,
            array()
        );
        return $status;
    }

}