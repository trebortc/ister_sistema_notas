<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Carrera;
use AppBundle\Form\CarreraType;

class CarreraController extends Controller
{
    /**
     * @Route("/carrera/nuevo", name="carrera_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $carrera = new Carrera();
        $form=$this->createForm(CarreraType::class,$carrera);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carrera);
            $em->flush();
            return new Response('<html><body>Estado: '.'Carrera grabado'.'</body></html>');
        }
        
        return $this->render('carrera/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/carrera/listar", name="carrera_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager()->getRepository(Carrera::class);
        $carreras = $em->findAll();
        return $this->render('carrera/listar.html.twig', array('carreras' => $carreras,));
    }
}