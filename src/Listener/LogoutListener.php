<?php

namespace App\Listener;

use App\Entity\LoginHistory;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;

class LogoutListener implements LogoutHandlerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, ContainerInterface $container)
    {
        $this->entityManager = $entityManager;
    }

    public function logout(Request $Request, Response $Response, TokenInterface $token): void
    {
        /** @var User $user */
        $user = $token->getUser();

        /** @var LoginHistory $loginHistory */
        $loginHistory = $this->entityManager->getRepository(LoginHistory::class)->findUserLastLogin($user->getId());
        $loginHistory
            ->setUser($user)
            ->setLogoutDate(
                (new \DateTime())->format('Y-m-d H:i:s')
            )
        ;

        $this->entityManager->persist($loginHistory);
        $this->entityManager->flush();
    }

}