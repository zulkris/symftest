<?php
/**
 * Created by PhpStorm.
 * User: zulkris
 * Date: 10/17/18
 * Time: 9:58 PM
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class RootController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function showRoot()
    {

        return $this->render('quiz/index.html.twig', []);
    }
}
