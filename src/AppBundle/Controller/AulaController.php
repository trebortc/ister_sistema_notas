<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Aula;
use AppBundle\Form\AulaType;

class AulaController extends Controller
{
    /**
     * @Route("/administrador/aula/inicio", name="aula_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $aulas = $em->getRepository(Aula::class)->findAll();
        return $this->render('aula/inicio.html.twig', array('aulas' => $aulas,));
    }
    
    /**
     * @Route("/administrador/aula/nuevo", name="aula_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $aula = new aula();
        $form = $this->createForm(AulaType::class,$aula);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aula);
            $em->flush();
            return $this->redirect($this->generateUrl('aula_inicio'));
        }
        return $this->render('aula/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/aula/listar", name="aula_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $aulas = $em->getRepository(Aula::class)->findAll();
        return $this->render('aula/listar.html.twig', array('aulas' => $aulas,));
    }
    
    /**
     * @Route("/administrador/aula/editar/{id}", name="aula_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $aula = $em->getRepository(Aula::class)->find($id);
        $form = $this->createForm(AulaType::class,$aula);
        $form->handleRequest($request);
        
        if (!$aula){
            throw $this->createNotFoundException('No se encuentra la aula.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($aula);
            return $this->redirect($this->generateUrl('aula_inicio'));
        }
        
        return $this->render('aula/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/aula/eliminar/{id}", name="aula_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $aula = $em->getRepository(Aula::class)->find($id);
        if(!$aula)
        {
            throw $this->createNotFoundException("No se encuentra la aula");
        }
        else{
            $em->remove($aula);
            $em->flush();
            return $this->redirect($this->generateUrl('aula_inicio'));
        }
        
    }
    
    
}