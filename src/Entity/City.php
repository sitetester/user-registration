<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class City
{
    private $id;
    private $name;
    private $country;
    private $users;
    private $region;
    private $url;
    private $latitude;
    private $longitude;

    public function __construct()
    {
        $this->users = new ArrayCollection();
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

    public function getCountry(): Country
    {
        return $this->country;
    }

    public function setCountry(Country $country)
    {
        $this->country = $country;

        return $this;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region)
    {
        $this->region = $region;

        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;

        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude)
    {
        $this->longitude = $longitude;

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
        return $this->name;
    }
}