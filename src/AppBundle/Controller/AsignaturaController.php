<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Asignatura;
use AppBundle\Form\AsignaturaType;
use AppBundle\Entity\PeriodoAcademico;

class AsignaturaController extends Controller
{
        
    /**
     * @Route("/administrador/asignatura/inicio", name="asignatura_inicio")
     */
    public function inicioAction()
    {
        /*$em = $this->getDoctrine()->getManager();
        $asignaturas = $em->getRepository(Asignatura::class)->findAll();
        return $this->render('asignatura/inicio.html.twig', array('asignaturas' => $asignaturas,));*/
        $em = $this->getDoctrine()->getManager();
        $periodosAcademicos = $em->getRepository(PeriodoAcademico::class)->find(1);
        $asignaturasPeriodo = $periodosAcademicos->getAsignaturasPeriodo();
        dump($asignaturasPeriodo->getAsignaturasPeriodo());
        die();
    }
    
    /**
     * @Route("/administrador/asignatura/nuevo", name="asignatura_nuevo")
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
     * @Route("/administrador/asignatura/listar", name="asignatura_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $periodosAcademicos = $em->getRepository(PeriodoAcademico::class)->find(1);
        $asignaturasPeriodo = $periodosAcademicos->getAsignaturasPeriodo();
        return $this->render('asignatura/listar.html.twig', array('asignaturas' => $asignaturasPeriodo,));
    }
    
    /**
     * @Route("/administrador/asignatura/editar/{id}", name="asignatura_editar")
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
     * @Route("/administrador/asignatura/eliminar/{id}", name="asignatura_eliminar")
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

