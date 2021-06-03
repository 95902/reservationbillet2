<?php

namespace App\Controller\Admin;

use App\Entity\Voitures;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VoituresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Voitures::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('type'),
            BooleanField::new('IsClim'),
            BooleanField::new('isAuto'),
            BooleanField::new('isManuel'),
            BooleanField::new('isBagage'),
            ImageField::new('image')->setBasePath('/assets/upload/voitures/')
                                    ->setUploadDir('/public/assets/upload/voitures/')
                                    ->setUploadedFileNamePattern('[randomhash].[extend]')
                                    ->setRequired(false)
            
        ]; 
    }
    
}
