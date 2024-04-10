<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;

class UserController extends AbstractController
{

    #[Route('/private-liste-user', name: 'user')]
    public function listeUsers(EntityManagerInterface $entityManagerInterface): Response
    {
        $repoUser = $entityManagerInterface->getRepository(User::class);
        $users = $repoUser->findAll();
        $numberOfUsers = $uRepository->countUsers();
        return $this->render('base/usersliste.html.twig', [
           'users' => $users,
           'nombreUtilisateurs' => $numberOfUsers
        ]);
    }

    
}