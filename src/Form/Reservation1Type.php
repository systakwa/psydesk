<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Reservation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isPsychologue = $options['isPhychologue'] ?? false;
        $user = $options['user'] ?? null;

        $builder
            ->add('patient', EntityType::class, [
                'class' => Users::class,
                'label' => 'Patient',
                'choice_label' => function (Users $userObj) {
                    return $userObj->getPrenom() . ' ' . $userObj->getNom() . ' (' . $userObj->getEmail() . ')';
                },
                'query_builder' => function ($repo) use ($isPsychologue, $user) {
                    $qb = $repo->createQueryBuilder('u')
                        ->where("JSON_CONTAINS(u.role, :role) = 1")
                        ->setParameter('role', '"ROLE_PATIENT"')
                        ->orderBy('u.nom', 'ASC');

                    // If psychologue, only show their patients
                    if ($isPsychologue && $user) {
                        $qb->innerJoin('App\Entity\Reservation', 'r', 'WITH', 'r.patient = u AND r.psychologue = :psy')
                            ->setParameter('psy', $user);
                    }

                    return $qb;
                },
                'placeholder' => '— Sélectionner un patient —',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('psychologue', EntityType::class, [
                'class' => Users::class,
                'label' => 'Psychologue',
                'choice_label' => function (Users $userObj) {
                    return $userObj->getPrenom() . ' ' . $userObj->getNom() . ' (' . $userObj->getEmail() . ')';
                },
                'query_builder' => function ($repo) {
                    return $repo->createQueryBuilder('u')
                        ->where("JSON_CONTAINS(u.role, :role) = 1")
                        ->setParameter('role', '"ROLE_PSYCHOLOGUE"')
                        ->orderBy('u.nom', 'ASC');
                },
                'placeholder' => '— Sélectionner un psychologue —',
                'attr' => ['class' => 'form-control'],
                'disabled' => $isPsychologue,
            ])
            ->add('datePrevue', DateTimeType::class, [
                'label' => 'Date/Heure Prévue',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control', 'type' => 'datetime-local'],
            ])
            ->add('dateDispo', DateTimeType::class, [
                'label' => 'Date/Heure Disponibilité',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control', 'type' => 'datetime-local'],
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Statut',
                'choices' => [
                    'En attente' => 'en attente',
                    'Confirmé' => 'confirmé',
                    'Annulé' => 'annulé',
                ],
                'attr' => ['class' => 'form-control form-select'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            'user' => null,
            'isPhychologue' => false,
        ]);
    }
}

