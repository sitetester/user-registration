<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Country
{
    private $id;
    private $code;
    private $name;
    private $cities;
    private $users;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return City[]
     */
    public function getCities()
    {
        return $this->cities;
    }

    public function setCities(ArrayCollection $cities): Country
    {
        $this->cities = $cities;

        return $this;
    }

    public function getUsers(): ArrayCollection
    {
        return $this->users;
    }

    public function setUsers(ArrayCollection $users): Country
    {
        $this->users = $users;

        return $this;
    }

    public function __toString()
    {
        return $this->id;
    }
}