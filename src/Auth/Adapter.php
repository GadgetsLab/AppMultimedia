<?php

namespace RDuuke\Newbie\Auth;


class Adapter
{
    public function login(array $input)
    {
        print_r($input);
        die();
    }
}