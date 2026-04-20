<?php

namespace App\Form;

use App\Entity\Fiche;
use App\Entity\Reservation;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FicheType extends AbstractType
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

                    // If psychologue, only show patients with reservations with this psychologue
                    if ($isPsychologue && $user) {
                        $qb->innerJoin('App\Entity\Reservation', 'r', 'WITH', 'r.patient = u AND r.psychologue = :psy')
                            ->setParameter('psy', $user)
                            ->groupBy('u.id');
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
            ->add('reservation', EntityType::class, [
                'class' => Reservation::class,
                'label' => 'Réservation',
                'choice_label' => function (Reservation $res) {
                    return 'Réservation #' . $res->getId() . ' - ' . $res->getDatePrevue()->format('d/m/Y H:i');
                },
                'choice_attr' => function (Reservation $res) {
                    return [
                        'data-patient-id' => $res->getPatient() ? $res->getPatient()->getId() : '',
                    ];
                },
                'query_builder' => function ($repo) use ($isPsychologue, $user) {
                    $qb = $repo->createQueryBuilder('r')
                        ->orderBy('r.datePrevue', 'DESC');

                    // If psychologue, only show their reservations
                    if ($isPsychologue && $user) {
                        $qb->where('r.psychologue = :psy')
                            ->setParameter('psy', $user);
                    }

                    return $qb;
                },
                'placeholder' => '— Sélectionner une réservation —',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('texteFiche')
            ->add('date')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fiche::class,
            'user' => null,
            'isPhychologue' => false,
        ]);
    }
}

