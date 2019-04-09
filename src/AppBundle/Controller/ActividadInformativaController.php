<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Asignatura;
use AppBundle\Form\AsignaturaType;
use AppBundle\Entity\ActividadInformativa;
use AppBundle\Form\ActividadInformativaType;

class ActividadInformativaController extends Controller
{
        
    /**
     * @Route("/administrador/actividad_informativa/inicio", name="actividad_informativa_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $actividadesInformativas = $em->getRepository(ActividadInformativa::class)->findAll();
        return $this->render('actividadInformativa/inicio.html.twig', array('asignaturas' => $actividadesInformativas,));
    }
    
    /**
     * @Route("/administrador/actividad_informativa/nuevo", name="actividad_informativa_inicio")
     */
    public function nuevoAction(Request $request)
    {
        $actividadInformativa = new ActividadInformativa();
        $form = $this->createForm(ActividadInformativaType::class, $actividadInformativa);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($actividadInformativa);
            $em->flush();
            return $this->redirect($this->generateUrl('actividad_informativa_inicio'));
        }
        return $this->render('actividadInformativa/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/actividad_informativa/listar", name="actividad_informativa_inicio")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $actividadInformativa = $em->getRepository(ActividadInformativa::class)->findAll();
        return $this->render('actividadInformativa/listar.html.twig', array('asignaturas' => $actividadInformativa,));
    }
    
    /**
     * @Route("/administrador/actividad_informativa/editar/{id}", name="actividad_informativa_inicio")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $actividadInformativa = $em->getRepository(ActividadInformativa::class)->find($id);
        $form = $this->createForm(ActividadInformativaType::class, $actividadInformativa);
        $form->handleRequest($request);
        
        if (!$actividadInformativa){
            throw $this->createNotFoundException('No se encuentra la asignatura.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($actividadInformativa);
            return $this->redirect($this->generateUrl('actividad_informativa_inicio'));
        }
        
        return $this->render('actividadInformativa/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/actividad_informativa/eliminar/{id}", name="actividad_informativa_inicio")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $actividadInformativa = $em->getRepository(ActividadInformativa::class)->find($id);
        if(!$actividadInformativa)
        {
            throw $this->createNotFoundException("No se encuentra la actividad informativa");
        }
        else{
            $em->remove($actividadInformativa);
            $em->flush();
            return $this->redirect($this->generateUrl('actividad_informativa_inicio'));
        }
        
    }
    
}

