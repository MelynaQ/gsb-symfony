<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;

class UtilisateurController extends AbstractController
{
    #[Route('/private-utilisateur', name: 'utilisateur')]
public function uti(UtilisateurRepository $utilisateurRepository, EntityManagerInterface $entityManagerInterface,): Response
    { 
        $utilisateurs = $utilisateurRepository->findAll();

        return $this->render('utilisateur.html.twig', [
            
            'utilisateurs' => $utilisateurs
        ]);
    }

    #[Route('/private-uti/{id}', name: 'utiparid')]
public function show($id, UtilisateurRepository $utilisateurRepository): Response
    {
        $uti = $utilisateurRepository->find($id);

        return $this->render('utiparid.html.twig', [
            'uti' => $uti
        ]);
    }

}