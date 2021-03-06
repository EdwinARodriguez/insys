<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */

    public function indexAction(Request $request, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        //$usuario = new Usuario();
        //$usuario->setNombre("Eddy");
        //$usuario->setApellido("Rdguez");
        //$usuario->setEmail("eddy@gmail.com");
        //$usuario->setPassword($userPasswordEncoder->encodePassword($usuario,"123456"));

        //$usuario->setHabilitado(true);

        //$em = $this->getDoctrine()->getManager();
        //$em->persist($usuario);
        //$em->flush();

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/test/{id}", name="homepage2")
     */
//    public function index2Action(Request $request,Usuario $usuario)
//    {
//        // Llamando ver_usuario.html.twig ...
//        return $this->render('@App/Usuario/ver_usuario.html.twig',
//            [
//                "usuarios" => [$usuario]
//            ]);
//    }

}
