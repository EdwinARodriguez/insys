<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */

    public function loginAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('@App/Login/login.html.twig');
    }

}
