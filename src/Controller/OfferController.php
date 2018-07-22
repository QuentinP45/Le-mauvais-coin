<?php

namespace App\Controller;

use App\Entity\Offer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Offer controller
 * @Route("offer")
 */
class OfferController extends Controller
{
    /**
     * @Route("/list-user", name="index_offers_user")
     * @Method("GET")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $offers = $em->getRepository(Offer::class)->findAll();

        return $this->render('user/index.html.twig', [
            'offers' => $offers,
        ]);
    }
}
