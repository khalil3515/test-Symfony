<?php

namespace App\Controller;

use App\Entity\GardenMohamedKhalilBenEzzine;
use App\Form\AddEditGardenMohamedKhalilBenEzzineType;
use App\Repository\GardenMohamedKhalilBenEzzineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GardenMohamedKhalilBenEzzineController extends AbstractController
{
    #[Route('/garden', name: 'app_garden')]
    public function index(): Response
    {
        return $this->render('garden/index.html.twig', [
            'controller_name' => 'GardenMohamedKhalilBenEzzineController',
        ]);
    }

    #[Route('/garden/list', name: 'app_garden_list')]
    public function gardenList(GardenMohamedKhalilBenEzzineRepository $gardenRepository): Response
    {
        return $this->render('garden/list.html.twig', [
            "gardens" => $gardenRepository->findAll()
        ]);
    }

    #[Route("/garden/details/{id}", name: "app_garden_details")]
    public function gardenDetails($id, GardenMohamedKhalilBenEzzineRepository $gardenRepository): Response
    {
        return $this->render('garden/details.html.twig', [
            "garden" => $gardenRepository->find($id)
        ]);
    }

    #[Route("/garden/create", name: "app_garden_create")]
    public function createGarden(Request $request, EntityManagerInterface $em): Response
    {
        $garden = new GardenMohamedKhalilBenEzzine();
        $form = $this->createForm(AddEditGardenMohamedKhalilBenEzzineType::class, $garden);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->persist($garden);
            $em->flush();
            return $this->redirectToRoute('app_garden_list');
        }
        return $this->render('garden/form.html.twig', [
            'title' => 'Create Garden',
            'form' => $form
        ]);
    }

    #[Route("/garden/update/{id}", name: "app_garden_update")]
    public function updateGarden($id, Request $request, GardenMohamedKhalilBenEzzineRepository $gardenRepository, EntityManagerInterface $em): Response
    {
        $garden = $gardenRepository->find($id);
        $form = $this->createForm(AddEditGardenMohamedKhalilBenEzzineType::class, $garden);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em->flush();
            return $this->redirectToRoute('app_garden_list');
        }
        return $this->render('garden/form.html.twig', [
            'title' => 'Update Garden',
            'form' => $form
        ]);
    }

    #[Route("/garden/delete/{id}", name: "app_garden_delete")]
    public function deleteGarden($id, ManagerRegistry $doctrine): Response
    {
        $gardenRepository = $doctrine->getRepository(GardenMohamedKhalilBenEzzine::class);
        $garden = $gardenRepository->find($id);
        $em = $doctrine->getManager();
        $em->remove($garden);
        $em->flush();
        return $this->redirectToRoute('app_garden_list');
    }
}
