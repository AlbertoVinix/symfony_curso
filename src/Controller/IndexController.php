<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\MarcadorRepository;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="app_index")
     */
    public function index(MarcadorRepository $marcadorRepository): Response
    {
        $marcadores = $marcadorRepository->findAll();
        return $this->render('index/index.html.twig', [
            'marcadores' => $marcadores,
        ]);
    }
}
