<?php

namespace App\Form;

use App\Entity\Vols;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VolsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name',EntityType::class, array(
            'class'=> 'App\Entity\Vols',
            'choice_label'=>'name'
        ))
            ->add('Ville_depart')
            ->add('ville_Arrive')
          /*   ->add('compagny', EntityType::class, array(
                'class' => 'App\Entity\Vols',
                'choice_label'=>'compagny'
             )) */;
            
           
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vols::class,
        ]);
    }
}
