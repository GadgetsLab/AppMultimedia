<?php

namespace RDuuke\Newbie\Auth;


class NullAdapter
{
    public function login(array $input)
    {
        return array(null, null);
    }
}