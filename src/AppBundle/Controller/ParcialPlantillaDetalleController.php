<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\ParcialPlantilla;
use AppBundle\Form\ParcialPlantillaDetalleType;
use AppBundle\Entity\ParcialPlantillaDetalle;

class ParcialPlantillaDetalleController extends Controller
{
    /**
     * @Route("parcial_plantilla_detalle/inicio", name="parcial_plantilla_detalle_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $parcialPlantillaDetalles = $em->getRepository(ParcialPlantillaDetalle::class)->findAll();
        return $this->render('parcialPlantillaDetalle/inicio.html.twig', array('parcialPlantillaDetalles' => $parcialPlantillaDetalles,));
    }
    
    /**
     * @Route("parcial_plantilla_detalle/nuevo", name="parcial_plantilla_detalle_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $parcialPlantillaDetalle = new ParcialPlantillaDetalle();
        $form = $this->createForm(ParcialPlantillaDetalleType::class,$parcialPlantillaDetalle);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcialPlantillaDetalle);
            $em->flush();
            return $this->redirect($this->generateUrl('parcial_plantilla_detalle_inicio'));
        }
        return $this->render('parcialPlantillaDetalle/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("parcial_plantilla_detalle/listar", name="parcial_plantilla_detalle_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $parcialPlantillaDetalles = $em->getRepository(ParcialPlantillaDetalle::class)->findAll();
        return $this->render('parcialPlantillaDetalle/listar.html.twig', array('parcialPlantillaDetalles' => $parcialPlantillaDetalles,));
    }
    
    /**
     * @Route("parcial_plantilla_detalle/editar/{id}", name="parcial_plantilla_detalle_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $parcialPlantillaDetalle = $em->getRepository(ParcialPlantilla::class)->find($id);
        $form = $this->createForm(ParcialPlantillaType::class,$parcialPlantillaDetalle);
        $form->handleRequest($request);
        
        if (!$parcialPlantillaDetalle){
            throw $this->createNotFoundException('No se encuentra la plantilla parcial detalle.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($parcialPlantillaDetalle);
            return $this->redirect($this->generateUrl('parcial_plantilla_detalle_inicio'));
        }
        
        return $this->render('parcialPlantillaDetalle/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("parcial_plantilla_detalle/eliminar/{id}", name="parcial_plantilla_detalle_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $parcialPlantillaDetalle = $em->getRepository(ParcialPlantillaDetalle::class)->find($id);
        if(!$parcialPlantilla)
        {
            throw $this->createNotFoundException("No se encuentra la plantilla parcial detalle.");
        }
        else{
            $em->remove($parcialPlantillaDetalle);
            $em->flush();
            return $this->redirect($this->generateUrl('parcial_plantilla_detalle_inicio'));
        }
        
    }
    
    
}