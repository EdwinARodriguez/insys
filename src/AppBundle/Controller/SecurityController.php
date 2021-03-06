<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use AppBundle\Form\UsuarioType;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        if ($this->getUser()!=null){
            return $this->redirectToRoute("homepage");
        }
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('@App/Security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));

    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        // return $this->redirectToRoute('login');
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class,$usuario);
        $form -> handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $password = $userPasswordEncoder -> encodePassword($usuario, $usuario->getPassword());

            $usuario -> setPassword($password);
            $usuario -> setHabilitado(true);

            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('login');
        }

        return $this->render('@App/Security/register.html.twig', array("form" => $form -> createView()));
    }
}