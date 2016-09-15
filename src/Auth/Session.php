<?php

namespace RDuuke\Newbie\Auth;


class Session
{
    protected $cookie;

    public function __construct(array $cookie)
    {
        $this->cookie = $cookie;
    }

    public function star()
    {
        return session_start();
    }

    public function regenerateId()
    {
        return session_regenerate_id(true);
    }

    public function resumen()
    {
        if (session_id() !== '') {
            return true;
        }

        if (isset($this->cookie[session_name()])) {
            return $this->star();
        }

        return false;
    }
}