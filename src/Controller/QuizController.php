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

class QuizController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function showRoot()
    {

        return $this->render('quizhome/index.html.twig', []);
    }
}
