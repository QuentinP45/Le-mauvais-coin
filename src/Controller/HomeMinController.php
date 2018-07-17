<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 13/07/18
 * Time: 11:07
 */

namespace App\Controller;

use App\Entity\Offer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeMinController extends AbstractController
{
    /**
     * @Route("/accueil")
     */
    public function home()
    {
        $em = $this->getDoctrine()->getManager()
            ->getRepository(Offer::class)->findLastOffers();

        return $this->render('homeMin/home.html.twig', [
            'em' => $em
        ]);
    }
}