<?php

namespace RDuuke\Newbie\Auth;

use RDuuke\Newbie\User;

class Adapter
{

    public function login(array $input)
    {
        $this->checkInput($input);
        if ($this->checkData($input))
        {
            return $this->rawData($input);
        }
        return false;
    }

    public function checkInput($input)
    {
        if (empty($input['username'])) {
            throw new \Exception('username vacio');
        }

        if (empty($input['password'])) {
            throw new \Exception('password vacio');
        }
    }

    public function resume(Auth $auth)
    {
        // do nothing
    }

    public function rawData($input)
    {
        $property = ['email' => $input['username'], 'password' => md5($input['password'])];
        $date = User::where(['email' => $input['username'], 'password' => md5($input['password'])])->get();
        $date = $date->first();
        $input = ['username' => $date->getFullNameAttribute(), 'rol_id' => $date->rol_id, 'id' => $date->id, 'email' => $date->email ];
        return $input;
    }
    public function checkData($input)
    {
        $property = ['email' => $input['username'], 'password' => md5($input['password'])];
        $count = User::where($property)
            ->count();
        if ($count > 0 ) {
            return true;
        }
        return false;

    }
    public function verify(){

    }
}