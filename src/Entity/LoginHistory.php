<?php

namespace App\Entity;

class LoginHistory
{
    private $id;
    private $user;
    private $loginDate;
    private $logoutDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function getLoginDate()
    {
        return $this->loginDate;
    }

    public function setLoginDate($loginDate)
    {
        $this->loginDate = $loginDate;

        return $this;
    }

    public function getLogoutDate()
    {
        return $this->logoutDate;
    }

    public function setLogoutDate($logoutDate)
    {
        $this->logoutDate = $logoutDate;

        return $this;
    }
}
