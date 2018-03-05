<?php

namespace App\Listener;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class AuthenticationListener
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
        $dbUser->setLoginDate(
            (new \DateTime())->format('Y-m-d H:i:s')
        );

        $this->entityManager->persist($dbUser);
        $this->entityManager->flush();
    }

}