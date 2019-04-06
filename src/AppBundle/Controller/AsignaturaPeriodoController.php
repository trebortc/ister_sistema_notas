<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\AsignaturaType;
use AppBundle\Entity\AsignaturaPeriodo;

class AsignaturaPeriodoController extends Controller
{
        
    /**
     * @Route("/administrador/asignatura_periodo/inicio", name="asignatura_periodo_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $asignaturas = $em->getRepository(AsignaturaPeriodo::class)->findAll();
        return $this->render('asignatura/inicio.html.twig', array('asignaturas' => $asignaturas,));
    }
    
    /**
     * @Route("/administrador/asignatura_periodo/nuevo", name="asignatura_periodo_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $asignatura = new Asignatura();
        $form = $this->createForm(AsignaturaType::class,$asignatura);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignatura);
            $em->flush();
            return $this->redirect($this->generateUrl('asignatura_inicio'));
        }
        return $this->render('asignatura/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/asignatura_periodo/listar", name="asignatura_periodo_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $asignaturas = $em->getRepository(Asignatura::class)->findAll();
        return $this->render('asignatura/listar.html.twig', array('asignaturas' => $asignaturas,));
    }
    
    /**
     * @Route("/administrador/asignatura_periodo/editar/{id}", name="asignatura_periodo_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $asignatura = $em->getRepository(Asignatura::class)->find($id);
        $form = $this->createForm(AsignaturaType::class,$asignatura);
        $form->handleRequest($request);
        
        if (!$asignatura){
            throw $this->createNotFoundException('No se encuentra la asignatura.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($asignatura);
            return $this->redirect($this->generateUrl('asignatura_inicio'));
        }
        
        return $this->render('asignatura/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/asignatura_periodo/eliminar/{id}", name="asignatura_periodo_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $asignatura = $em->getRepository(Asignatura::class)->find($id);
        if(!$asignatura)
        {
            throw $this->createNotFoundException("No se encuentra la asignatura");
        }
        else{
            $em->remove($asignatura);
            $em->flush();
            return $this->redirect($this->generateUrl('asignatura_inicio'));
        }
        
    }
    
}

