<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Estudiante;
use AppBundle\Form\EstudianteType;

class EstudianteController extends Controller
{
    /**
     * @Route("/administracion/estudiante", name="administracion_estudiante")
     */
    public function nuevoAction(Request $request)
    {
        $estudiante = new Estudiante();
        $form=$this->createForm(EstudianteType::class,$estudiante);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estudiante);
            $em->flush();
            return new Response('<html><body>Estado: '.'Estudiante grabado'.'</body></html>');
        }
        
        return $this->render('estudiante/estudiante.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administracion/estu", name="admin_estu")
     */
    public function profeAction()
    {
        return new Response('<h1>Estado: '.'Estu cargando pantalla'.'</h1>');
    }
}

