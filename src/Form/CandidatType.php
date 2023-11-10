<?php

namespace App\Form;

use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType as TypeDateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('type',ChoiceType::class, [
            'choices' => [
                'Technique N1' => "TechniqueN1",
                'Technique N2' => "TechniqueN2",
                'Ressouces Humaine' => "Ressouces Humaine",
            ],  
            'multiple' => false,
            'expanded' => true,
            'label' => 'type',
        ])
        ->add('Date', TypeDateType::class)
        ->add('Heure', TimeType::class)
        ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
