<?php

namespace App\Controller\Admin;

use App\Entity\AgenceLocationVoitures;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AgenceLocationVoituresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AgenceLocationVoitures::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('description'),
            MoneyField::new('prix_jours')->setCurrency('USD'),
            AssociationField::new('voiture'),
            AssociationField::new('Pays'),
            ImageField::new('image')->setBasePath('/assets/upload/agencevoiture/')
            ->setUploadDir('/public/assets/upload/agencevoiture/')
            ->setUploadedFileNamePattern('[randomhash]')
            ->setRequired(false)
        ];
    }
    
}
