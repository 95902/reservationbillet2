<?php

namespace App\Controller\Admin;

use App\Entity\Hotels;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HotelsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hotels::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextField::new('description'),
            TextField::new('Addresse'),
            TextField::new('Maps'),
            TextField::new('prix'),
            MoneyField::new('prix_nuit')->setCurrency('USD'),
            AssociationField::new('destination'),
            BooleanField::new('isAllInclude'),
            BooleanField::new('isSpa'),
            BooleanField::new('isWifi'),
            BooleanField::new('isPiscine'),
            
        ];
    }
    
}
