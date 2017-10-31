<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/registro", name="usuario_registro")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        // 1) Construit el formulario
        $usuario = new Usuario();
        $form = $this->createForm(UsuarioType::class, $usuario);
        
        // 2) Manejar el envio (solo ocurrira con POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            // 3) Codificar la contraseña (también se puede hacerlo a través del oyente Doctrine)
            $password = $passwordEncoder->encodePassword($usuario, $usuario->getContrasenaPlana());
            //$usuario->setContrasenaPlana($password);
            $usuario->setClave($password);
            
            // 4) Guardar el Usuario
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            
            // ... hacer cualquier otro trabajo, como enviarles un correo electrónico, etc.
            // tal vez establezca un mensaje de éxito "flash" para el usuario
            return new Response('<html><body>Estado: '.'Usuario Registrado'.'</body></html>');
            //return $this->redirectToRoute('Usuario Registrado');
        }
        
        return $this->render('registro/registro.html.twig',array('form' => $form->createView()));
    }
}
