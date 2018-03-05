<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        // redirect to /login, if not logged in already
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->redirectToRoute('dashboard');
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $loggedInUser = $this->getUser();
        if ($loggedInUser !== null) {
            return $this->redirectToRoute('dashboard');
        }

        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

}