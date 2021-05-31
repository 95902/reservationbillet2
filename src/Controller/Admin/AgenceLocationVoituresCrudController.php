<?php

namespace App\Controller\Admin;

use App\Entity\AgenceLocationVoitures;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AgenceLocationVoituresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AgenceLocationVoitures::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
