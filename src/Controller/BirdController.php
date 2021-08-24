<?php

namespace App\Controller;

use App\Model\BirdModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BirdController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        // we get the birds list
        $birdModel = new BirdModel();
        $birds = $birdModel->getBirds();

        // dump($birds);
        return $this->render('bird/home.html.twig', [
            'birds' => $birds
        ]);
    }

    /**
     * @Route("/bird/{id}", name="bird_show")
     */
    public function show($id)
    {
        $birdModel = new BirdModel();
        $bird = $birdModel->getBird($id);

        // if the bird is not found
        if ($bird === null) {
            throw $this->createNotFoundException('Bird not found');
        }
        
        return $this->render('bird/show.html.twig', [
            'bird' => $bird,
        ]);
    }
}