<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Profesor;
use AppBundle\Form\ProfesorType;

class ProfesorController extends Controller
{
    /**
     * @Route("/administracion/profesor", name="administracion_profesor")
     */
    public function profesorAction(Request $request)
    {
        $profesor = new Profesor();
        $form=$this->createForm(ProfesorType::class,$profesor);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($profesor);
            $em->flush();
            return new Response('<html><body>Estado: '.'Profesor grabado'.'</body></html>');
        }
        
        return $this->render('profesor/profesor.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administracion/profe", name="admin_profe")
     */
    public function profeAction()
    {
        return new Response('<h1>Estado: '.'Profe cargando pantalla'.'</h1>');
    }
}

