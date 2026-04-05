<?php

namespace App\Form;

use App\Entity\Notejour;
use App\Entity\Objectif;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NotejourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
{
    $builder
        ->add('texteNote', TextareaType::class, [
            'attr' => [
                'minlength' => 5,
                'maxlength' => 2000,
                'rows' => 5,
            ],
            'help' => 'Minimum 5 caractères',
        ])
        ->add('date', DateType::class, [
            'widget' => 'single_text',
            'html5' => true,
            'attr' => [
                'max' => (new \DateTime())->format('Y-m-d'), // pas de date future
            ],
        ])
        ->add('evaluation', CheckboxType::class, ['required' => false])
        ->add('satisfer', IntegerType::class, [
            'attr' => ['min' => 0, 'max' => 10],
            'help' => 'Valeur entre 0 et 10',
        ])
        
    ;
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Notejour::class,
        ]);
    }
}