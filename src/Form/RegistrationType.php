<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Country;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class RegistrationType extends AbstractType
{
    private $entityManager;
    private $userLoggedIn;

    public function __construct(EntityManagerInterface $entityManager, AuthorizationCheckerInterface $authorizationChecker)
    {
        $this->entityManager = $entityManager;
        $this->userLoggedIn = $authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY');
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first')
            ->add('last')
        ;

        // not allowed to update email in EDIT mode
        if (!$this->userLoggedIn) {
            $builder->add('email');
        }

        if (!$this->userLoggedIn) {
            $builder->add('password', RepeatedType::class,
                [
                    'type' => PasswordType::class,
                    'invalid_message' => 'The password fields must match.',
                    'options' => ['attr' => ['class' => 'password-field']],
                    'required' => true,
                    'first_options' => ['label' => 'Password'],
                    'second_options' => ['label' => 'Repeat Password'],
                ]
            );
        }

        $builder
            ->add('country', EntityType::class,
                [
                    'class' => Country::class,
                    'query_builder' => function (EntityRepository $er) {
                        return $er
                            ->createQueryBuilder('c')
                            ->orderBy('c.name', 'ASC')
                            ;
                    },
                    'placeholder' => false,
                    'choice_label' => 'name',
                    'attr' => [
                        'class' => 'input'
                    ],
                ]
            );

        $formModifier = function (FormInterface $form, Country $country = null) {

            $cities = [];
            if ($country !== null) {
                $cities = $this->entityManager->getRepository(City::class)->findByCountryCode($country->getId());
            }

            $form->add('city', EntityType::class, [
                'class' => City::class,
                'choices' => $cities,
                'placeholder' => false,
                'attr' => [
                    'class' => 'input'
                ],
            ]);

            if ($this->userLoggedIn) {
                $form->add('Update', SubmitType::class, [
                    'attr' => [
                        'class' => 'button'
                    ],
                ]);
            } else {
                $form->add('Register', SubmitType::class, [
                    'attr' => [
                        'class' => 'button'
                    ],
                ]);
            }
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. User

                /** @var User $user */
                $user = $event->getData();
                $formModifier($event->getForm(), $user->getCountry());
            }
        );

        $builder->get('country')->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) use ($formModifier) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                $country = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                $formModifier($event->getForm()->getParent(), $country);
            }
        )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults(
            [
                'data_class' => User::class,
            ]
        );
    }

}