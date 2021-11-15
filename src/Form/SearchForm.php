<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Cimetiere;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenoms', TextType::class, [
                'label'=> 'Prénoms :',
                'required'=> false,
                'attr'=> [
                    'placeholder' => 'Prénoms'
                ]
            ])
            ->add( 'nomFam', TextType::class,[
                'label' => 'Nom de famille :',
                'required'=> false,
                'attr'=>[
                    'placeholder' => 'Nom de famille'
                ]
            ])

            ->add('nomUsa', TextType::class, [
                'label' => 'Nom d\'usage :',
                'required' =>false,
                'attr'=>[
                    'placeholder' => 'Nom d\'usage'
                ]
            ])

            ->add('birth',DateType::class,[
                'label'=>'Date de naissance :',
                'required' =>false,
                'widget'=>'single_text'
            ])

            ->add('cimetieres', EntityType::class, [
                'label'=> 'Cimetieres :',
                'required' => false,
                'class' => Cimetiere::class,
                'expanded' => true,
                'multiple' => true
            ])

        ;
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'=> SearchData::class,
            'method'=> 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }

}