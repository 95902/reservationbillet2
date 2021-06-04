<?php

namespace App\Controller\Admin;

use App\Entity\AgenceLocationVoitures;
use App\Entity\Cart;
use App\Entity\Compagnies;
use App\Entity\Destinations;
use App\Entity\Hotels;
use App\Entity\Order;
use App\Entity\TypeVols;
use App\Entity\Voitures;
use App\Entity\Vols;
use App\Entity\Voyages;
use App\Entity\User;
use App\Entity\HomeSlider;
use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // return parent::index();

        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(OrderCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Reservationbillet');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Voyage', 'fas fa-list', Voyages::class);
        yield MenuItem::linkToCrud('Vols', 'fas fa-list', Vols::class);
        yield MenuItem::linkToCrud('Voitures', 'fas fa-truck', Voitures::class);
        yield MenuItem::linkToCrud('Type vols', 'fas fa-list', TypeVols::class);
        yield MenuItem::linkToCrud('Hotels', 'fas fa-list', Hotels::class);
        yield MenuItem::linkToCrud('Destinations', 'fas fa-list', Destinations::class);
        yield MenuItem::linkToCrud('Compagnies', 'fas fa-list', Compagnies::class);
        yield MenuItem::linkToCrud('Ag location', 'fas fa-list', AgenceLocationVoitures::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Sliders', 'fas fa-images', HomeSlider::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-images', Contact::class);

        yield MenuItem::linkToCrud('Facture', 'fas fa-shopping-bag', Order::class);
        yield MenuItem::linkToCrud('Panier', 'fas fa-boxes', Cart::class);
        
    }
}
