<?php

namespace App\Form\Model;

class ChangePassword
{
    private $oldPassword;
    private $newPassword;

    public function getOldPassword(): ?string
    {
        return $this->oldPassword;
    }

    public function setOldPassword(string $oldPassword)
    {
        $this->oldPassword = $oldPassword;
        return $this;
    }

    public function getNewPassword(): ?string
    {
        return $this->newPassword;
    }

    public function setNewPassword(string $newPassword)
    {
        $this->newPassword = $newPassword;
        return $this;
    }
}