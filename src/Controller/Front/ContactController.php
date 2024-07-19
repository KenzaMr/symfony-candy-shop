<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('Front/contact', name: 'front_contact')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index()
    {


        return $this->render('Front/contact/index.html.twig', [
            'formulaire_contact' => ''
        ]);
    }


}
