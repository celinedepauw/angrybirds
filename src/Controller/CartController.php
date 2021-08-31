<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart/add", name="cart_add")
     */
    public function add(Request $request, SessionInterface $session): Response
    {
       // get the bird id 
       $id = $request->request->get('id'); // $_POST['id]
       
       // to put it in cart in the session
       // 1. get the cart in session, cart is an array
       $cart = $session->get('cart', []);

       // 2. add the bird id in the array cart
       $cart[] = $id;
        
       // 3. get the cart again in session
       $session->set('cart', $cart);

       // dd($session->all()); // dump($_SESSION);

       // redirect to home page
       return $this->redirectToRoute(('cart_list'));

    }

    /**
     * @Route("/cart", name="cart_list")
     */

     public function list(SessionInterface $session)
     {
         dd($session->get('cart', []));
     }
}
