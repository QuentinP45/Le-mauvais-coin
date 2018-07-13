<?php
/**
 * Created by PhpStorm.
 * User: wilder19
 * Date: 13/07/18
 * Time: 11:07
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/accueil")
     */
    public function testWebpack()
    {
        return $this->render('home/testWebpack.html.twig');
    }
}