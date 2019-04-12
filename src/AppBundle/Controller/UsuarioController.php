<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioController extends Controller
{
    /**
     * @Route("/administrador/usuario/inicio", name="usuario_inicio")
     */
    public function inicioAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository(Usuario::class)->findAll();
        return $this->render('usuario/inicio.html.twig', array('usuarios' => $usuarios,));
    }
    
    /**
     * @Route("/administrador/usuario/nuevo", name="usuario_nuevo")
     */
    public function nuevoAction(Request $request,  UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) Construit el formulario
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);   
        // 2) Manejar el envio (solo ocurrira con POST)
        $form->handleRequest($request);
        //echo "". $form."<br>" ;
        if ($form->isSubmitted() && $form->isValid()) {    
            // 3) Codificar la contraseña (también se puede hacerlo a través del oyente Doctrine)
            $password = $passwordEncoder->encodePassword($usuario, $usuario->getContrasenaPlana());
            $usuario->setClave($password);
            // 4) Guardar el Usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            // ... hacer cualquier otro trabajo, como enviarles un correo electrónico, etc.
            // tal vez establezca un mensaje de éxito "flash" para el usuario
            return $this->redirect($this->generateUrl('usuario_inicio'));
            //return $this->redirectToRoute('Usuario Registrado');
        }
        //echo "NO ingreso"."<br>";
        return $this->render('usuario/nuevo.html.twig',array('form' => $form->createView()));
    }
        
    /**
     * @Route("/administrador/usuario/listar", name="usuario_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuarios = $em->getRepository(Usuario::class)->findAll();
        return $this->render('usuario/listar.html.twig', array('usuarios' => $usuarios,));
    }
    
    /**
     * @Route("/administrador/usuario/editar/{id}", name="usuario_editar")
     */
    public function modificarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository(Usuario::class)->find($id);
        $password = $usuario->getClave();
        $form = $this->createForm(UsuarioType::class,$usuario);
        $form->handleRequest($request);
        
        if (!$usuario){
            throw $this->createNotFoundException('No se encuentra el usuario.');
        }
        
        if($form->isSubmitted() && $form->isValid()){
            $em -> flush($usuario);
            return $this->redirect($this->generateUrl('usuario_inicio'));
        }
        
        return $this->render('usuario/editar.html.twig', array('form' => $form->createView(),));
    }
    
    /**
     * @Route("/administrador/usuario/eliminar/{id}", name="usuario_eliminar")
     */
    public function eliminarAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository(Usuario::class)->find($id);
        if(!$usuario)
        {
            throw $this->createNotFoundException("No se encuentra la usuario");
        }
        else{
            $em->remove($usuario);
            $em->flush();
            return $this->redirect($this->generateUrl('usuario_inicio'));
        }
        
    }
    
}