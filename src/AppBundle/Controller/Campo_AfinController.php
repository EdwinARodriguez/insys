<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Campo_afin;
use AppBundle\Form\Campo_afinType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class Campo_AfinController extends Controller
{
    /**
     * @Route("/ver_campoafin", name="ver_campoafin")
     */
    public function ver_campoafin(Request $request)
    {
        $campoafin=$this->getDoctrine()->getRepository(Campo_afin::class)->findAll();

        // replace this example code with whatever you need
        return $this->render('@App/Tasks/ver_campoafin.html.twig',['lista_datos'=>$campoafin]);
    }

    /**
     * @Route("/insertar_campoafin", name="insertar_campoafin")
     */

    public function insertar_campo_afin(Request $request)
    {
        $campoafin = new Campo_afin();
        $form = $this->createForm(Campo_afinType::class,$campoafin);
        $form -> handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($campoafin);
            $em->flush();

            return $this->redirectToRoute('ver_campoafin');
        }

        // replace this example code with whatever you need
        return $this->render('@App/Tasks/registro_campoafin.html.twig', array("form" => $form -> createView()));
    }

    /**
     * @Route("/editar_campoafin/{id}/edit", name="editar_campoafin")
     */

    public function editar_campo_afin(Request $request, Campo_afin $id)
    {
        $form = $this->createForm(Campo_afinType::class, $id);
        $form -> handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('ver_campoafin');
        }

        // replace this example code with whatever you need
        return $this->render('@App/Tasks/registro_campoafin.html.twig', [
            'form' => $form -> createView()
        ]);
    }

    /**
     * @Route("/eliminar_campoafin/{id}/delete", name="eliminar_campoafin")
     */

    public function eliminar_campo_afin(Request $request, Campo_afin $id)
    {

            $em = $this->getDoctrine()->getManager();
            $em->remove($id);
            $em->flush();

            return $this->redirectToRoute('ver_campoafin');
    }

    /**
     * @Route("/rest/campoafin", name="campoafin", methods={"POST"})
     */

    public function getAllCampoAfin(Request $request)
    {
        $data = $request->getContent();
        $data = json_decode($data, true);

        $campoAfin = new Campo_afin();
        //$campoAfin -> setNombre($data["nombre"]);

        $form = $this->createForm(Campo_afinType::class, $campoAfin);
        $form->submit($data);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($campoAfin);
            $em->flush();
        } else{
            return new JsonResponse(null,400);
        }



        $campoAfin = $this->get('serializer')->serialize($campoAfin, 'json');

        $dataJson = json_decode($campoAfin, true);
        return new JsonResponse($dataJson);

        //dump($request -> getContent());
        //die;
       /* $campoAfin = $this->getDoctrine()
            ->getRepository(Campo_afin::class)
            ->findAll();
        $campoAfin = $this->get('serializer')->serialize($campoAfin, 'json');

        $dataJson = json_decode($campoAfin, true);
        return new JsonResponse($dataJson); */
    }
/*
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
//    }*/

}
