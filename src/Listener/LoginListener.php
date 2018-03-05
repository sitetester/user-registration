<?php

namespace App\Listener;

use App\Entity\LoginHistory;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event):void
    {
        /** @var User $user */
        $user = $event->getAuthenticationToken()->getUser();
        $dbUser = $this->entityManager->getRepository(User::class)->find($user->getId());

        $loginHistory = new LoginHistory();
        $loginHistory->setLoginDate((new \DateTime())->format('Y-m-d H:i:s'));
        $loginHistory->setUser($dbUser);

        $this->entityManager->persist($loginHistory);
        $this->entityManager->flush();
    }

}