<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 13/07/18
 * Time: 11:07
 */

namespace App\Controller;

use App\Entity\Offer;
use App\Form\ResearchType;
use Symfony\Component\HttpFoundation\Request;
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
    public function homeUserAction(Request $request)
    {
        $offers = $this->getDoctrine()->getManager()
            ->getRepository(Offer::class)->findLastOffers();

        $search = $this->createForm(ResearchType::class);

        $search->handleRequest($request);

        if ($search->isSubmitted() && $search->isValid()) {
            $title = $search['search']->getData();
            $em = $this->getDoctrine();
            $searchOffers = $em->getRepository(Offer::class)->searchOffers($title);

            return $this->render('user/home.html.twig', [
                'search' => $search->createView(),
                'searchOffers' => $searchOffers,
            ]);
        }

        return $this->render('user/home.html.twig', [
            'offers' => $offers,
            'search' => $search->createView(),
        ]);

        /////////////////////////////////////////////////////

        $form = $this->createForm(ResearchType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form["research"]->getData();

            $foundRecipes = $this->getDoctrine()->getRepository(Recipe::class)->searchAction($search);

            return $this->render('home/index.html.twig', [
                'form' => $form->createView(),
                'foundRecipes' => $foundRecipes,
                'search' => $search,
            ]);
        }

        $lastRecipes = $this->getDoctrine()->getRepository(Recipe::class)->findLastRecipes();

        return $this->render('home/index.html.twig', [
            'lastRecipes' => $lastRecipes,
            'form' => $form->createView(),
        ]);

    }
}