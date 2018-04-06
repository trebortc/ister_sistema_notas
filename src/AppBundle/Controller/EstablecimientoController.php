<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Asignatura;
use AppBundle\Entity\Aula;
use AppBundle\Entity\Carrera;
use AppBundle\Form\AsignaturaType;
use AppBundle\Form\AulaType;
use AppBundle\Form\CarreraType;


class EstablecimientoController extends Controller
{    
    /**
     * @Route("/establecimiento/asignatura", name="establecimiento_asignatura")
     */
    public function asignaturaAction(Request $request)
    {
        $asignatura = new Asignatura();
        $form = $this->createForm(AsignaturaType::class,$asignatura);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignatura);
            $em->flush();
            return new Response('<html><body>Estado: '.'Asignatura grabada'.'</body></html>');
        }
        return $this->render('establecimiento/asignatura.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/establecimiento/aula", name="establecimiento_aula")
     */
    public function aulaAction(Request $request)
    {
        $aula = new Aula();
        $form = $this->createForm(AulaType::class,$aula);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aula);
            $em->flush();
            return new Response('<html><body>Estado: '.'Aula grabada'.'</body></html>');
        }
        return $this->render('establecimiento/aula.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/establecimiento/carrera", name="establecimiento_carrera")
     */
    public function carreraAction(Request $request)
    {
        $carrera = new Carrera();
        $form = $this->createForm(CarreraType::class,$carrera);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carrera);
            $em->flush();
            return new Response('<html><body>Estado: '.'Carrera grabada'.'</body></html>');
        }
        return $this->render('establecimiento/carrera.html.twig',array('form' => $form->createView()));
    }
    
}
    
