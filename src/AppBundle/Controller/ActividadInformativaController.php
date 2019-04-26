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
        return $this->render('actividadInformativa/inicio.html.twig', array('actividadesInformativas' => $actividadesInformativas,));
    }
    
    /**
     * @Route("/administrador/actividad_informativa/nuevo", name="actividad_informativa_nuevo")
     */
    public function nuevoAction(Request $request)
    {
        $actividadInformativa = new ActividadInformativa();
        $form = $this->createForm(ActividadInformativaType::class, $actividadInformativa);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            // Proceso para guardar el pdf
            $archivoAdjunto = $actividadInformativa->getArchivoAdjunto();
            $nombreArchivoAdjunto = $this->generateUniqueFileName().'.'.$archivoAdjunto->guessExtension();
            
            // Mover el archivo al directorio donde se guardara
            try {
                $archivoAdjunto->move($this->getParameter('file_directory'), $nombreArchivoAdjunto);
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
           
            // Instanciar el nombre del archivo para guardar
            $actividadInformativa->setArchivoAdjunto($nombreArchivoAdjunto);
            
            // Proceso para guardar la imagen
            $imagen = $actividadInformativa->getImagen();
            $nombreImagen = $this->generateUniqueFileName().'.'.$imagen->guessExtension();
            
            // Mover el archivo al directorio donde se guardara
            try {
                $imagen->move($this->getParameter('image_directory'), $nombreImagen);
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            
            // Instanciar el nombre del archivo para guardar
            $actividadInformativa->setImagen($nombreImagen);
            
            
                     
            $em->persist($actividadInformativa);
            $em->flush();
            
            return $this->redirect($this->generateUrl('actividad_informativa_inicio'));
        }
        
        return $this->render('actividadInformativa/nuevo.html.twig',array('form' => $form->createView()));
    }
    
    /**
     * @Route("/administrador/actividad_informativa/nueva_actividad_asignatura/{id}", name="actividad_informativa_nuevo_asignatura")
     */
    public function nuevo2Action(Request $request, $id)
    {
        $actividadInformativa = new ActividadInformativa();
        $form = $this->createForm(ActividadInformativaType::class, $actividadInformativa);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            
            // Proceso para guardar el pdf
            $archivoAdjunto = $actividadInformativa->getArchivoAdjunto();
            $nombreArchivoAdjunto = $this->generateUniqueFileName().'.'.$archivoAdjunto->guessExtension();
            
            // Mover el archivo al directorio donde se guardara
            try {
                $archivoAdjunto->move($this->getParameter('file_directory'), $nombreArchivoAdjunto);
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            
            // Instanciar el nombre del archivo para guardar
            $actividadInformativa->setArchivoAdjunto($nombreArchivoAdjunto);
            
            // Proceso para guardar la imagen
            $imagen = $actividadInformativa->getImagen();
            $nombreImagen = $this->generateUniqueFileName().'.'.$imagen->guessExtension();
            
            // Mover el archivo al directorio donde se guardara
            try {
                $imagen->move($this->getParameter('image_directory'), $nombreImagen);
            } catch (FileException $e) {
                // ... handle exception if something happens during file upload
            }
            
            // Instanciar el nombre del archivo para guardar
            $actividadInformativa->setImagen($nombreImagen);
           
            $em->persist($actividadInformativa);
            $em->flush();
            
            $actividadesInformativas = $em->getRepository(ActividadInformativa::class)->findBy([
                'idAsignaturaPeriodo'=> $id
            ]);
                 
            return $this->render('profesor/actividades.html.twig', array('actividadesInformativas' => $actividadesInformativas,'asignatura' => $actividadInformativa->getIdAsignaturaPeriodo()->getIdAsignatura()->getNombre(), 'id' => $id));
        }
        
        return $this->render('actividadInformativa/nuevo.html.twig',array('form' => $form->createView(), 'id' => $id ));
    }
    
    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }
    
    /**
     * @Route("/administrador/actividad_informativa/listar", name="actividad_informativa_listar")
     */
    public function listarAction()
    {
        $em = $this->getDoctrine()->getManager();
        $actividadesInformativas = $em->getRepository(ActividadInformativa::class)->findAll();
        
        $periodosAcademicos = $em->getRepository(PeriodoAcademico::class)->find(1);
        //$asignaturasPeriodo = $periodosAcademicos->getAsignaturasPeriodo();
        
        return $this->render('actividadInformativa/listar.html.twig', array('actividadesInformativas' => $actividadesInformativas,));
    }
    
    /**
     * @Route("/administrador/actividad_informativa/editar/{id}", name="actividad_informativa_editar")
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
     * @Route("/administrador/actividad_informativa/eliminar/{id}", name="actividad_informativa_eliminar")
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

