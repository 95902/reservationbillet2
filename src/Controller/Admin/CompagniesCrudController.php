<?php

namespace App\Controller\Admin;

use App\Entity\Compagnies;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CompagniesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compagnies::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            ImageField::new('image')->setBasePath('/assets/upload/compagnie/')
            ->setUploadDir('/public/assets/upload/compagnie/')
            ->setUploadedFileNamePattern('[randomhash]')
            ->setRequired(false)
           
        ];
    }
    
}
