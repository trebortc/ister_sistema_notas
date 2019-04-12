<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\PeriodoAcademico;
use AppBundle\Form\PeriodoAcademicoType;

class PeriodoAcademicoController extends Controller
{
    /**
     * @Route("/administrador/periodo_academico/inicio", name="periodo_academico_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $periodosAcademicos = $em->getRepository(PeriodoAcademico::class)->find(1);
        //$asignaturasPeriodo = $periodosAcademicos->getAsignaturasPeriodo();
        
        return $this->render('periodoAcademico/inicio.html.twig', array('periodosAcademicos' => $periodosAcademicos,));
    }
    
    /**
     * @Route("/administrador/periodo_academico/nuevo", name="periodo_academico_nuevo")
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
            return $this->redirect($this->generateUrl('periodo_academico_inicio'));
        }
        return $this->render('periodoAcademico/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/periodo_academico/listar", name="periodo_academico_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $periodosAcademicos = $em->getRepository(PeriodoAcademico::class)->findAll();
        return $this->render('periodoAcademico/listar.html.twig', array('periodosAcademicos' => $periodosAcademicos,));
    }
    
    /**
     * @Route("/administrador/periodo_academico/modificar/{id}", name="periodo_academico_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $periodoAcademico = $em->getRepository(PeriodoAcademico::class)->find($id);
        $form = $this->createForm(PeriodoAcademicoType::class,$periodoAcademico);
        $form->handleRequest($request);
        
        if (!$periodoAcademico){
            throw $this->createNotFoundException('No se encuentra el periodo academico.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($periodoAcademico);
            return $this->redirect($this->generateUrl('periodo_academico_inicio'));
        }
        
        return $this->render('periodoAcademico/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/periodo_academico/eliminar/{id}", name="periodo_academico_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $periodoAcademico = $em->getRepository(PeriodoAcademico::class)->find($id);
        if(!$periodoAcademico)
        {
            throw $this->createNotFoundException("No se encuentra el periodo academico");
        }
        else{
            $em->remove($periodoAcademico);
            $em->flush();
            return $this->redirect($this->generateUrl('periodo_academico_inicio'));
        }
        
    }
    
}

