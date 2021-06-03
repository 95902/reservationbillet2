<?php

namespace App\Form;

use App\Entity\Destinations;
use App\Entity\Hotels;
use App\Entity\TypeVols;
use App\Entity\Voitures;
use PhpParser\Node\Name;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchVoyageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('destination', EntityType::class, [
                'class'=> Destinations ::class,
                'label'=> false,
                'required'=> true,
                'multiple'=> true,
                'attr'=>[
                    'class'=>'js-destination-multiple'
                    ]
            ])
            
            ->add('minprix', IntegerType :: class,[
                'label'=> false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>'min...'
                ]
            ])

            ->add('maxprix', IntegerType :: class,[
                'label'=> false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>'max...'
                ]
            ])
            ->add('tag', TextType::class,[
                'label'=> false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>'tags...'
                ]
            ])
            ->add('duree', IntegerType :: class,[
                'label'=> false,
                'required'=> false,
                'attr'=>[
                    'placeholder'=>'duree...'
                ]
            ])
            ->add('type_vole', EntityType::class,[
                'class'=> TypeVols ::class,
                'label'=> false,
                'required'=> false,
                'multiple'=> true,
                'attr'=>[
                    'class'=>'js-type_vole-multiple'
                    ]
            ])
            ->add('type_vehicule', EntityType::class,[
                'class'=> Voitures ::class,
                'label'=> false,
                'required'=> false,
                'multiple'=> true,
                'attr'=>[
                    'class'=>'js-type_vehicule-multiple'
                    ]
            ])


            // ->add('all_incluse', EntityType::class,[
            //     'class'=> Hotels ::class,
            //     'label'=> false,
            //     'required'=> false,
            //     'attr'=>[
            //         'class'=>'js-all_incluse-multiple'
            //         ]
            // ])
        ;    
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
