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


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home_anonymous")
     */
    public function homeAnonymousAction()
    {
        $offers = $this->getDoctrine()->getManager()
            ->getRepository(Offer::class)->findLastOffers();

        return $this->render('anonymous/home.html.twig', [
            'offers' => $offers
        ]);
    }

    /**
     * @Route("/home-user", name="home_user")
     */
    public function homeUserAction()
    {
        $offers = $this->getDoctrine()->getManager()
            ->getRepository(Offer::class)->findLastOffers();

        return $this->render('user/home.html.twig', [
            'offers' => $offers
        ]);
    }
}