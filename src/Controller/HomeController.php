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
     * @Route("/", name="index")
     */
    public function home()
    {
        $offers = $this->getDoctrine()->getManager()
            ->getRepository(Offer::class)->findLastOffers();

        return $this->render('home/homeMin.html.twig', [
            'offers' => $offers
        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('admin/home.html.twig');
    }
}