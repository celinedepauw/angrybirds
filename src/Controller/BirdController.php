<?php

namespace App\Controller;

use App\Model\BirdModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class BirdController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET"})
     * To get a "service" (object) from the controller
     * we inject it in the method by its type (type-hinting)
     */
    public function home(BirdModel $birdModel)
    {
        // we get the birds list
        $birds = $birdModel->getBirds();

        // dump($birds);
        return $this->render('bird/home.html.twig', [
            'birds' => $birds
        ]);
    }

    /**
     * @Route("/bird/{id}", name="bird_show", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function show($id, BirdModel $birdModel)
    {
        $bird = $birdModel->getBird($id);

        // if the bird is not found
        if ($bird === null) {
            throw $this->createNotFoundException('Bird not found');
        }
        
        return $this->render('bird/show.html.twig', [
            'id' => $id,
            'bird' => $bird,
        ]);
    }

    /**
     * @Route("/download", name="download", methods={"GET"})
     */
    public function download()
    {
        //download pdf directly
        return $this->file('files/angry_birds_2015_calendar.pdf');

        // rename the file and display pdf in browser
        // return $this->file('files/angry_birds_2015_calendar.pdf',
        // 'user_calendar.pdf',
        // ResponseHeaderBag::DISPOSITION_INLINE
        // );
    }
}