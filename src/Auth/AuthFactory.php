<?php

namespace RDuuke\Newbie\Auth;


class AuthFactory
{
    protected $session;

    protected $segment;


    public function __construct(array $cookie, Session $session = null, Segment $segment = null)
    {
        $this->session = $session;

        if (! $this->session) {
            $this->session = new Session($cookie);
        }

        $this->segment = $segment;

        if (! $this->segment) {
            $this->segment = new Segment();
        }
    }

    public function newInstance()
    {
        return new Auth($this->segment);
    }

    public function newLoginService(Adapter $adapter = null)
    {
        return new LoginService(
            $this->fixAdapter($adapter),
            $this->session
        );
    }

    protected function fixAdapter(Adapter $adapter = null)
    {
        if ($adapter === null) {
            $adapter = new NullAdapter;
        }
        return $adapter;
    }

    public function newLogoutService(Adapter $adapter = null)
    {
        return new LogoutService(
            $this->session
        );
    }

    public function newResumeService(
        Adapter $adapter = null,
        $idle_ttl = 1440,
        $expire_ttl = 14400
    ) {
        $adapter = $this->fixAdapter($adapter);
        $timer = new Timer(
            ini_get('session.gc_maxlifetime'),
            ini_get('session.cookie_lifetime'),
            $idle_ttl,
            $expire_ttl
        );
        $logout_service = new LogoutService(
            $this->session
        );
        return new ResumeService(
            $adapter,
            $this->session,
            $timer,
            $logout_service
        );
    }
}