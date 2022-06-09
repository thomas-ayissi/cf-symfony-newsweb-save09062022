<?php

namespace App\Controller;

use App\Entity\Thearticle;
use App\Form\ThearticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/thearticle')]
class ThearticleController extends AbstractController
{
    #[Route('/', name: 'app_thearticle_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $thearticles = $entityManager
            ->getRepository(Thearticle::class)
            ->findAll();

        return $this->render('thearticle/index.html.twig', [
            'thearticles' => $thearticles,
        ]);
    }

    #[Route('/new', name: 'app_thearticle_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $thearticle = new Thearticle();
        $form = $this->createForm(ThearticleType::class, $thearticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($thearticle);
            $entityManager->flush();

            return $this->redirectToRoute('app_thearticle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('thearticle/new.html.twig', [
            'thearticle' => $thearticle,
            'form' => $form,
        ]);
    }

    #[Route('/{idthearticle}', name: 'app_thearticle_show', methods: ['GET'])]
    public function show(Thearticle $thearticle): Response
    {
        return $this->render('thearticle/show.html.twig', [
            'thearticle' => $thearticle,
        ]);
    }

    #[Route('/{idthearticle}/edit', name: 'app_thearticle_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Thearticle $thearticle, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ThearticleType::class, $thearticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_thearticle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('thearticle/edit.html.twig', [
            'thearticle' => $thearticle,
            'form' => $form,
        ]);
    }

    #[Route('/{idthearticle}', name: 'app_thearticle_delete', methods: ['POST'])]
    public function delete(Request $request, Thearticle $thearticle, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$thearticle->getIdthearticle(), $request->request->get('_token'))) {
            $entityManager->remove($thearticle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_thearticle_index', [], Response::HTTP_SEE_OTHER);
    }
}
