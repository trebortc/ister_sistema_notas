<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();
        
        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();
        return $this->render('administrador/login.html.twig', array('last_username' => $lastUsername,'error'=> $error,));
    }
    
    /**
     * @Route("/administrador", name="administrador")
     */
    public function homeAction(Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        
        return $this->render( 'administrador/home.html.twig',array('usuario' => $user->getNick(), 'rol' => $user->getTipo(), ));
    }
     
    /**
     * @Route("/logout", name="logout")
     */
    public function salirAction(Request $request)
    {
        return $this->render( 'administrador/login.html.twig',array());
    }
    
}
