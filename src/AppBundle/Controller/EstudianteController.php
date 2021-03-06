<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Estudiante;
use AppBundle\Form\EstudianteType;
use AppBundle\Repository\EstudianteRepository;
use AppBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use AppBundle\Entity\EstudianteAsignatura;
use Doctrine\Common\Collections\ArrayCollection;


class EstudianteController extends Controller
{
    /**
     * @Route("/administrador/estudiante/inicio", name="administracion_estudiante_inicio")
     */
    public function inicioAction()
    {        
        $em = $this->getDoctrine()->getManager();
        //$estudiantes = $em->getRepository(Estudiante::class)->findAll();
        
        $usuario = $em->getRepository(Usuario::class)->findOneBy([],['idNick' => 'DESC']);
        //$estudiante->setIdNick($usuario->getIdNick());
        //echo "".$estudiante->getIdNick();
        
        $estudiantes = $this->getDoctrine()
        ->getRepository(Estudiante::class)
        ->findAllEstudiantes();
        
        return $this->render('estudiante/inicio.html.twig', array('estudiantes' => $estudiantes,));
    }
    
    /**
     * @Route("/administrador/estudiante/nuevo", name="administracion_estudiante_nuevo")
     */
    public function nuevoAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {   
        
        $estudiante = new Estudiante();
        $usuario = new Usuario();
        $form=$this->createForm(EstudianteType::class,$estudiante);
        $form->handleRequest($request);
                
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            $usuario->setContrasenaPlana($estudiante->getIdentificacion());
            $password = $passwordEncoder->encodePassword($usuario, $usuario->getContrasenaPlana());      
            $usuario->setNick($estudiante->getEmail());
            $usuario->setClave($password);
            $usuario->setEstado('A');
            $usuario->setTipo('ROLE_EST');
            $em->persist($usuario);
            $em->flush();
            
            $estudiante->setIdNick($usuario);
            $em->persist($estudiante);
            $em->flush();
            
            return $this->redirect($this->generateUrl('administracion_estudiante_inicio'));
        }
        
        return $this->render('estudiante/nuevo.html.twig',array('form' => $form->createView(), ));
    }
    
    /**
     * @Route("/administrador/estudiante/listar", name="administracion_estudiante_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $estudiantes = $em->getRepository(Estudiante::class)->findAll();
        return $this->render('estudiante/listar.html.twig', array('estudiantes' => $estudiantes));
    }
    
    /**
     * @Route("/administrador/estudiante/editar/{id}", name="administracion_estudiante_editar", defaults={"id" = 1})
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository(Estudiante::class)->find($id);
        $form = $this->createForm(EstudianteType::class,$estudiante);
        $form->handleRequest($request);
        
        if (!$estudiante){
            throw $this->createNotFoundException('Unable to find personne entity.');
        }
        else{
            if($estudiante -> getIdCarrera() != NULL){
                $materia = $estudiante->getIdCarrera()->getNombre();
            }else{
                $materia = "Carrera a inscribirse";
            }
        }
       
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($estudiante);
            return $this->redirect($this->generateUrl('administracion_estudiante_inicio'));
        }
        
        return $this->render('estudiante/editar.html.twig', array('form' => $form->createView(), 'materia' => $materia,));
        
    }
    
    /**
     * @Route("/administrador/estudiante/eliminar/{id}", name="administracion_estudiante_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository(Estudiante::class)->find($id);
        if(!$estudiante)
        {
            throw $this->createNotFoundException("No se encuentra el estudiante");
        }
        else{
            $em->remove($estudiante);
            $em->flush();
            return $this->redirect($this->generateUrl('administracion_estudiante_inicio'));
        }
        
    }
    
    /**
     * @Route("/administrador/estudiante/estudianteAsignaturas", name="estudiante_asignaturas")
     */
    public function listarAsignaturasEstudiante(Request $request)
    {
        //Obtener el usuario que inicio sesi�n
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        
        //Obtengo el estudiante que hace referencia al usuario que inica sesi�n
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository(Estudiante::class)->findOneBy([
            'idNick'=> $user->getIdNick()
        ]);
        
        $estudianteAsignaturas = $estudiante->getEstudianteAsignaturas();
        return $this->render('estudiante/asignaturas.html.twig', array('asignaturas' => $estudianteAsignaturas,));
    }
    
    /**
     * @Route("/administrador/estudiante/actividadesAsignaturas", name="estudiante_asignaturas_actividades")
     */
    public function listarActividadesEstudianteAsignatura(Request $request)
    {
        //Obtener el usuario que inicio sesi�n
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        //Obtengo el estudiante que hace referencia al usuario que inica sesi�n
        $em = $this->getDoctrine()->getManager();
        $estudiante = $em->getRepository(Estudiante::class)->findOneBy([
            'idNick'=> $user->getIdNick()
        ]);
        
        $estudianteAsignaturas = $estudiante->getEstudianteAsignaturas();
        $actividadesPorAsignatura = new ArrayCollection();
        foreach ($estudianteAsignaturas as $estudianteAsignatura)
        {
            $actividadesPorAsignatura->add($estudianteAsignatura->getIdAsignaturaPeriodo()->getAsignaturaPeriodoActividades());
        }
        
        return $this->render('estudiante/actividades.html.twig', array('actividadesPorAsignatura' => $actividadesPorAsignatura,));
        /*
        foreach ($actividadesPorAsignatura as $actividades)
        {
            foreach ($actividades as $actividad)
            {
                dump($actividad);
            }
                
        }*/
        //$ea = new EstudianteAsignatura();
        //$ea->getIdAsignaturaPeriodo()->getAsignaturaPeriodoActividades();
    }
    
    /**
     * @Route("/administrador/estudiante/estudianteAsignatura/{id}", name="estudiante_asignatura")
     */
    public function estudianteAsignaturaAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $estudianteAsignatura = $em->getRepository(EstudianteAsignatura::class)->find($id);
        return $this->render('estudiante/asignatura.html.twig', array('estudianteAsignatura' => $estudianteAsignatura,));
    }
    
}
