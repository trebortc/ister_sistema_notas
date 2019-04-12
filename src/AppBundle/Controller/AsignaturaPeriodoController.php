<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\AsignaturaType;
use AppBundle\Entity\AsignaturaPeriodo;
use AppBundle\Form\AsignaturaPeriodoType;

class AsignaturaPeriodoController extends Controller
{
        
    /**
     * @Route("/administrador/asignatura_periodo/inicio", name="asignatura_periodo_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $asignaturasPeriodo = $em->getRepository(AsignaturaPeriodo::class)->findAll();
        return $this->render('asignaturaPeriodo/inicio.html.twig', array('asignaturasperiodo' => $asignaturasPeriodo,));
    }
    
    /**
     * @Route("/administrador/asignatura_periodo/nuevo", name="asignatura_periodo_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $asignaturaPeriodo = new AsignaturaPeriodo();
        $form = $this->createForm(AsignaturaPeriodoType::class, $asignaturaPeriodo);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignaturaPeriodo);
            $em->flush();
            return $this->redirect($this->generateUrl('asignatura_periodo_inicio'));
        }
        return $this->render('asignaturaPeriodo/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/asignatura_periodo/listar", name="asignatura_periodo_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $asignaturasPeriodo = $em->getRepository(AsignaturaPeriodo::class)->findAll();
        return $this->render('asignaturaPeriodo/listar.html.twig', array('asignaturasPeriodo' => $asignaturasPeriodo,));
    }
    
    /**
     * @Route("/administrador/asignatura_periodo/editar/{id}", name="asignatura_periodo_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $asignaturaPeriodo = $em->getRepository(AsignaturaPeriodo::class)->find($id);
        $form = $this->createForm(AsignaturaPeriodoType::class, $asignaturaPeriodo);
        $form->handleRequest($request);
        
        if (!$asignaturaPeriodo){
            throw $this->createNotFoundException('No se encuentra la asignatura periodo.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($asignaturaPeriodo);
            return $this->redirect($this->generateUrl('asignatura_periodo_inicio'));
        }
        
        return $this->render('asignaturaPeriodo/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/asignatura_periodo/eliminar/{id}", name="asignatura_periodo_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $asignaturaPeriodo = $em->getRepository(AsignaturaPeriodo::class)->find($id);
        if(!$asignaturaPeriodo)
        {
            throw $this->createNotFoundException("No se encuentra la asignatura periodo");
        }
        else{
            $em->remove($asignaturaPeriodo);
            $em->flush();
            return $this->redirect($this->generateUrl('asignatura_periodo_inicio'));
        }
        
    }
    
}

