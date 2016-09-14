<?php


namespace RDuuke\Newbie\Auth;


class Session
{

    public function star()
    {
        return session_start();
    }

    public function regenerateId()
    {
        return session_regenerate_id(true);
    }
}