<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordType;
use App\Form\Model\ChangePassword;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validation;

class UserController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard()
    {
        // redirect to /login, if not logged in already
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('user/dashboard.html.twig');
    }

    /**
     * This works for UPDATE REGISTRATION as well
     *
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();

        /** @var User $loggedInUser */
        $loggedInUser = $this->getUser();
        if ($loggedInUser !== null) {
            $user = $loggedInUser;
        }

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var User $user */
            $user = $form->getData();

            // encode password only for new sign up
            if ($loggedInUser === null) {
                $password = $passwordEncoder->encodePassword($user, $user->getPassword());
                $user->setPassword($password);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            if ($loggedInUser !== null) {
                $this->addFlash('notice', 'Account updated successfully!');

                return $this->redirectToRoute('dashboard');
            }

            $this->addFlash('notice', 'Account created successfully!');

            return $this->redirectToRoute('login');
        }

        return $this->render('user/register.html.twig',
            [
                'form' => $form->createView(),
                'userLoggedIn' => $loggedInUser !== null
            ]
        );
    }

    /**
     * @Route("/changePassword", name="changePassword")
     */
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // redirect to /login, if not logged in already
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var User $loggedInUser */
        $loggedInUser = $this->getUser();

        $changePassword = new ChangePassword();
        $form = $this->createForm(ChangePasswordType::class, $changePassword);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newPassword = $changePassword->getNewPassword();
            $loggedInUser->setPassword(
                $passwordEncoder->encodePassword($loggedInUser, $newPassword)
            );

            $this->getDoctrine()->getManager()->persist($loggedInUser);
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash('notice', 'Password changed successfully!');

            return $this->redirect($this->generateUrl('dashboard'));
        }

        return $this->render('user/changePassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/loginHistory", name="loginHistory")
     */
    public function loginHistory()
    {
        // redirect to /login, if not logged in already
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        /** @var User $user */
        $user = $this->getUser();

        return $this->render('user/loginHistory.html.twig', [
            'loginHistory' => $user->getLoginHistory()
        ]);
    }

}