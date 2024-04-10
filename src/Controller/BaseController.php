<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;


class BaseController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
            
        ]);
    }



    #[Route('/presentation', name: 'presentation')] 
    public function presentation(): Response 
    {
        return $this->render('base/presentation.html.twig', [
            
        ]);
    }

    #[Route('/equipement', name: 'equipement')] 
    public function equipement(): Response 
    {
        return $this->render('base/equipement.html.twig', [
            
        ]);
    }
    #[Route('/gestion', name: 'gestion')] 
    public function gestion(): Response 
    {
        return $this->render('base/gestioninfo.html.twig', [
            
        ]);
    }
    #[Route('/segmentation', name: 'segmentation')] 
    public function segmentation(): Response 
    {
        return $this->render('base/segmentationreseau.html.twig', [
            
        ]);
    }
    #[Route('/repartition', name: 'repartition')] 
    public function repartition(): Response 
    {
        return $this->render('base/repartitionreseau.html.twig', [
            
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, MailerInterface $mailer, EntityManagerInterface $entityManagerInterface): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){   
                $email = (new TemplatedEmail())
                ->from($contact->getEmail())
                ->to('melyna.queva@malrauxbethune.fr')
                ->subject($contact->getSujet())
                ->htmlTemplate('emails/email.html.twig')
                ->context([
                    'nom'=> $contact->getNom(),
                    'sujet'=> $contact->getSujet(),
                    'message'=> $contact->getMessage()
                ]);
                $contact->setDateEnvoi(new \Datetime());
                $entityManagerInterface->persist($contact);
                $entityManagerInterface->flush();
              
                $mailer->send($email);
                $this->addFlash('notice','Message envoyé');
                return $this->redirectToRoute('contact');
            }
        }

        return $this->render('base/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }

    
 
 
 
 
 
 
 

}

