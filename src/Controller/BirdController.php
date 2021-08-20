<?php

namespace App\Controller;

use App\Model\BirdModel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BirdController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        // we get the birds list
        $birdModel = new BirdModel();
        $birds = $birdModel->getBirds();

        dump($birds);
        return new Response('Home page');
    }
}