<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\PeriodoAcademico;
use AppBundle\Form\PeriodoAcademicoType;

class PeriodoAcademicoController
{
    /**
     * @Route("periodoAcademico/inicio", name="periodoAcademico_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $periodoAcademicos = $em->getRepository(PeriodoAcademico::class)->findAll();
        return $this->render('periodoAcademico/inicio.html.twig', array('periodoAcademicos' => $periodoAcademicos,));
    }
    
    /**
     * @Route("periodoAcademico/nuevo", name="periodoAcademico_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $periodoAcademico = new PeriodoAcademico();
        $form = $this->createForm(PeriodoAcademicoType::class,$periodoAcademico);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($periodoAcademico);
            $em->flush();
            return $this->redirect($this->generateUrl('periodoAcademico_inicio'));
        }
        return $this->render('periodoAcademico/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("periodoAcademico/listar", name="periodoAcademico_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $periodoAcademicos = $em->getRepository(PeriodoAcademico::class)->findAll();
        return $this->render('periodoAcademico/listar.html.twig', array('periodoAcademicos' => $periodoAcademicos,));
    }
    
    /**
     * @Route("periodoAcademico/modificar/{id}", name="periodoAcademico_modificar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $periodoAcademico = $em->getRepository(PeriodoAcademico::class)->find($id);
        $form = $this->createForm(PeriodoAcademicoType::class,$periodoAcademico);
        $form->handleRequest($request);
        
        if (!$periodoAcademico){
            throw $this->createNotFoundException('No se encuentra la periodoAcademico.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($periodoAcademico);
            return $this->redirect($this->generateUrl('periodoAcademico_inicio'));
        }
        
        return $this->render('periodoAcademico/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("periodoAcademico/eliminar/{id}", name="periodoAcademico_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $periodoAcademico = $em->getRepository(PeriodoAcademico::class)->find($id);
        if(!$periodoAcademico)
        {
            throw $this->createNotFoundException("No se encuentra la periodoAcademico");
        }
        else{
            $em->remove($periodoAcademico);
            $em->flush();
            return $this->redirect($this->generateUrl('periodoAcademico_inicio'));
        }
        
    }
    
}

