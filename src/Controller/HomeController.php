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
     * @Route("/home", name="index")
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
     * @Route("/home-user", name="user")
     */
    public function homeUserAction()
    {
        return $this->render('user/home.html.twig');
    }
}