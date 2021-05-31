<?php

namespace App\Controller\Admin;

use App\Entity\Vols;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class VolsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vols::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('Ville_depart'),
            AssociationField::new('ville_Arrive'),
            AssociationField::new('compagny'),
            AssociationField::new('type_vol'),
          
        ];
    }
    
}
