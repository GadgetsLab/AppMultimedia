<?php

namespace RDuuke\Newbie\Auth;


class LoginService
{
    protected $adapter;

    protected $session;

    public function __construct(Adapter $adapter, Session $session)
    {
        $this->session = $session;

        $this->adapter = $adapter;
    }


    public function login(Auth $auth, array $input)
    {
        $data = $this->adapter->login($input);
        if (! $data){
            return false;
        }
        $this->forceLogin($auth, $data['username'], $data);
    }

    public function forceLogin(
        Auth $auth,
        $name,
        array $data = array(),
        $status = Status::VALID
    )
    {
        $started = $this->session->resumen() || $this->session->star();

        if (! $started) {
            return false;
        }

        $this->session->regenerateId();

        $auth->set(
            $status,
            time(),
            time(),
            $name,
            $data
        );

        return $status;
    }
}