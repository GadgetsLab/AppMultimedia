<?php

namespace RDuuke\Newbie\Auth;


class Segment
{

    protected $name;

    public function __construct($name = 'RDuuke\Newbie\Auth\Auth')
    {
        $this->name = $name;
    }

    public function get($key, $alt = null)
    {
        if (isset($_SESSION[$this->name][$key])) {
            return $_SESSION[$this->name][$key];
        }
        return $alt;
    }

    public function set($key, $val)
    {
        if (! isset($_SESSION)) {
            return;
        }
        $_SESSION[$this->name][$key] = $val;
    }
}