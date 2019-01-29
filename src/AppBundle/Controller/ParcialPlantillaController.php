<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\ParcialPlantilla;
use AppBundle\Form\ParcialPlantillaType;

class ParcialPlantillaController extends Controller
{
    /**
     * @Route("parcial_plantilla/inicio", name="parcial_plantilla_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $parcialPlantillas = $em->getRepository(ParcialPlantilla::class)->findAll();
        return $this->render('parcialPlantilla/inicio.html.twig', array('parcialPlantillas' => $parcialPlantillas,));
    }
    
    /**
     * @Route("parcial_plantilla/nuevo", name="parcial_plantilla_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $parcialPlantilla = new ParcialPlantilla();
        $form = $this->createForm(ParcialPlantillaType::class,$parcialPlantilla);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcialPlantilla);
            $em->flush();
            return $this->redirect($this->generateUrl('parcial_plantilla_inicio'));
        }
        return $this->render('parcialPlantilla/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("parcial_plantilla/listar", name="parcial_plantilla_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $parcialPlantillas = $em->getRepository(ParcialPlantilla::class)->findAll();
        return $this->render('parcialPlantilla/listar.html.twig', array('parcialPlantillas' => $parcialPlantillas,));
    }
    
    /**
     * @Route("parcial_plantilla/editar/{id}", name="parcial_plantilla_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $parcialPlantilla = $em->getRepository(ParcialPlantilla::class)->find($id);
        $form = $this->createForm(ParcialPlantillaType::class,$parcialPlantilla);
        $form->handleRequest($request);
        
        if (!$parcialPlantilla){
            throw $this->createNotFoundException('No se encuentra la plantilla parcial.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($parcialPlantilla);
            return $this->redirect($this->generateUrl('parcial_plantilla_inicio'));
        }
        
        return $this->render('parcialPlantilla/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("parcial_plantilla/eliminar/{id}", name="parcial_plantilla_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $parcialPlantilla = $em->getRepository(ParcialPlantilla::class)->find($id);
        if(!$parcialPlantilla)
        {
            throw $this->createNotFoundException("No se encuentra la plantilla parcial.");
        }
        else{
            $em->remove($parcialPlantilla);
            $em->flush();
            return $this->redirect($this->generateUrl('parcial_plantilla_inicio'));
        }
        
    }
    
    
}