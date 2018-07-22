<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OfferController extends Controller
{
    /**
     * @Route("/list-user", name="index_offers_user")
     */
    public function index()
    {
        return $this->render('user/index.html.twig', [

        ]);
    }
}
