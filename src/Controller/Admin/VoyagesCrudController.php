<?php

namespace App\Controller\Admin;

use App\Entity\Voyages;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class VoyagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Voyages::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
            TextEditorField::new('description'),
            IntegerField::new('duree'),
            TextField::new('tags'),
            IntegerField::new('quantite'),
            MoneyField::new('prix')->setCurrency('USD'),
            BooleanField::new('isSpecialOffert'),
            AssociationField::new('destnation'),
            AssociationField::new('hotel'),
            AssociationField::new('voiture_loc'),
            ImageField::new('image')->setBasePath('/assets/upload/voyages/')
                                    ->setUploadDir('/public/assets/upload/voyages/')
                                    ->setUploadedFileNamePattern('[randomhash]')
                                    ->setRequired(false)
                                   
        ];
    }
    
}
