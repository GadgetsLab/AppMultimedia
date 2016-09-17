<?php

namespace RDuuke\Newbie\Auth;


class Timer
{
    protected $ini_gc_maxlifetime;

    protected $ini_cookie_lifetime;

    protected $idle_ttl = 1440;

    protected $expire_ttl = 14400;


    public function __construct(
        $ini_gc_maxlifetime = 1440,
        $ini_cookie_lifetime = 0,
        $idle_ttl = 1440,
        $expire_ttl = 14400
    ) {
        $this->ini_gc_maxlifetime = $ini_gc_maxlifetime;
        $this->ini_cookie_lifetime = $ini_cookie_lifetime;
        $this->setIdleTtl($idle_ttl);
        $this->setExpireTtl($expire_ttl);
    }

    public function setIdleTtl($idle_ttl)
    {
        if ($this->ini_gc_maxlifetime < $idle_ttl) {
            throw new \Exception('session.gc_maxlifetime less than idle time');
        }
        $this->idle_ttl = $idle_ttl;
    }

    public function getIdleTtl()
    {
        return $this->idle_ttl;
    }

    public function setExpireTtl($expire_ttl)
    {
        $bad = $this->ini_cookie_lifetime > 0
            && $this->ini_cookie_lifetime < $expire_ttl;
        if ($bad) {
            throw new \Exception('session.cookie_lifetime less than expire time');
        }
        $this->expire_ttl = $expire_ttl;
    }

    public function getExpireTtl()
    {
        return $this->expire_ttl;
    }

    public function hasExpired($first_active)
    {
        return $this->expire_ttl <= 0
        || ($first_active + $this->getExpireTtl()) < time();
    }

    public function hasIdled($last_active)
    {
        return $this->idle_ttl <= 0
        || ($last_active + $this->getIdleTtl()) < time();
    }

    public function getTimeoutStatus($first_active, $last_active)
    {
        if ($this->hasExpired($first_active)) {
            return Status::EXPIRED;
        }
        if ($this->hasIdled($last_active)) {
            return Status::IDLE;
        }
    }

}