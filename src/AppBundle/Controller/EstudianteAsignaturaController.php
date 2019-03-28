<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\estudianteAsignatura;
use AppBundle\Form\estudianteAsignaturaType;

class EstudianteAsignaturaController extends Controller
{
    /**
     * @Route("/administrador/estudianteAsignatura/inicio", name="estudianteAsignatura_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignaturas = $em->getRepository(estudianteAsignatura::class)->findAll();
        return $this->render('estudianteAsignatura/inicio.html.twig', array('estudianteAsignaturas' => $estudianteAsignaturas,));
    }
    
    /**
     * @Route("/administrador/estudianteAsignatura/nuevo", name="estudianteAsignatura_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $estudianteAsignatura = new estudianteAsignatura();
        $form = $this->createForm(estudianteAsignaturaType::class,$estudianteAsignatura);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estudianteAsignatura);
            $em->flush();
            return $this->redirect($this->generateUrl('estudianteAsignatura_inicio'));
        }
        return $this->render('estudianteAsignatura/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/estudianteAsignatura/listar", name="estudianteAsignatura_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignaturas = $em->getRepository(estudianteAsignatura::class)->findAll();
        return $this->render('estudianteAsignatura/listar.html.twig', array('estudianteAsignaturas' => $estudianteAsignaturas,));
    }
    
    /**
     * @Route("/administrador/estudianteAsignatura/editar/{id}", name="estudianteAsignatura_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignatura = $em->getRepository(estudianteAsignatura::class)->find($id);
        $form = $this->createForm(estudianteAsignaturaType::class,$estudianteAsignatura);
        $form->handleRequest($request);
        
        if (!$estudianteAsignatura){
            throw $this->createNotFoundException('No se encuentra la estudianteAsignatura.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($estudianteAsignatura);
            return $this->redirect($this->generateUrl('estudianteAsignatura_inicio'));
        }
        
        return $this->render('estudianteAsignatura/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/estudianteAsignatura/eliminar/{id}", name="estudianteAsignatura_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignatura = $em->getRepository(estudianteAsignatura::class)->find($id);
        if(!$estudianteAsignatura)
        {
            throw $this->createNotFoundException("No se encuentra la estudianteAsignatura");
        }
        else{
            $em->remove($estudianteAsignatura);
            $em->flush();
            return $this->redirect($this->generateUrl('estudianteAsignatura_inicio'));
        }
        
    }
    
    
}