<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 23/07/18
 * Time: 20:10
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserPlaceController extends AbstractController
{
    /**
     * @Route("/user-place", name="user_place")
     */
    public function userPlace()
    {
        return $this->render('user/userPlace.html.twig');
    }
}