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
}

