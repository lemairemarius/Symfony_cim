<?php

namespace App\Form;

use App\Entity\Utilisateurs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomFam_ut')
            ->add('nomUs_ut')
            ->add('pre_ut')
            ->add('dayBirth_ut')
            ->add('firstAdress_ut')
            ->add('compAdress_ut')
            ->add('city_ut')
            ->add('cp_ut')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('gestionnaires')
            ->add('possede')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateurs::class,
        ]);
    }
}
