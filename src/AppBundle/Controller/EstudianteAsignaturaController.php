<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\EstudianteAsignatura;
use AppBundle\Form\EstudianteAsignaturaType;

class EstudianteAsignaturaController extends Controller
{
    /**
     * @Route("/administrador/estudiante_asignatura/inicio", name="estudiante_asignatura_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignaturas = $em->getRepository(EstudianteAsignatura::class)->findAll();
        return $this->render('estudianteAsignatura/inicio.html.twig', array('estudianteAsignaturas' => $estudianteAsignaturas,));
    }
    
    /**
     * @Route("/administrador/estudiante_asignatura/nuevo", name="estudiante_asignatura_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $estudianteAsignatura = new estudianteAsignatura();
        $form = $this->createForm(EstudianteAsignaturaType::class,$estudianteAsignatura);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estudianteAsignatura);
            $em->flush();
            return $this->redirect($this->generateUrl('estudiante_asignatura_inicio'));
        }
        return $this->render('estudianteAsignatura/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/estudiante_asignatura/listar", name="estudiante_asignatura_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignaturas = $em->getRepository(EstudianteAsignatura::class)->findAll();
        return $this->render('estudianteAsignatura/listar.html.twig', array('estudianteAsignaturas' => $estudianteAsignaturas,));
    }
    
    /**
     * @Route("/administrador/estudiante_asignatura/editar/{id}", name="estudiante_asignatura_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignatura = $em->getRepository(EstudianteAsignatura::class)->find($id);
        $form = $this->createForm(EstudianteAsignaturaType::class, $estudianteAsignatura);
        $form->handleRequest($request);
        
        if (!$estudianteAsignatura){
            throw $this->createNotFoundException('No se encuentra estudiante asignatura.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($estudianteAsignatura);
            return $this->redirect($this->generateUrl('estudiante_asignatura_inicio'));
        }
        
        return $this->render('estudianteAsignatura/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/estudiante_asignatura/eliminar/{id}", name="estudiante_asignatura_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignatura = $em->getRepository(EstudianteAsignatura::class)->find($id);
        if(!$estudianteAsignatura)
        {
            throw $this->createNotFoundException("No se encuentra la estudiante asignatura");
        }
        else{
            $em->remove($estudianteAsignatura);
            $em->flush();
            return $this->redirect($this->generateUrl('estudiante_asignatura_inicio'));
        }
        
    }
    
    
}