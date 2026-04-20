<?php
namespace App\Form;

use App\Entity\Planning;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanningType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isPsychologue = $options['isPhychologue'] ?? false;

        $builder
            ->add('psychologue', EntityType::class, [
                'class' => Users::class,
                'label' => 'Psychologue',
                'choice_label' => function (Users $user) {
                    return $user->getPrenom() . ' ' . $user->getNom() . ' (' . $user->getEmail() . ')';
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
            ->add('jour', ChoiceType::class, [
                'label' => 'Jour de la semaine',
                'choices' => [
                    'Lundi'    => 'lundi',
                    'Mardi'    => 'mardi',
                    'Mercredi' => 'mercredi',
                    'Jeudi'    => 'jeudi',
                    'Vendredi' => 'vendredi',
                    'Samedi'   => 'samedi',
                    'Dimanche' => 'dimanche',
                ],
                'placeholder' => '— Choisir un jour —',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('heureDebut', TimeType::class, [
                'label' => 'Heure de début',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('heureFin', TimeType::class, [
                'label' => 'Heure de fin',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('pauseDebut', TimeType::class, [
                'label' => 'Début de pause (optionnel)',
                'widget' => 'single_text',
                'required' => false,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('pauseFin', TimeType::class, [
                'label' => 'Fin de pause (optionnel)',
                'widget' => 'single_text',
                'required' => false,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée des consultations (minutes)',
                'attr' => [
                    'class' => 'form-control',
                    'min' => 10,
                    'max' => 120,
                    'placeholder' => 'ex: 30',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Planning::class,
            'user' => null,
            'isPhychologue' => false,
        ]);
    }
}
