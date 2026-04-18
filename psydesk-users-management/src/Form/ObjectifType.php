<?php

namespace App\Form;

use App\Entity\Objectif;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ObjectifType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextType::class, [
                'attr' => ['maxlength' => 20],
            ])
            ->add('datefin', DateType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'attr' => ['min' => (new \DateTime())->format('Y-m-d')],
            ])
            ->add('status', CheckboxType::class, ['required' => false])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Objectif::class,
        ]);
    }
}