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
     * @Route("/administrador/carrera/inicio", name="carrera_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $carreras = $em->getRepository(Carrera::class)->findAll();
        return $this->render('carrera/inicio.html.twig', array('carreras' => $carreras,));
    }
    
    /**
     * @Route("/administrador/carrera/nuevo", name="carrera_nuevo")
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
            return $this->redirect($this->generateUrl('carrera_inicio'));
        }
        
        return $this->render('carrera/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/carrera/listar", name="carrera_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager()->getRepository(Carrera::class);
        $carreras = $em->findAll();
        return $this->render('carrera/listar.html.twig', array('carreras' => $carreras,));
    }
    
    
    /**
     * @Route("/administrador/carrera/editar/{id}", name="carrera_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $carrera = $em->getRepository(Carrera::class)->find($id);
        $form = $this->createForm(CarreraType::class,$carrera);
        $form->handleRequest($request);
        
        if (!$carrera){
            throw $this->createNotFoundException('No se encuentra la carrera.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($carrera);
            return $this->redirect($this->generateUrl('carrera_inicio'));
        }
        
        return $this->render('carrera/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/carrera/eliminar/{id}", name="carrera_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $carrera = $em->getRepository(Carrera::class)->find($id);
        if(!$carrera)
        {
            throw $this->createNotFoundException("No se encuentra la carrera");
        }
        else{
            $em->remove($carrera);
            $em->flush();
            return $this->redirect($this->generateUrl('carrera_inicio'));
        }
        
    }
}