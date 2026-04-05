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
            ->add('texteNote', TextareaType::class)
            ->add('date', DateType::class, ['widget' => 'single_text'])
            ->add('evaluation', CheckboxType::class, ['required' => false])
            ->add('satisfer', IntegerType::class)
            ->add('created_at', DateType::class, ['widget' => 'single_text'])
            ->add('idObjectif', EntityType::class, [
                'class' => Objectif::class,
                'choice_label' => 'id',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Notejour::class,
        ]);
    }
}