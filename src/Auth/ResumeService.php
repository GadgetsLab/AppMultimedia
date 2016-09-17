<?php
/**
 * Created by PhpStorm.
 * User: RDuuke
 * Date: 16/09/2016
 * Time: 04:16 PM
 */

namespace RDuuke\Newbie\Auth;



class ResumeService
{
    protected $adapter;

    protected $session;

    protected $timer;

    protected $logout_service;

    public function __construct(
        Adapter $adapter,
        Session $session,
        Timer $timer,
        LogoutService $logout_service
    )
    {
        $this->adapter = $adapter;
        $this->session = $session;
        $this->timer = $timer;
        $this->logout_service = $logout_service;
    }

    public function resume(Auth $auth)
    {
        $this->session->resumen();
        if (! $this->timeOut($auth)) {
            $auth->setLastActive(time());
            $this->adapter->resume($auth);
        }
    }

    public function timeOut(Auth $auth)
    {
        if ($auth->isAnon()) {
            return false;
        }

        $timeout_status = $this->timer->getTimeoutStatus
        (
            $auth->getFirstActive(),
            $auth->getLastActive()
        );

        if ($timeout_status) {
            $auth->setStatus($timeout_status);
            $this->logout_service->logout($auth, $timeout_status);
            return true;
        }

        return false;
    }
}