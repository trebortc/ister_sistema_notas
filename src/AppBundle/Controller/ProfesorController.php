<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Profesor;
use AppBundle\Form\ProfesorType;
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use AppBundle\Entity\AsignaturaPeriodo;
use AppBundle\Entity\EstudianteAsignatura;
use AppBundle\Form\EstudianteAsignaturaType;

class ProfesorController extends Controller
{
    /**
     * @Route("/administrador/profesor/inicio", name="profesor_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $profesores = $em->getRepository(Profesor::class)->findAll();
        return $this->render('profesor/inicio.html.twig', array('profesores' => $profesores,));
    }
    
    /**
     * @Route("/administrador/profesor/nuevo", name="profesor_nuevo")
     */
    public function nuevoAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $profesor = new Profesor();
        $usuario = new Usuario();
        $form = $this->createForm(ProfesorType::class,$profesor);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            $usuario->setContrasenaPlana($profesor->getIdentificacion());
            $password = $passwordEncoder->encodePassword($usuario, $usuario->getContrasenaPlana());
            $usuario->setNick($profesor->getEmail());
            $usuario->setClave($password);
            $usuario->setEstado('A');
            $usuario->setTipo('ROLE_PROF');
            $em->persist($usuario);
            $em->flush();
            
            $em->persist($profesor);
            $em->flush();
            return $this->redirect($this->generateUrl('profesor_inicio'));
        }
        return $this->render('profesor/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/profesor/listar", name="profesor_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $profesores = $em->getRepository(Profesor::class)->findAll();
        return $this->render('profesor/listar.html.twig', array('profesores' => $profesores,));
    }
    
    /**
     * @Route("/administrador/profesor/editar/{id}", name="profesor_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $profesor = $em->getRepository(Profesor::class)->find($id);
        $form = $this->createForm(ProfesorType::class,$profesor);
        $form->handleRequest($request);
        
        if (!$profesor){
            throw $this->createNotFoundException('No se encuentra la profesor.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($profesor);
            return $this->redirect($this->generateUrl('profesor_inicio'));
        }
        
        return $this->render('profesor/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/profesor/eliminar/{id}", name="profesor_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $profesor = $em->getRepository(Profesor::class)->find($id);
        if(!$profesor)
        {
            throw $this->createNotFoundException("No se encuentra la profesor");
        }
        else{
            $em->remove($profesor);
            $em->flush();
            return $this->redirect($this->generateUrl('profesor_inicio'));
        }
        
    }
    
    /**
     * @Route("/administrador/profesor/profesorAsignaturas", name="profesor_asignaturas")
     */
    public function listarAsignaturasProfesor(Request $request)
    {
        //Obtener el usuario que inicio sesión
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        
        //Obtengo el estudiante que hace referencia al usuario que inica sesión
        $em = $this->getDoctrine()->getManager();
        $profesor = $em->getRepository(Profesor::class)->findOneBy([
            'idNick'=> $user->getIdNick()
        ]);
        
        $profesorAsignaturas = $profesor->getAsignaturasPeriodo();
        return $this->render('profesor/asignaturas.html.twig', array('asignaturas' => $profesorAsignaturas,));
    }
    
    /**
     * @Route("/administrador/profesor/estudiantesAsignatura/{id}", name="estudiantes_asignatura")
     */
    public function estudiantesAsignaturaAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $asignatura = $em->getRepository(AsignaturaPeriodo::class)->find($id);
        $estudiantes = $asignatura->getAsignaturaPeriodoEstudiantes();
        return $this->render('profesor/estudiantes.html.twig', array('estudiantes' => $estudiantes,));
    }
    
    /**
     * @Route("/administrador/profesor/estudiante/{id}", name="profesor_asignatura_nota")
     */
    public function modificarNotaAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignatura = $em->getRepository(EstudianteAsignatura::class)->find($id);
        //dump($estudianteAsignatura);
        //die();
        $form = $this->createForm(EstudianteAsignaturaType::class, $estudianteAsignatura);
        $form->handleRequest($request);
        
        if (!$estudianteAsignatura){
            throw $this->createNotFoundException('No se encuentra estudiante asignatura.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $estudiantes = $estudianteAsignatura->getIdAsignaturaPeriodo()->getAsignaturaPeriodoEstudiantes();
            $notaFinal = ($estudianteAsignatura->getParcial1() + $estudianteAsignatura->getParcial2() + $estudianteAsignatura->getParcial3())/3;
            $estudianteAsignatura->setNotaFinal($notaFinal);
            $em -> flush($estudianteAsignatura);
            return $this->render('profesor/estudiantes.html.twig', array('estudiantes' => $estudiantes,));
        }
        
        return $this->render('profesor/editar_nota.html.twig', array('form' => $form->createView(),));
    }
}

