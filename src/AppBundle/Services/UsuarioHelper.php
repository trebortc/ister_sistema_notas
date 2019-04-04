<?php
namespace AppBundle\Services;
use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UsuarioHelper
{
    public function crearUsuario($persona)
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
}
