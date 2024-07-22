<?php

namespace App\Controller\Front;

use App\DTO\ContactDTO;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/Front/contact', name: 'front_contact_')]
class ContactController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, MailerInterface $mailer)
    {
        $contact = new ContactDTO();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Envoie du formulaire
            $email = new Email();
            $email->from($contact->getMail());
            $email->to($contact->getService())
                ->text($contact->getMessage())
                // Ajouter une propriété  service dans la class

                // Avoir une liste déroulante 
                //directeur=> 'cto@company.com'
                //comptabilité=> 'compta@company.com'
                //support=>'support@company.com'
                ->subject('Un nouveau mail est envoyé');
            $mailer->send($email);
        }
        return $this->render('front/contact/index.html.twig', [
            'formulaire_contact' => $form
        ]);
    }
}
