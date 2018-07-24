<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 23/07/18
 * Time: 20:10
 */

namespace App\Controller;

use App\Entity\Offer;
use App\Form\OfferType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserPlaceController extends AbstractController
{
    /**
     * @Route("/user-place", name="user_place")
     */
    public function userPlace(Request $request)
    {
        $user = $this->getUser();
        $userOffers = $this->getDoctrine()->getManager()
            ->getRepository(Offer::class)->findUserOffers($user);

        $offer = new Offer();
        $user = $this->getUser();
        $offer->setCreator($user);
        $form = $this->createForm(OfferType::class, $offer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offer);
            $em->flush();

            return $this->redirectToRoute('user_place', [
                'userOffers' => $userOffers,
                'form' => $form->createView(),
            ]);
        }

        return $this->render('user/userPlace.html.twig', [
            'userOffers' => $userOffers,
            'form' => $form->createView(),
        ]);
    }
}