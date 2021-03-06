<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{

    /**
     * @Route("/admin", methods={"GET"}, name="admin_home")
     */
    public function showAction()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'TestController'
        ]);
    }


}
