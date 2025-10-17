<?php

namespace App\Form;

use App\Entity\GardenMohamedKhalilBenEzzine;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddEditGardenMohamedKhalilBenEzzineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('location')
            ->add('status')
            ->add('visitDate', DateType::class, [  // ← CHANGEMENT ICI
                'widget' => 'single_text',
                'html5' => true,
            ])
            ->add('Submit', SubmitType::class, [
                'label' => 'Save Garden',
                'attr' => ['style' => 'background-color: lightblue;']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GardenMohamedKhalilBenEzzine::class,
        ]);
    }
}
