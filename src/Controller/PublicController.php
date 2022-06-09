<?php

namespace App\Controller;

// pour gérer les articles
use App\Entity\Thearticle;
// pour utiliser Doctrine
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'app_public')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // 3 derniers articles
        $threeArticles = $entityManager->getRepository(Thearticle::class)->findBy(['thearticleactivate'=>1],['thearticledate'=>'DESC'],3);
        return $this->render('public/index.html.twig', [
            'articles' => $threeArticles,
        ]);
    }
}
