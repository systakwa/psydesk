<?php

namespace App\Form;

use App\Entity\Reservation;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use App\Repository\UserRepository;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('date_prevue', DateTimeType::class, [
            'widget' => 'single_text'
        ])

        ->add('psychologue', EntityType::class, [
            'class' => User::class,
            'choice_label' => 'email', // shows name instead of id
            'label' => 'Psychologue',
            'query_builder' => function(UserRepository $repo){
                return $repo->createQueryBuilder('u')
                    ->where('u.roles LIKE :role')
                    ->setParameter('role', '%ROLE_PSYCHOLOGUE%');
            }
        ])

         ->add('date_dispo', DateTimeType::class, [
                'label' => 'Date disponible',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
        ]);

        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
