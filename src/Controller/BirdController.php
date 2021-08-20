<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class BirdController
{
    public function home()
    {
        return new Response('Home page');
    }
}