<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

// Although getters return mandatory fields, but they are still marked as "?string",
// the "?" part is needed when we first go to user registration form
// since it's a new entity, it doesn't have data available in it's attributes yet
class User implements UserInterface, \Serializable
{
    // this needs to be public, since it's used in "security.yaml" under "providers" section
    public $email;

    private $id;
    private $first;
    private $last;
    private $country;
    private $city;
    private $password;

    /** @var \DateTimeInterface */
    private $loginDate;

    /** @var \DateTimeInterface */
    private $logoutDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirst(): ?string
    {
        return $this->first;
    }

    public function setFirst(string $first)
    {
        $this->first = $first;

        return $this;
    }

    public function getLast(): ?string
    {
        return $this->last;
    }

    public function setLast(string $last)
    {
        $this->last = $last;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(Country $country)
    {
        $this->country = $country;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity(City $city)
    {
        $this->city = $city;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->email;
    }

    // see https://symfony.com/doc/current/doctrine/registration_form.html#having-a-registration-form-with-only-email-no-username
    public function setUsername(string $username)
    {
        $this->email = $username;
    }

    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;

        return $this;
    }

    public function getLoginDate(): string
    {
        return $this->loginDate->format('Y-m-d H:i:s');
    }

    public function setLoginDate(string $loginDate)
    {
        $this->loginDate = $loginDate;

        return $this;
    }

    public function getLogoutDate(): string
    {
        return $this->logoutDate;
    }

    public function setLogoutDate(string $logoutDate)
    {
        $this->logoutDate = $logoutDate;

        return $this;
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials()
    {
    }

    // see https://symfony.com/doc/current/security/entity_provider.html#understanding-serialize-and-how-a-user-is-saved-in-the-session
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt,
        ]);
    }

    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->email,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }
}
